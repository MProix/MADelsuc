<?php include 'header.html'; ?>
<div id="central_part">
    <div id="publis_part">
<?php
function scraper ($url) {
// permet de récupérer le contenu d'une page
// User Agent
$ua = 'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
// le scraper suit les redirections
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$result = curl_exec($ch);
curl_close ( $ch );
return $result;
}
$toto = scraper ("https://scholar.google.com/citations?hl=en&user=HHoFyUUAAAAJ&view_op=list_works&sortby=pubdate");
preg_match_all('/<tr class="gsc_a_tr">(.*?)<\/tr>/s', $toto, $match);
// echo '<div id="hidden_publis">'.$toto4[1].'"</div>';
$listOfPublis = array();
foreach($match[0] as $value){
    // echo $value;
    $list = array();
    preg_match_all('/<a href="java(.*?)<\/a>/s', $value, $match);
    array_push($list,explode('class="gsc_a_at">',$match[1][0])[1]);    
    preg_match_all('/<div class="gs_gray">(.*?)<\/div>/s', $value, $toti);
    array_push($list,$toti[1][0]);
    preg_match_all('/<div class="gs_gray">(.*?)<span/s',$toti[0][1],$titi);
    array_push($list,$titi[1][0]);
    preg_match_all('/<span class="gs_oph">, (.*?)<\/span>/s',$toti[0][1],$titi);
    array_push($list,$titi[1][0]);
    array_push($listOfPublis, $list);
};
?>
<script>
    var publisList=<?php echo json_encode($listOfPublis); ?>;
    //inject publis from google scholar on publication page
    publisList= publisList.map(JSON.stringify).reverse() // convert to JSON string the publisListay content, then reverse it (to check from end to begining)
    .filter(function(item, index, publisList){ return publisList.indexOf(item, index + 1) === -1; }) // check if there is any occurence of the item in whole array
    .reverse().map(JSON.parse) // revert it to original state
    for(let i of publisList){
        $("#publis_part").append("<h2>"+i[0]+"</h2><p>"+i[1]+"</p><p>"+i[2]+"</p><p>"+i[3]+"</p>");
    }
</script>
</div>
</div>
<?php include 'footer.html'; ?>