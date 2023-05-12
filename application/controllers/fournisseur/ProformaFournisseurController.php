<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProformaFournisseurController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('fournisseur/FicheFournisseur', 'FicheFournisseur');
     }

    public function faire_proforma()
	{
	 	$data=$this->input->post('iddemande[]');
		  foreach($data as $row){
			// $data['iddemandeentreprise']=$row;
			//  $row;
			$idfournisseur=$this->input->post('idfournisseur');
			$sql="insert into proforma(idfournisseur,iddemandeentreprise) values('$idfournisseur','$row');";
		 $response=$this->FicheFournisseur->saveProforma($sql);	
		} 
		if($response==true){
				echo "Records Saved Successfully";
		}
		else{
				echo "Insert error !";
		}
	}
	public function ouvrir_proforma(){
	$idfournisseur=$this->input->get('idfournisseur');
	$idEntreprise=1;
	$data = array();
	$data['info']=$this->FicheFournisseur->Fiche($idEntreprise,$idfournisseur);
	$data['info2']=$this->FicheFournisseur->select_fournisseur($idfournisseur);
	$data['id']=$idfournisseur;
	  $this->load->view('fournisseur/demandeentreprise',$data);
	}
	
	public function listcommandelivrer($id) {
		$csx = $this->db;
		$sql = "select * from commande 
		join proformafournisseur on commande.idfournisseur=proformafournisseur.idfournisseur
		Where Etat=1 and commande.idfournisseur=".$id;
		$query = $csx->query($sql);
		return $query->result_array();
	 }
}