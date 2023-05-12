<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DemandeAdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/DemandeAdmin', 'DemandeAdmin');
    }

    public function listDemande()
	{
		$data = array();
		$data['info']=$this->DemandeAdmin->listDemande();
		$data['info2']=$this->DemandeAdmin->listDemandeencours();
		$this->load->view('admin/listDemande', $data);
	}
    public function listDemandeMitambatra()
	{
        $data = array();
		$data['info']=$this->DemandeAdmin->listDemandeMitambatra();
		$this->load->view('admin/listDemandeMitambatra', $data);
	}
}
