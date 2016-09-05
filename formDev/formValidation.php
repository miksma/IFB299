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
checkEmail("something@domain.com");
  function checkEmail($email)
  {
    if(isset($email) && $email !== "")
    {
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === true)){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkPassword($password)
  {
    if(isset($password) && $password !== "")
    {
      if(preg_match('/(?=.*[a-zA-Z])(?=.*\d).{8,255}/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkName($name)
  {
    if(isset($name) && $name !== "")
    {
      if(preg_match('/^\w{2,255}(?!=\W)$/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkPhone($phone)
  {
    if(isset($phone) && $phone !== ""){
      if(preg_match('/^(?:\(\+?[0-9]{2}\))?(?:[0-9]{6,10}|[0-9]{3,4}(?:(?:\s[0-9]{3,4}){1,2}))$/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkAddress($address)
  {
    if(isset($address) && $address !== ""){
      if(preg_match('/^[0-9]{1,5},?\s\w{2,64}\s\w{2,64},?\s\w{2,64}$/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkPost($postcode)
  {
    if(isset($postcode) && $postcode !== ""){
      if(preg_match('/^[0-9]{4}$/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkState($state)
  {
    if(isset($state) && $state !== ""){
      if(preg_match('/^ACT|NSW|NT|QLD|SA|TAS|VIC|WA$/')){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkMatch($input1, $input2)
  {
    if($input1 === $input2)
    {
      return true;
    }else{
      return false;
    }
  }

 ?>
