<?php
/*
Columns:
userID int(255) AI PK
email varchar(255)
password varchar(255)
salt int(11)
role char(255)
firstName varchar(255)
lastName varchar(255)
phoneNumber int(16)
streetAddress varchar(255)
streetNo int(4)
postcode int(4)
state char(3)
*/
  if($_SERVER["REQUEST_METHOD"] === "POST")
  {

    $errors = array();
    $formValid = true;

    //Get Dependancies
    require_once 'formValidation.php';

    //PHP Field Validation
    $errors = array(
      "email"=>checkEmail($_POST['email']),
      "password"=>checkPassword($_POST['password']),
      "confpassword"=>checkMatch($_POST['password'], $_POST['confpassword']),
      "firstName"=>checkName($_POST['firstName']),
      "lastName"=>checkName($_POST['lastName']),
      "phone"=>checkPhone($_POST['phone']),
      "address"=>checkAddress($_POST['address']),
      "postCode"=>checkPost($_POST['postCode']),
      "state"=>checkState($_POST['state'])
    );

    //Check for presence of errors and output
    foreach($errors as $field => $valid)
    {
      if($valid === false)
      {
        $formValid = false;
        echo "Invalid " . $field . " detected<br />";
      }
    }

    //Complete Registration Process
    if($formValid)
    {
      require_once 'users.php';

      $user = new User($_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['address'], $_POST['postCode'], $_POST['state']);

      $user->saveToDatabase();
    }

  }
 ?>