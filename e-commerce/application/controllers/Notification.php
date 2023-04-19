<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'your_server_key', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		$this->load->model('Wa_m');
		
    }

	public function index()
	{

		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, 'TRUE');

		$order_id = $result['order_id'];
		//$no_hp = $this->input->post('no_hp');
		$data = [
			'status_code' => $result['status_code']
		];

		$status = [
			'status_booking' => 'Sudah Dibooking'
		];

		if($result['status_code'] == 200){
			$this->db->update('tb_transaksi_midtrans', $data, array('order_id' => $order_id));
			$q = $this->db->select('*')
			      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
			      //->join('tb_data_usaha', 'tb_data_usaha.id_data_usaha = tb_order.id_usaha', 'LEFT')
		          ->where('kode_order', $order_id)
		          ->get('tb_order')
		          ->result();

		    $wa = $this->db->select('*')
		          ->where('id_data_usaha', '1')
		          ->get('tb_data_usaha')
		          ->result();

		    $created_at = new DateTime($q[0]->tanggal_order);
			$userkey = '';
			$passkey = '';
			$telepon = $q[0]->no_hp;
			$message = "Terimakasih telah melakukan konfirmasi pembayaran Booking Self Studio Genixphoto. Konfirmasi pembayaran Anda telah kami terima.\n".
			"\n".
"Kode Booking : ". $order_id ."\n".
"Nama  : ". $q[0]->nama_customer ."\n".
"Paket  : ". $q[0]->nama_produk ."\n".
"Tanggal Booking  : " . date_format($created_at,'d-m-Y')."\n".
"Waktu Booking  : ". $q[0]->waktu_booking."\n".
		"\n".
		"Bersama Self Studio Genixphoto abadikan moment indah dalam hidupmu, tanpa harus jaim atau malu.".
		"\n".
		"#remembermemories"
;

			// 'Terimakasih telah melakukan konfirmasi pembayaran Booking Self Studio Genixphoto. Konfirmasi pembayaran Anda telah kami terima. '.
			// //echo 'Kode Booking   = <b>'. $order_id .'</b><br>'. 
			// 'Kode Booking : ' . $order_id . "<br>".
			// 'Nama : ' . $q[0]->nama_customer . ' '.
			// 'Paket : ' . $q[0]->nama_produk . '  '.
			// 'Tanggal Booking : ' . $q[0]->tanggal_order . ' '.
			// 'Waktu Booking : ' . $q[0]->waktu_booking 
			// ;
			$url = '';
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


			// $wa = $this->db->select('*')
		 //          ->where('id_data_usaha', 1)
		 //          ->get('tb_data_usaha')
		 //          ->result();

			//Kirim WA CS
			$telepon_cs = $wa[0]->wa_cs;
			$message_cs = "Konfirmasi pembayaran Booking Self Studio Genixphoto.\n".
			"\n".
"Kode Booking : ". $order_id ."\n".
"Nama  : ". $q[0]->nama_customer ."\n".
"Paket  : ". $q[0]->nama_produk ."\n".
"Tanggal Booking  : " . date_format($created_at,'d-m-Y')."\n".
"Waktu Booking  : ". $q[0]->waktu_booking
;
	
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
			'to' => $telepon_cs,
			'message' => $message_cs
		));
		$results = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);

		

		}
		

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/

	}
}
