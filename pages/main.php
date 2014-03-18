<?php
function main_page_callback() {
	global $db;
  $cur_page = 1;
  $pubs = 10;
  if (isset($_GET['n_page']) && $_GET['n_page'] > 0) {
    $cur_page = $_GET['n_page'];
  }
  $start = ($cur_page - 1) * $pubs;
  $quer = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT $start, $pubs");
  $dani = $quer->fetch(PDO::FETCH_ASSOC);
  $querr = $db->query("SELECT count(*) FROM news");
  $general_pubs = $querr->fetch(PDO::FETCH_NUM);
  $gen_pub = $general_pubs[0];
  $gen_pages = ceil($gen_pub/$pubs);
  $pag = 0;
	$out = '';

  do {
  	$id = $dani['id'];
  	$out .= '<div class="newsmain">';
  	$out .=  'Title: ' . $dani['title'] . '<br>';
  	$out .=  'Sended by: ' . $dani['user'] . '<br>';
  	$out .=  'Time: ' . $dani['dat'] . '<br>';
  	$out .=  cutstring($dani['tex'], 150);
  	$out .=  '<a href="index.php?page=watch&amp;id=' . $id . '">Read More</a>';
  	$out .=  '</div>';
  } while ($dani = $quer->fetch(PDO::FETCH_ASSOC));
  $out .= '<div id="pager">';
  while ($pag++ < $gen_pages) {
    if ($pag == $cur_page) {
      $out .=  $pag ;
    }
    else {
      $out .= '<a href="index.php?page=main&amp;n_page=' . $pag . '"> ' . $pag . '</a>';
    }
  }
 $out .= '</div>';
	return $out;
}
?>

