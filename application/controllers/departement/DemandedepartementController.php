<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DemandedepartementController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('departement/DemandeDepartement', 'DemandeDepartement');
     }

     public function listDemande()
     {
         $data = array();
         $id = $this->input->get('iddept');
         $data['info']=$this->DemandeDepartement->listDemande($id);
         $this->load->view('departement/listDemande', $data);
     }
     
     public function formDemande()
     {
         $this->load->view('departement/formDemande');
     }
     
     public function form_modifDemande()
     {
        $data = array();
        $id = $this->input->get('iddemandedept');
        $data['info']=$this->DemandeDepartement->listDemandeupdate($id);
         $this->load->view('departement/formmodDemande',$data);
     }
     public function insertDemande(){
        $data['iddept']= $this->input->get('iddept');
		$data['designation']=$this->input->post('designation');
	 	$data['nombre']=$this->input->post('nombre');
        $data['idtypefournisseur']=$this->input->post('categorie');
		$response=$this->DemandeDepartement->saveDemande($data);
		if($response==true){
				echo "Records Saved Successfully";
		}
		else{
				echo "Insert error !";
                $this->load->view('departement/formDemande');
		}
     }
     
     public function updaterDemande(){
        $id= $this->input->get('iddemandedept');
		$designation=$this->input->post('designation');
	 	$nombre=$this->input->post('nombre');
        $cate=$this->input->post('categorie');
		$response=$this->DemandeDepartement->updateDemande($nombre,$designation,$cate,$id);
		if($response==true){
				echo "updated Successfully";
		}
		else{
				echo "update error !";
                $this->form_modifDemande();
		}
     }
     public function listStockdept(){
        $data = array();
        $id = $this->input->get('iddept');
        $data['info']=$this->DemandeDepartement->Stockdept($id);
        $this->load->view('departement/listStockdept', $data);
     }
}
