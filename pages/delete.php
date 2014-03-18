<?php
function delete_page_callback() {
  global $db;
  $id = $_GET['id'];
  if (isset($_POST['yes'])){
    $STH = $db->prepare("DELETE  FROM news WHERE id = '$id' ");
    $STH->execute();
    header("Location: /");
  }
  if (isset($_POST['no'])){
    header('Location: index.php?page=watch&id=' . $id);
  }

  $out = '';
  $out .= '<div id = "areyou"><h1>Are you shure?</h1></div>';
  $out .= '<div id="shure">
  <form method="post" action="">
  <input type="submit" name="yes" value="yes">
  <input type="submit" name="no" value="NO">
  </form>
  </div>';
  return $out;
}
?>




