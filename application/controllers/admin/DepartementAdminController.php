<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DepartementAdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/DepartementAdmin', 'DepartementAdmin');
    }

    public function listEntree()
	{
		$data = array();
		$data['info']=$this->DepartementAdmin->listEntree();
		$this->load->view('admin/listEntree', $data);
	}

    public function listStock()
	{
		$data = array();
		$data['info']=$this->DepartementAdmin->listStock();
		$depts = array();
		$data['dept']=$this->DepartementAdmin->getDeptInfo();
		$this->load->view('admin/listStock', $data);
	}

    public function listDemandeMitambatra()
	{
        $data = array();
		$data['info']=$this->DepartementAdmin->listDemandeMitambatra();
		$this->load->view('admin/listDemandeMitambatra', $data);
	}

	public function zarainaStock()
	{
		$idStock = $this->input->post('idStock');
		$nombreReste = $this->input->post('nombreReste');
		$nombre = $this->input->post('nombre');
		$this->updateStock($idStock, $this->nombre($nombreReste, $nombre));
		$data['designation']=$this->input->post('designation');
		$des = $data['designation'];
		$designation = $string = str_replace(' ', '', $des);
		$data['iddept']=$this->input->post($designation);
		echo "iddept : " . $data['iddept'];
		$data['nombre']=$this->input->post('nombre');
		$data['daterecu']="2022-11-10";
		$response=$this->DepartementAdmin->saveStockDept($data);
		if($response==true){
				  echo "Records Saved Successfully";
				  $this->load->view('admin/accueil');
		}
		else{
			echo "Insert error !";
  		}
	}

	public function nombre($nombreReste, $nombre){
		$nombres = $nombreReste - $nombre;
		return $nombres;
	}

	public function updateStock($idStock, $nombre)
	{	
		$response=$this->DepartementAdmin->updateStock($idStock, $nombre);
		if($response==true){
				echo "Updated Saved Successfully";
		}
		else
			{
				echo "Insert error !";
		}
	}
}
