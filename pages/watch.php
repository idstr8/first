<?php
  function watch_page_callback() {
  $out = '';
  $out .='<div id="fullnew">';
  global $db;
  $id = $_GET['id'];
  $dani = dbquery("SELECT * FROM news WHERE id = '$id'");
  $out .= $dani['title'] . '<br>';
  $out .= $dani['tex'] . '<br>';
  $out .= 'Date: ' . $dani['dat'] . '<br>';
  $out .= 'Author: ' . $dani['user'];
  if (isset($_POST['del'])){
    header("Location: index.php?page=delete&id=" . $id);
  }
  if (isset($_POST['edit'])){
    header("Location: index.php?page=edit_new&id=" . $id);
  }
  if (isset($_SESSION['name'])){
    $out .= '<form method = "post" action = "">
    <input type = "submit" name = "del" value = "Delete">
    <input type = "submit" name = "edit" value = "Edit">
    </form>';
  }
  return $out;
}
?>



