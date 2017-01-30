

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $to = "johnriehn@yahoo.com";
     
    $subject = "website html form submissions";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['dropdown']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['first_name']; 
    $email = $_POST['email']; 
    $message = $_POST['message']; 
	$dropdown = $_POST['dropdown'];
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The message you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $message .= "Name: ".clean_string($name)."\n";
    $message .= "Email: ".clean_string($email)."\n";
    $message .= "Dropdown: ".clean_string($dropdown)."\n";
    $message .= "Message: ".clean_string($message)."\n";
     
     
// create email headers
$headers = 'From: '.$from."\r\n".
'Reply-To: '.$from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($to, $subject, $message, $headers);  
?>
 
<!-- place your own success html below -->
 
Thank you for contacting me. I will be in touch with you as soon as possible.
 
<?php
}
die();
?>


</body>
</html>