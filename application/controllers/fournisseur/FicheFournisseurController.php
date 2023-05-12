<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FicheFournisseurController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('fournisseur/FicheFournisseur', 'FicheFournisseur');
     }

     public function fiche()
	{
          $idfournisseur=$this->input->get('idfournisseur');
          $idEntreprise=$this->input->get('idEntreprise');
		$data = array();
		$data['info']=$this->FicheFournisseur->Fiche($idEntreprise,$idfournisseur);
          $data['id']=$idfournisseur;
		$this->load->view('fournisseur/fiche',$data);
	}

     public function Insert()
	{
          $id=$this->input->post('taille');
          $idd=$this->input->post('ii');
          $data['idfournisseur']=$this->input->post('idfournisseur');

          $de="designe%s";
          $nombre="ref%s";
          $montant="test%s";
          $data['m']=$this->input->post('ii');
          $de=sprintf($de,$data['m']);
          $nombre=sprintf($nombre,$data['m']);
          $montant=sprintf($montant,$data['m']);
          $data['info']=$this->input->post($de);
          $data['inf']=$this->input->post($nombre);
          $data['in']=$this->input->post($montant);
		$data['i']=$this->FicheFournisseur->id();
	$this->load->view('fournisseur/Insert',$data);


     }
     public function Designe()
	{
          $data = array();
          $de="designe%s";
          $data['m']=$this->input->post('ii');
          $de=sprintf($de,$data['m']);
          $data['info']=$this->input->post($de);

		$this->load->view('fournisseur/Designe',$data);
	}

     public function Save()
	{
          $data['info']=$this->FicheFournisseur->id();
          $data['idfournisseur']=$this->input->post('idfournisseur');

		$this->load->view('fournisseur/Save',$data);
	}
    
}