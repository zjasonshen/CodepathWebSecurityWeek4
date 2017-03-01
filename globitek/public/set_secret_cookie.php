<?php
  require_once('../private/initialize.php');

  $string = "Super Secret Master Key.";
  $encrypted_string = encrypt($string);
  
  setcookie('encrypted', sign_string($encrypted_string));
  echo "encrypted_string = " . $encrypted_string . "<br/>";
  echo "signed_string = " . sign_string($encrypted_string) . "<br/>";
  echo "message = " . $string . "<br/>";
  echo "cookie set <br/>";
  echo "encrypted-cookie = " . $_COOKIE['encrypted'];
  
?>
