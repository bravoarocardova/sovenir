<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{

	public function index()
	{
		echo "INDEX";
	}

	public function getCity()
	{
		header('Content-Type:application/json');
		// if ($this->request->isAjax()) {
		$province_id = $this->input->get('province_id');
		$data = $this->rajaongkirl->rajaongkir('city', $province_id);
		$res = json_decode($data);
		echo json_encode($res);
		// }
	}

	public function getCost()
	{
		header('Content-Type:application/json');

		// if ($this->request->isAjax()) {
		$get = $this->input->get();

		$origin = $get['origin'];
		$destination = $get['destination'];
		$weight = $get['weight'];
		$courier = $get['courier'];

		$data = $this->rajaongkirl->rajaongkircost($origin, $destination, $weight, $courier);
		$res = json_decode($data);
		echo json_encode($res);
		// return $this->response->setJSON($data);
		// }
	}
}
