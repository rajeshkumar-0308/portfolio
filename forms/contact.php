<?php

  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'rajeshsaravanan2004@gamil.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
  $contact->smtp = array(
    'host' => 'smtp.elasticemail.com',
    'username' => 'rajeshsaravanan2004@gmail.com',
    'password' => '052E0DE92AA305349AF8A3E028224DF7DE92',
    'port' => '2525'
  );
*/
    Email.send({
      Host => "smtp.elasticemail.com",
      Username => "rajeshsaravanan2004@gmail.com",
      Password => "052E0DE92AA305349AF8A3E028224DF7DE92",
      To => 'rajeshsaravanan2004@gmail.com',
      From => "rajeshsaravanan2004@gmail.com",
      Subject => "This is the subject",
      Body => "And this is the body"
  }).then(
    message => alert(message)
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();

?>
