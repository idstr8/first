<?php
  define('ROOT', getcwd());
  require_once 'db.php';
  require_once 'functions.php';

  session_start();
  if(!isset($_GET['page'])){
    $page = 'main';
  }
  else{
    $page = strip_tags(trim($_GET['page']));
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="/style/style.css"/>
<title><?php print get_title($page);?></title>
</head>
<body>
<?php print author();?>

<a href="/">MAIN</a>

<?php
require ('pages/' . "$page" . '.php');
$function = $page . '_page_callback';
if (function_exists($function)) {
	print $function();
}
else {
  print 'PAGE NOT FOUND';
}
?>
</body>
</html>
