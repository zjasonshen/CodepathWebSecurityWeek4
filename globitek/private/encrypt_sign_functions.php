<?php
  // Symmetric Encryption
  const CIPHER_METHOD = 'AES-256-CBC';
  const ENCRYPT_KEY = 'a1b2c3d4e5';

  function encrypt($string, $ec=ENCRYPT_KEY, $cm=CIPHER_METHOD) {
	//$plaintext = 'This is a secret.';I//

	// Needs a key of length 32 (256-bit)
	$key = str_pad($ec, 32, '*');

	// Create an initialization vector which randomizes the
	// initial settings of the algorithm, making it harder to decrypt.
	// Start by finding the correct size of an initialization vector 
	// for this cipher method.
	$iv_length = openssl_cipher_iv_length($cm);
	$iv = openssl_random_pseudo_bytes($iv_length);

	// Encrypt
	$encrypted = openssl_encrypt($string, $cm, $key, OPENSSL_RAW_DATA, $iv);

	// Return $iv at front of string, need it for decoding
	$message = $iv . $encrypted;
	
	// Encode just ensures encrypted characters are viewable/savable
	return base64_encode($message);
  }

  function decrypt($string, $ec=ENCRYPT_KEY ,$cm=CIPHER_METHOD) {

	// Needs a key of length 32 (256-bit)
	$key = str_pad($ec, 32, '*');

	// Base64 decode before decrypting
	$iv_with_ciphertext = base64_decode($string);
	
	// Separate initialization vector and encrypted string
	$iv_length = openssl_cipher_iv_length($cm);
	$iv = substr($iv_with_ciphertext, 0, $iv_length);
	$ciphertext = substr($iv_with_ciphertext, $iv_length);

	// Decrypt
	$plaintext = openssl_decrypt($ciphertext, $cm, $key, OPENSSL_RAW_DATA, $iv);

	return $plaintext;
  }

  function signing_checksum($string) {
    $salt = "qi02BcXzp639"; // makes process hard to guess
    return hash('sha1', $string . $salt);
  }

  function sign_string($string) {
    return $string . '--' . signing_checksum($string);
  }

  function signed_string_is_valid($signed_string) {
    $array = explode('--', $signed_string);
    // if not 2 parts it is malformed or not signed
    if(count($array) != 2) { return false; }

    $new_checksum = signing_checksum($array[0]);
    return ($new_checksum === $array[1]);
  }
?>
