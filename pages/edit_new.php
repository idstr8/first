<?php
function edit_new_page_callback() {
  $out = '';
  if (isset($_SESSION['name'])) {
    require 'db.php';
    $id = $_GET['id'];
    $ar = dbquery("SELECT * FROM news WHERE id = '$id'");
    $title = $ar['title'];
    $text = $ar['tex'];
    if (isset($_POST['r_edit'])) {
    	$n_title = $_POST['title'];
      $n_text = $_POST['news'];
      date_default_timezone_set('Europe/Kiev');
      $n_date = date('Y-m-j, h:i:s');
      $STH = $db->prepare("UPDATE news SET title = '$n_title', tex = '$n_text', dat = '$n_date' where id = $id");
      $STH->execute();
      header ("Location: index.php?page=watch&id=" . $id);
    }

    $out .= '<form method="post" action="">
            <input type="text" name="title" value="' . $title . '" required><br>
            <textarea name="news" cols=100 rows=10 required>' . $text . '</textarea><br>
            <input type="submit" name="r_edit" value="Save">
            </form>';
    return $out;
  }
  else {
    print 'You have no rights';
  }
}
?>


