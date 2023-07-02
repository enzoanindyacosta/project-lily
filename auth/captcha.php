<?php
$SITE_KEY = '6LdVc3YmAAAAALpMX7tBcOZCcX9gOyaXp8fjy5kr';
$SECRET_KEY = '6LdVc3YmAAAAAIrNZAJPPzsv03hJz4_kf2L2gZT2';

function VerifyCaptcha($response, $secret_key)
{
  $recaptcha = $_POST['g-recaptcha-response'];
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
    . $secret_key . '&response=' . $recaptcha;
  $response = file_get_contents($url);
  $response = json_decode($response);
  return $response->success;
}
