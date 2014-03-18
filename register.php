<?php
require 'db.php';
 if(isset($_POST['reg'])){
 $login = $_POST['login'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $r_password = $_POST['r_password'];
 if ($password == $r_password) {
  $password=md5($password);
 $insert = array('username'=>$login, 'email'=>$email, 'password'=>$password);
 $STH = $db->prepare("INSERT INTO users (username, email, password) values(:username, :email, :password)");
 $STH->execute($insert);
 header('Location: register.php');
 }
 else {
 	print "passwords do not match";
 }
 }
 ?>


<form method="post" action="register.php">
<input type="text" name="login" required><br>
<input type="text" name="email" required><br>
<input type="password" name="password" required><br>
<input type="password" name="r_password" required><br>
<input type="submit" name="reg" value="register">
</form>

