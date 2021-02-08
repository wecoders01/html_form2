

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Contact Form</title>


   <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="main">
      <form action="" method="POST">
         <div class="single-form">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="<?php if(isset($name)) echo $name; ?>">
            
            <span>
               <?php
                  if(isset($error['name'])){
                     echo $error['name'];
                  }
               ?>
            </span>
         </div>
         <div class="single-form">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>">
            <span>
               <?php
                  if(isset($error['email'])){
                     echo $error['email'];
                  }
               ?>
            </span>
         </div>
         <div class="single-form">
            <label for="subject">Subject</label>
            <input type="text" name="subject" placeholder="Subject" value="<?php if(isset($subject)) echo $subject; ?>">
            <span>
               <?php
                  if(isset($error['subject'])){
                     echo $error['subject'];
                  }
               ?>
            </span>
         </div>
         <div class="single-form">
            <label for="message">Message</label>
            <textarea name="message" value="<?php if(isset($message)) echo $message; ?>"></textarea>
            <span>
               <?php
                  if(isset($error['message'])){
                     echo $error['message'];
                  }
               ?>
            </span>
         </div>
         <div class="single-form">
            <input type="submit" value="Send Message" name="btn">
         </div>
      </form>

      <?php
         if(isset($_POST['btn'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];


            // Error Checking
            $error = [];

            if(empty($_POST['name'])){
               $error['name']= 'Insert Your Name*';
            }
            if(empty($_POST['email'])){
               $error['email']= 'Insert Your Email*';
            }
            if(empty($_POST['subject'])){
               $error['subject']= 'Insert Your Subject*';
            }
            if(empty($_POST['message'])){
               $error['message']= 'Insert Your Message*';
            }

            // Mail
            $to = 'socialsolution199@gmail.com';
            $form = 'Form '.$email;
            $subject = 'Subject '.$subject;
            $body = 'Name: '.$name. '\n Subject: '.$subject. '\n Email: '.$email. '\n Message: '.$message;

            
            $check = mail($to, $form, $body);
            if($check == true){
               echo 'Thank You! Your Message Has Been Sent';
            }else{
               echo "Oops! Something went wrong and we couldn't send your message.";
            }
         }
      ?>


   </div>
</body>
</html>