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
?>

<?php
  function dbquery($sql) {
  global $db; 
  $quer = $db->query($sql);
  $dani = $quer->fetch(PDO::FETCH_ASSOC);
  return $dani;
}
?>  

// <?php
// function db_query($query) {
//   $quer = $db->query($query);
//   $dani = $quer->fetch(PDO::FETCH_ASSOC);
//   return $dani;
//   return $quer;
// }
// ?>
