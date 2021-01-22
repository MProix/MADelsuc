<?php
function scraper ($url) {
//permet de récupérer le contenu d'une page
// User Agent
$ua = 'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
// le scraper suit les redirections
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$result = curl_exec($ch);
curl_close ( $ch );
return $result;
}
$toto = scraper("https://scholar.google.com/citations?hl=fr&user=HHoFyUUAAAAJ&view_op=list_works&sortby=pubdate");
preg_match_all ('/<td class="gsc_rsb_std">(.*?)<\/td>/s', $toto, $match);
$nbCitations = $match[1][0];
$citePerYear = (int)(((int)$match[1][1])/5);
$hindex = $match[1][2];
$date = date('F Y');
$variables = array("nbCitations" => $nbCitations,"citePerYear" => $citePerYear, "hindex" => $hindex, "date" => $date);
print_r(json_encode($variables));
?>