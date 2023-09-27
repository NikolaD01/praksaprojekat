<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'projekatforma';

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error)
{
  die("nije uspela koneckija." . $conn->connect_error );
}
else
{
  
}
