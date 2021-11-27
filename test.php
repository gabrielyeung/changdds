<?php
$errors = '';
$myemail = 'gabs1523@gmail.com';
// $myemail = 'info@quyenchangdds.com';

// localhost testing
$secret = '6LfDby4dAAAAADgSBYMhVxn7CXnCdXgAfOe5lOpL';
// $token = '03AGdBq26ozu4QwFG5ByidbMSmNSOU6iuGBJxF9g6k2E02EOzOxgJmAi84cqad_n91YGEbLuPkRyuuXricilOEyMo-7eef9ausznQPb2hSUOJhRKuOw_19QWWLPRmlGQYVV5qqLm50JLUUSaYqnGM8_Zv_WBGUNWOrigcIn0tD1MwMrF-cD5s2I5qKH425-KfbauIkeVtJHWeUE1_9OIXxK-bpksxWYYYWLVwXmdIXnCFqzEiv51qCjkmb-McSlBv0f47o-Vjltc0nv-8CqF2T098IwFhJSghg8jujVEQGeyTqiUFZGWPHCYhhswCEDIVpxO2frPtNmAHuPR_Yi0m6DKFvlNBHm3FQZs1Ijnzu7XQb2ZVtdAj_ed2tVHwS-kBIOHmKkQT1oCGR0D-IxYQu74cwyhdlvvxORUHMq2PZwpBL5JOiq0taV7mJfyUUlRzBEqWUtB0e8IjO';

// for prod
// $secret = '6Lf4ni0dAAAAAAoU94TVfumPMb18bpjyV8-NH9cp';
$token = $_POST['token'] ? $_POST['token'] : $_POST['g-recaptcha-response'];

if (empty($token)) {
    $errors .= "\n Error: empty captcha token";
}

if (empty($errors)) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secret, 'response' => $token);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $data = json_decode($result);

    if ($result === FALSE || $data->success === FALSE) {
      /* Handle error */
      $errors .= "\n Error: Captcha fail";
    }
}


// // -------------------------
//
// if(empty($_POST['name'])  ||
//    empty($_POST['number']) ||
//    empty($_POST['email']))
// {
//     $errors .= "\n Error: the name/number/email fields are required";
// }
//
// $name = $_POST['name'];
// $number = $_POST['number'];
// $email_address = $_POST['email'];
// $message = $_POST['message'];
//
// if (!preg_match(
// "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
// $email_address))
// {
//     $errors .= "\n Error: Invalid email address";
// }
//
// if( empty($errors))
// {
// 	$to = $myemail;
// 	$email_subject = "Contact form submission: $name";
// 	$email_body = "New Appointment Request. Here are the details -\n\n".
// 	  "Name: $name\nNumber: $number\nEmail: $email_address\nMessage: $message";
//
//     mail($to,$email_subject,$email_body);
//
// 	//redirect to the 'thank you' page
// 	//header('Location: contact-form-thank-you.html');
// }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Hello</title>
</head>

<body>

<h1>Hello my test form</h1>

<!-- This page is displayed only if there is some error -->
<?php

echo "???!!! \n\n";
echo nl2br($errors);
echo "???!!! \n\n";
echo $token;

// echo $result->"error-codes";
?>


</body>
</html>
