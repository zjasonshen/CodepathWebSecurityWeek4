<?php
  require_once('../private/initialize.php');

  $signed_string = $_COOKIE['encrypted'];
  echo "encrypted-cookie = " . $_COOKIE['encrypted'];

  // check for valid signature
  if(signed_string_is_valid($signed_string)){
    $encrypted_string = explode("--", $signed_string);
    echo "<br/>";
    $message = decrypt($encrypted_string[0]);
    echo "Secret message: " . $message . "<br/>";
    echo "----";
  }
  else{
    echo "Error: Invalid Signature.";
    exit;
  }
?>
