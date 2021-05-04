<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['company'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['email'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));

// Create the email and send the message
$to = 'conchax@gmail.com	'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form, to movalprint.com\n\n"."Here are the details:\n\nName: $name\n\nCompany: $company \n\n Email: $email_address\n\nPhone: $phone";
$headers = "From: noreply@movalprint.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
