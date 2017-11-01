<?php
	require_once 'class.php';
	
	$rajaongkir= new RajaOngkir();
	
	$prov=$_GET['id'];
	$u_City		="https://api.rajaongkir.com/starter/city?province=".$prov;

	$city	 =	json_decode($rajaongkir->call_get($u_City),true);
	echo "<option>Pilih kota/kab</option>";
	for($i=0; $i<count($city['rajaongkir']['results']); $i++ ){
									
		echo "<option id='id' value='".$city['rajaongkir']['results'][$i]['city_id']."'>".$city['rajaongkir']['results'][$i]['city_name']."</option>";
	} 
?>