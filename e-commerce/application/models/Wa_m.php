<?php
class Wa_m extends CI_Model{

	function send($no_hp, $pesan){
		$userkey = '4onqm7';
		$passkey = 'ceabd0a34bde5902f2c8a2da';
		$telepon = $no_hp;
		$message = $pesan;
		$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
		    'userkey' => $userkey,
		    'passkey' => $passkey,
		    'to' => $telepon,
		    'message' => $message
		));
		$results = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);
	}

}
?>