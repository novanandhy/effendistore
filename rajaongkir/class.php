<?php

	class RajaOngkir {
		
		function call_get($url){
			$header = array(
						"Content-Type: application/json",
						"key:58b6390da55fbf1df77e2469315bed87"
					);

					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_ENCODING ," ");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);		
					curl_setopt($ch, CURLOPT_FAILONERROR, 0);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
					curl_setopt($ch, CURLOPT_URL, $url);
					
					$returned =  curl_exec($ch);
				
					return($returned);
			
		}
		
		function curl_post($url,$data){
			$header = array(
						"Content-Type: application/x-www-form-urlencoded",
						"key:58b6390da55fbf1df77e2469315bed87"
					);

					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_VERBOSE, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);		
					curl_setopt($ch, CURLOPT_FAILONERROR, 0);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					
					$returned =  curl_exec($ch);
				
					return($returned);
			
		}
			
		
	}

?>