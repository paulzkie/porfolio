$to = $email; //dito mo ilalagay ung email ng admin para marecieve nya sa email

$subject = 'Account Verification'; //subject ng email. Edit mo nalang ito

$message = '<html><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Email Confirmation</title> //Title ng email. Edit mo nalang ito

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body style="margin: 0px; padding: 0px;">';

$message .= 'Dear '.$fname.' '.$lname.'<br> //laman ng email/ ung mahabang paragraph. Edit mo nalang ito

<p>Welcome to Montana Luz Catering.</p><br> //laman ng email/ ung mahabang paragraph. Edit mo nalang ito

<p>Please click here to verify your account. <a href="www.mydomain.pe.hu/montanaluz/verify?userid='.$id->maxid.'">Verify</a></p>'; //laman ng email/ ung mahabang paragraph. Edit mo nalang ito

$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>

<script src="./js/ga-tracking.min.js"></script>

</body></html>';

$headers = 'From: MontanaLuzCatering'. "\r\n"; //Title ng email. Edit mo nalang ito

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($to, $subject, $message, $headers);
