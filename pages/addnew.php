<?php
function addnew_page_callback() {
  global $db;
  $out = '';
  if (isset($_SESSION['name'])) {
  if(isset($_POST['newbutton'])) {
  $title = $_POST['title'];
  $text = $_POST['news'];
  $author = $_SESSION['name'];
  date_default_timezone_set('Europe/Kiev');
  $date = date('Y-m-j, h:i:s');
  $insert = array('title'=>$title , 'dat' => $date, 'tex'=>$text, 'user'=>$author);
  $STH = $db->prepare("INSERT INTO news(title, dat, tex, user) VALUES (:title, :dat, :tex, :user)");
  $STH->execute($insert);
  $arr = dbquery("SELECT * FROM news ORDER BY id DESC");
  $ind = $arr['id'];
  header ('Location: index.php?page=watch&id=' . $ind);
 }

  $out .= '<form method="post">
    <input type="text" name="title" required><br>
    <textarea name="news" cols=100 rows=10 required ></textarea><br>
    <input type="submit" name = "newbutton" value = "Add New">
    </form>';
  }
  else {
  	$out .= 'You have no rights';
  }
  return $out;
}
?>
