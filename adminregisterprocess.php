<?php

  include ('db_session.php');
if(!session_id())

  {
    session_start();
  }

  include ('dbconnect.php');

  //Retrive data from form and session

  $fno = $_POST['fno'];
  $fid = $_POST['fid'];
  $uid = $_POST['uid'];
  $upassword = $_POST['upassword'];
  $success = "REGISTRATION SUCCESSFUL";

  $sql2="SELECT * FROM tb_user
        LEFT JOIN tb_farm ON tb_user.u_no=tb_farm.f_no";
  
  $result2=mysqli_query($con,$sql2);

  while($row2=mysqli_fetch_array($result2))
  {
      if($row2['f_id']!=$fid)
      {
        if($row2['u_id']!=$uid)
        {
          $sql1 = "UPDATE tb_farm
                  SET f_id='$fid', f_status='2'
                  WHERE f_no='$fno'";
          $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
          if($result1)
          {
            echo "your form was submitted.";
            $sql2 = "UPDATE tb_user
                    SET u_id='$uid', u_password='$upassword'
                    WHERE u_no='$fno'";
            $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
            if($result2)
            {
              $sql3 = "SELECT * FROM tb_user 
                      LEFT JOIN tb_farm ON tb_user.u_no = tb_farm.f_no
                      WHERE u_no='$fno'";

              $result3 = mysqli_query($con,$sql3);
              $row3 = mysqli_fetch_array($result3);
              echo "your form was submitted.";

              //var_dump($sql2);

              require 'phpmailer/PHPMailerAutoload.php';

              $mail=new PHPMailer();
              $mail->Host = "smtp.gmail.com";
              $mail->isSMTP();
              $mail->SMTPAuth=true;
              $mail->Username="smartagrictrading@gmail.com";
              $mail->Password="Iskandar17";
              $mail->SMTPSecure="ssl";
              $mail->Port=465;
              $mail->Subject="Registration Successful";
              $mail->isHTML(true);
              $mail->Body="Congratulations, ".$row3['u_name'].". Your registration has been approved. Your login details are as follows:<br><br>
                          User ID: ".$uid."<br>
                          Password: ".$upassword."<br><br>
                          <a href='http://smartagrictrding.xyz/index.php'>Click here to visit our website</a>";
              $mail->setFrom('smartagrictrading@gmail.com', 'Smart Agric Trading');
              $mail->addAddress($row3['u_email']);

              if($mail->send())
              {
                echo"mail sent";
              }
              else
              {
                echo"error";
              }
              if($result2) 
              {
                $_SESSION["success"] = $success;
                header('location:adminapprove.php');
                exit();
              }
              else 
              {
                die("Query failed2");
              }
            }
            else
            {
              echo "your form was not submitted.";
            }
          }
          else
          {
            echo "your form was not submitted.";
          }
        }
        else
        {
          $pass=1;
          header('location:adminregister.php?no='.$fno.'&pass='.$pass);
        }
      }
      else
      {
        $pass=2;
        header('location:adminregister.php?no='.$fno.'&pass='.$pass);
      }
  }

mysqli_close($con);
?>