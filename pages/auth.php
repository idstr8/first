<?php
 function author() {
  global $db;
  $out = '';
  if (isset($_POST['enter'])) {
    $e_login = $_POST['e_login'];
    $e_password = $_POST['e_password'];
    $e_password = md5($e_password);
    $dani = dbquery("SELECT * FROM users WHERE username = '$e_login' or email = '$e_login'");
    if ($dani['password'] == $e_password) {
    	$_SESSION['name'] = $dani['username'];
      header ('Location: /');
    }
    else {
      $out .= 'Wrong login or password';
    }
  }
  else
    $e_login = '';

  if (isset($_POST['logout'])){
   unset($_SESSION['name']);
   header ('Location: /');
  }

  if(isset($_SESSION['name'])) {
    $out .= "Hello, " . $_SESSION['name'];
    $out .='<form method="post" action="index.php">
           <input type="submit" name="logout" value="exit">
    	    </form>';
    $out .='<a id="new" href="index.php?page=addnew">Add New</a>';
  }
  else {
    $out .= '<div id="log">
    <form method="post" >
    <input type="text" name="e_login" placeholder ="login or email" value = "' . $e_login . '" required /><br>
    <input type="password" name="e_password" placeholder ="password" required /><br>
    <input type="submit" name="enter" value="Enter"/>
    </form> </div>';
  }

  return $out;
}

?>
