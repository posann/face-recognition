<?php
/**
 * 
 */
class Api extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json; charset=utf-8');
	}
	public function saveuser()
	{
		$data = $this->input->post();
		$cek = $this->db->get_where("client",['name'=>$data['name']])->num_rows();
		if ($cek == 1) {
			$result = [
				'code'=>203,
				'message'=>"Nama sudah terdaftar, silahkan menggunakan nama lain"
			];
		}else{
			$img = str_replace('data:image/png;base64,', '', $data['images']);
			$imgs = str_replace(' ', '+', $img);
			$file_data = base64_decode($imgs);
			$file_name = $data['name'].".png";
			$path = './client/';
			file_put_contents($path . $file_name, $file_data);
			$save = $this->db->insert("client",[
				'name'=>$data['name'],
				'jabatan'=>$data['jabatan'],
				'images'=>$file_name,
				'code'=>uniqid()
			]);
			if ($save) {
				$result = [
					'code'=>200,
					'message'=>"Data berhasi disimpan"
				];
			}else{
				$result = [
					'code'=>203,
					'message'=>"Data gagal disimpan"
				];
			}
		}
		echo json_encode($result);
	}
	public function saverecord()
	{
		$data = $this->input->post();
		$img = str_replace('data:image/png;base64,', '', $data['images']);
		$imgs = str_replace(' ', '+', $img);
		$file_data = base64_decode($imgs);
		$file_name = $data['code'].".png";
		$path = './client/';
		file_put_contents($path . $file_name, $file_data);
		$save = $this->db->insert("scan",[
				'code'=>$data['code'],
				'images'=>$file_name
			]);
		if ($save) {
			$result = [
				'code'=>200,
				'message'=>"Data berhasi disimpan"
			];
		}else{
			$result = [
				'code'=>203,
				'message'=>"Data gagal disimpan"
			];
		}
		echo json_encode($result);
	}
	public function cekImages($images1,$images2)
	{
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', 'https://api.faceonlive.com/sntzbspfsdupgid1/api/face_compare', [
		  'http_errors' => false,
		  'multipart' => [
		    [
		    'name' =>  'image1',
		    'contents' =>  fopen('C:\xampp\htdocs\opencv\client\\'.$images1, 'rb'),
		    ],
		    [
		    'name' =>  'image2',
		    'contents' =>  fopen('C:\xampp\htdocs\opencv\client\\'.$images2, 'rb'),
		    ],
		  ],
		  'headers' => [
		    'X-BLOBR-KEY' => 'sIWawrzksxAYeCXNH8sZhjvu8r8h2vds',
		  ],
		]);
		return $response->getBody();
	}
	public function validasi()
	{
		$data = $this->db->get_where("client",['id'=>$_GET['id']])->row();
		$result = json_decode($this->cekImages($_GET['images'],$data->images));
		if ($result->data->result == "Same") {
			$results = [
				'code'=>200,
				'message'=>"Data Wajah Ditemukan",
				'data'=>$data->name
			];
		}else{
			$results = [
				'code'=>203,
				'message'=>"Data Wajah Tidak Ditemukan",
				'data'=>null
			];
		}
		echo json_encode($results);
	}
}