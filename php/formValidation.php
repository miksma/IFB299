<?php

  function checkEmail($email)
  {
    if(isset($email) && $email !== "")
    {
      if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
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
      if(preg_match('/(?=.*[a-zA-Z])(?=.*\d).{8,255}/', $password)){
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
      if(preg_match('/^\w{2,255}(?!=\W)$/', $name)){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkFullName($name)
  {
    if(isset($name) && $name !== "")
    {
      if(preg_match('/^[\w]{2,255}(?:\s[\w]{2,255})*(?!=\W)$/', $name)){
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
      if(preg_match('/^(?:\(\+?[0-9]{2}\))?(?:[0-9]{6,10}|[0-9]{3,4}(?:(?:\s[0-9]{3,4}){1,2}))$/', $phone)){
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
      if(preg_match('/^[0-9]{1,5},?\s\w{2,64}\s\w{2,64},?\s\w{2,64}$/', $address)){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkPost($postCode)
  {
    if(isset($postCode) && $postCode !== ""){
      if(preg_match('/^[0-9]{4}$/', $postCode)){
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
      if(preg_match('/^ACT|NSW|NT|QLD|SA|TAS|VIC|WA$/', $state)){
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

  //TO DO
  function checkDescription($description)
  {
    return true;
  }

  function checkWeight($weight)
  {
    if(isset($weight) && $weight !== ""){
      if(preg_match('/^[1-9][0-9]{0,3}$/', $weight)){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function checkSet($input)
  {
    if(isset($input) && $input !== ""){
      return true;
    }else{
      return false;
    }
  }

  //to do
  function checkTime($time)
  {
    if(isset($time) && $time !== ""){
      return true;
    }else{
      return false;
    }
  }

  function checkStatus($status)
  {
    if(isset($status))
    {
      if(preg_match('/^Ordered|Picking Up|Picked Up|Storing|Delivering|Delivered$/', $status))
      {
        return true;
      }else{
        return false;
      }
    }else{
      return true;
    }
  }

  function checkPriority($priority)
  {
    if(isset($priority))
    {
      if(preg_match('/^Standard|Express$/', $priority))
      {
        return true;
      }else{
        return false;
      }
    }else{
      return true;
    }
  }
 ?>
