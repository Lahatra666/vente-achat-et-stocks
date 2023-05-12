<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommandeFournisseurController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fournisseur/Commandefournisseur', 'Commandefournisseur');
        $this->load->model('admin/CommandeAdmin', 'CommandeAdmin');
	}
     public function voircommande()
    {
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->Commandefournisseur->listcommande($idFournisseur);
		$this->load->view('fournisseur/commande', $data);
    }

    public function voircommandelivrer()
    {
      $data = array();
      $idFournisseur = $this->input->get('idfournisseur');
      $data['info'] = $this->Commandefournisseur->listcommandelivrer($idFournisseur);
      $this->load->view('fournisseur/commandelivre', $data);
      }

    public function validercommande(){
      $designation=$this->input->post('designation[]');
      $nombre=$this->input->post('nombre[]');
      $idfournisseur=$this->input->post('idfournisseur[]');
      $pu=$this->input->post('pu[]');
        for($i=0;$i<count($designation);$i++){
          $data1=$designation[$i];
          $data2=$nombre[$i];
          $data5=$idfournisseur[$i];
          $data3=$this->input->post('datelivraison');
          $data4=$pu[$i];
            $sql="INSERT INTO Livraison(designation,nombre,idfournisseur,datelivraison,montant)
             values ('$data1','$data2','$data5','$data3','$data4');";
                 if($this->CommandeAdmin->saveCommande($sql)==true){
                 $sql2="update commande set etat=1 
                 where designation='$data1' and nombre='$data2' and idfournisseur='$data5';";
                   $this->CommandeAdmin->saveCommande($sql2);
                       echo "recorded successfully";
             }
                   else{
                       echo "error";
                   }
        }
    }
}
