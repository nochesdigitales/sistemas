<?php
  $con = mysqli_connect("localhost","root","12345678");
  mysqli_set_charset($con,"utf8");
  $db = mysqli_select_db($con,"database");

?>