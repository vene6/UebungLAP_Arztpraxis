<?php

$server = 'localhost:3306';
$user = 'root';
$pwd = 'admin';
$schema = 'arztpraxis';

try
{
  $conn = new PDO('mysql:host='.$server.';dbname='.$schema.';
  charset=utf8', $user, $pwd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(Exception $e)
{
  echo 'Fehler - '.$e->getCode().': '.$e->getMessage().'<br>';
}