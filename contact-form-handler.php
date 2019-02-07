<?php
$errors = '';
// $myemail = 'gabs1523@gmail.com';
$myemail = 'info@quyenchangdds.com';

if(empty($_POST['name'])  ||
   empty($_POST['number']) ||
   empty($_POST['email']))
{
    $errors .= "\n Error: the name/number/email fields are required";
}

$name = $_POST['name'];
$number = $_POST['number'];
$email_address = $_POST['email'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "New Appointment Request. Here are the details -\n\n".
	  "Name: $name\nNumber: $number\nEmail: $email_address\nMessage: $message";

    mail($to,$email_subject,$email_body);

	//redirect to the 'thank you' page
	//header('Location: contact-form-thank-you.html');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
