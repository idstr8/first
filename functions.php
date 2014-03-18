<?php
function cutstring($string, $length) {
  $s_text = mb_substr($string, 0, $length);

  if (mb_strlen($string) > $length) {
  	$cut = mb_strripos ($s_text, ' ');
  }
  else $cut = $length;
    $s_text = mb_substr($string, 0, $cut);
  if (mb_strlen($string) > $cut) {
    	$dot = '...';
    }
    else {
    	$dot = '';
    }
  return $s_text . $dot . '<br>';
}

function dbquery($sql) {
  global $db;
  $quer = $db->query($sql);
  $dani = $quer->fetch(PDO::FETCH_ASSOC);
  return $dani;
}

function get_title($page) {
  $title = '';
  switch ($page){
    case 'main':
      $title = 'Main';
      break;
    case 'addnew':
      $title = 'Add New';
      break;
    case 'delete':
      $title = 'DELETE';
      break;
    case 'edit_new':
      $title = 'Edit new';
      break;
    case 'watch':
      $title = 'Watch new';
  }
  return $title;
}
?>

