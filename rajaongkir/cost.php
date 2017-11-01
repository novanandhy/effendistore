<?php
	
	require_once 'class.php';
	
	$rajaongkir = new RajaOngkir();

	$kota	 	=	444;
	$kota_tuj	=	$_POST['kota_tuj'];
	$berat	 	=	1000;
	$kurir	 	=	$_POST['kurir'];
	$u_Cost		=	"https://api.rajaongkir.com/starter/cost";	
	$data	 	=	"origin=".$kota."&destination=".$kota_tuj."&weight=".$berat."&courier=".$kurir;
	$res		=	json_decode($rajaongkir->curl_post($u_Cost,$data),true);
	
	//print_r($res['rajaongkir']['results'][0]);
		
	// echo "<div class='alert alert-info col-md-4'>

	// 	<h3> Deskripsi</h3>			
	// 	 Kurir	 :	".$res['rajaongkir']['results'][0]['code']."<br>
	// 	 Nama Kurir	 :	".$res['rajaongkir']['results'][0]['name']."<br>
	// 	 <i>Pilihan Service</i><br><br>";
		 
	// 	 for($i=0; $i<count($res['rajaongkir']['results'][0]['costs']); $i++){
	// 		 echo "Service:".$res['rajaongkir']['results'][0]['costs'][$i]['service']."<br>";
	// 		 echo "Deskripsi:".$res['rajaongkir']['results'][0]['costs'][$i]['description']."<br>";
	// 		 echo "Biaya:".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value']."<br>";
	// 		 echo "Waktu Sampai:".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd']." <br>";
	// 		 echo "Catatan:".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['note']." <br><br>";
	// 	 }
		 
	// echo "</div>";

	echo "<center><label class='font-white'>Nama Kurir</label></center>
		<center><p class='font-white'>".$res['rajaongkir']['results'][0]['name']."</p></center>";

	echo "<table class='table font-white' style='margin-left: 30px; margin-right: 30px;'>
			<thead>
				<tr>
					<th>Service</th>
					<th>Deskripsi</th>
					<th>Biaya</th>
					<th>Waktu (hari)</th>
					<th>Catatan</th>
				</tr>
			</thead>
			<tbody>";
			for($i=0; $i<count($res['rajaongkir']['results'][0]['costs']); $i++){
				echo "<tr>
					<td>".$res['rajaongkir']['results'][0]['costs'][$i]['service']."</td>
					<td>".$res['rajaongkir']['results'][0]['costs'][$i]['description']."</td>
					<td>".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value']."</td>
					<td>".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd']."</td>
					<td>".$res['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['note']."</td>
				</tr>";
			}
	echo "	</tbody>
		</table>";		
?>