<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListeDemandeFournisseurController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('fournisseur/ListeDemandeFournisseur', 'ListeDemandeFournisseur');
     }

    public function ListeDemande()
	{
		$data = array();
          $data['id']=$this->input->get('idfournisseur');
          $data['info']=$this->ListeDemandeFournisseur->ListeDemande();
		$this->load->view('fournisseur/ListeDemande', $data);
	}

    
}
