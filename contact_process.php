<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$to = "happy@yopmail.com";
	$from = $_POST['email'];
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$number = $_POST['number'];
	$cmessage = $_POST['message'];

	$txt = "Name = " . $name . "\r\n  Email = " . $email . "\r\n Message =" . $cmessage;

	$headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	// $subject = "New Email For Foundation";

	$logo = 'https://helpfriendfoundation.in/assets/img/logo/loader.png';
	$link = 'https://helpfriendfoundation.in';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

	if ($email != NULL) {
		mail($to, $subject, $txt, $headers);
	}
	// $send = mail($to, $subject, $body, $headers);
	// Redirect to a thank you page
	header("Location: /index.html");
	exit;
}
