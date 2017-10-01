<?php

	$errors = array();

  // Check if item has been entered
  if (!isset($_POST['item'])) {
    $errors['item'] = 'Please enter the item';
  }

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Please enter your name';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address';
	}

  //Check if size has been entered
  if (!isset($_POST['size'])) {
    $errors['size'] = 'Please enter your size';
  }

  //Check if quantity has been entered and is valid
  if (!isset($_POST['quantity'])) {
    $errors['quantity'] = 'Please enter quantity';
  }



	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$email = $_POST['email'];
	$item = $_POST['item'];
  $quantity = $_POST['quantity'];
  $size = $_POST['size'];
	$from = $email;
	$to = 'info@theexclusivemusic.com';  // please change this email id
	$subject = 'Merch Reservation';

	$body = "From: $name\n E-Mail: $email\n Item: $item\n Size: $size\n Quantity: $quantity\n";

	$headers = "From: ".$from;


	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;
		die();
	}

  $result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Something bad happend during sending this message. Please try again later';
	$result .= '</div>';

	echo $result;
