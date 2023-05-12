<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommandeAdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/CommandeAdmin', 'CommandeAdmin');
	}

    public function commande()
	{
		$this->CommandeAdmin->commande();
        echo "METY";
	}
    public function livraison()
	{
		// $this->ProformaAdmin->proforma();
        $data = array();
		$data['info']=$this->CommandeAdmin->flivraison();
		$this->load->view('admin/livraison', $data);
	}
	public function recu()
	{
        $data = array();
        $id = $this->input->get('idfournisseur');
		$data['info']=$this->CommandeAdmin->recu($id);
		$data['info2']=$this->CommandeAdmin->daterecu($id);
		$this->load->view('admin/listlivraison', $data);
	}
	public function validerlivraison()
	{
		$id = $this->input->get('idfournisseur');
		$date=$this->input->post('datelivraison');
		$designation=$this->input->post('designation[]');
		$nombre=$this->input->post('nombre[]');
		$response = $this->CommandeAdmin->updateetat($date,$id);
		for($i=0;$i<count($designation);$i++){
			$data1=$designation[$i];
			$data2=$nombre[$i];
			$sql="INSERT INTO stockentreprise(designation,nombre)
			values ('$data1','$data2');";
			$this->CommandeAdmin->saveCommande($sql);
		}
		if ($response == true) {
			echo "bien recu";
		} else {
			echo "erreur";
		}
	}
}
