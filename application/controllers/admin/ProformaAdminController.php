<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProformaAdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/ProformaAdmin', 'ProformaAdmin');
		$this->load->model('admin/CommandeAdmin', 'CommandeAdmin');
	}

    public function proforma()
	{
		// $this->ProformaAdmin->proforma();
        $data = array();
		$data['info']=$this->ProformaAdmin->fproforma();
		$this->load->view('admin/listProforma', $data);
	}
    public function proposition()
	{
		// $this->ProformaAdmin->proforma();
        $data = array();
        $id = $this->input->get('idfournisseur');
		$data['info']=$this->ProformaAdmin->proposition($id);
		$this->load->view('admin/proposition', $data);
	}
	public function mora()
	{
		// $this->ProformaAdmin->proforma();
        $data = array();
		$data =$this->ProformaAdmin->proformamora();
		$this->load->view('admin/listmora', $data);
	}
	public function commander(){
		$designation=$this->input->post('designation[]');
		$nombre=$this->input->post('nombre[]');
		$nomfournisseur=$this->input->post('nomfournisseur[]');
		$idfournisseur=$this->input->post('idfournisseur[]');
		$montant=$this->input->post('montant[]');
	    for($i=0;$i<count($designation);$i++){
        //   echo $data['designation']=$designation[$i];
        //    echo $data['nombre']=$nombre[$i];
		//    echo $data['nomfournisseur']=$nomfournisseur[$i];
		//    echo $data['idfournisseur']=$idfournisseur[$i];
		
		 $data1=$designation[$i];
		 $data2=$nombre[$i];
		 $data3=$nomfournisseur[$i];
		 $data4=$idfournisseur[$i];
		 $data5=$montant[$i];
		   $sql="INSERT INTO Commande(designation,nombre,idfournisseur,montant) values ('$data1','$data2','$data4',$data5);";
		//    $sql="UPDATE Commande set etat=1 where designation='$data1' and nombre='$data2' and idfournisseur='$data4'";
            if($this->CommandeAdmin->saveCommande($sql)==true){
                  echo "recorded successfully";
				//   $sql2="UPDATE Commande set etat=1 where
				// 	designation='$data1' and nombre='$data2' and idfournisseur='$data4' and montant=$data5;";
				}
              else{
                  echo "error";
              }
      }
	}

}
