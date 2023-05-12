<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockFournisseurController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session'); 
		$this->load->model('fournisseur/StockFournisseur', 'StockFournisseur');
	}

	public function formAjouterStock()
	{
		$id = $this->input->get('idfournisseur');
		$this->session->set_flashdata('idFournisseur',$id);  
		$data = array();
		$data['info'] = $this->StockFournisseur->listArticle();
		$this->load->view('fournisseur/ajouterStock', $data);
	}

	public function formsortie()
	{
		$idFournisseur = $this->input->get('idfournisseur');
		$stock = $this->input->get('stock');
		$idstock = $this->input->get('idstock');
		$methode = $this->input->get('methode');
		$this->session->set_flashdata('idFournisseur',$idFournisseur);  
		$data = array();
		if($methode=="CMUP"){
			$data['info2'] = $this->StockFournisseur->cmup1($idFournisseur,$stock);
		}
		else if($methode=="FIFO"){
			$data['info2'] = $this->StockFournisseur->fifo($idFournisseur,$stock);
		}
		else if($methode=="LIFO"){
			$data['info2'] = $this->StockFournisseur->lifo($idFournisseur,$stock);
		}
		$data['info'] = $this->StockFournisseur->listArticle1($idFournisseur,$stock,$idstock);
		$this->load->view('fournisseur/formsortie', $data);
	}

	public function formAjouterArticle()
	{
		$id = $this->input->get('idfournisseur');
		$this->session->set_flashdata('idFournisseur',$id);  
		$idFournisseur = $this->input->get('idfournisseur');
		$this->load->view('fournisseur/ajouterArticle', $idFournisseur);
	}

	public function listStock()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->listStock($idFournisseur);
		$this->load->view('fournisseur/listStock', $data);
	}

	public function ajouterStock()
	{
		echo $this->input->get('idfournisseur');
		$idFournisseur=$this->input->get('idfournisseur');
        $entree['idfournisseur'] = $this->input->get('idfournisseur');
		$idEntana = $this->input->post('article');
		$nombre = $this->input->post('nombre');
		$entree['identana'] = $this->input->post('article');
		$entree['dateentree'] = $this->input->post('date');
		$entree['prixe'] = $this->input->post('prix');
		$entree['quantite'] = $this->input->post('nombre');
		$methode = $this->input->post('methode');
		$this->ajouterEntree($entree);
		$response = $this->StockFournisseur->saveStock($idFournisseur, $idEntana, $nombre, $methode);
		if ($response == true) {
			echo "Records Saved Successfully";
		} else {
			echo "Insert error !";
			$this->load->view('fournisseur/ajouterFournisseur');
		}
	}
	
	public function sortie()
	{
		echo $this->input->get('idfournisseur');
        $idFournisseur = $this->input->get('idfournisseur');
		//$idEntana = $this->input->post('article');
		$nombre = $this->input->post('nombre');
		$article = $this->input->post('article');
		$date = $this->input->post('date');
		$prix = $this->input->post('prix');
		$nombre = $this->input->post('nombre');
		$methode = $this->input->post('methode');
		if($methode=="cmup"){
			$data['info'] = $this->StockFournisseur->cmup1($idFournisseur,$article);
		}
		else if($methode=="fifo"){
			$data['info'] = $this->StockFournisseur->fifo($idFournisseur,$article);
		}
		else if($methode=="lifo"){
			$data['info'] = $this->StockFournisseur->lifo($idFournisseur,$article);
		}
		$this->load->view('fournisseur/validersortie', $data);
	}
	public function ajouterEntree($entree)
	{
		$response = $this->StockFournisseur->saveEntree($entree);
		if ($response == true) {
			echo "Records Saved Successfully";
		} else {
			echo "Insert error !";
			$this->load->view('fournisseur/ajouterFournisseur');
		}
	}

	public function ajouterSortie(){
		$idstockfournisseur = $this->input->get('idstock');
		$id = $this->input->get('idfournisseur');
		$nombre = $this->input->post('nombre');
		$article = $this->input->post('article');
		$prix = $this->input->post('prixs');
		$date = $this->input->post('date');
		$response = $this->StockFournisseur->savesortie($id,$nombre,$article,$prix,$date);
		if ($response == true) {
			echo "Records Saved Successfully";
			$this->StockFournisseur->updatestock($idstockfournisseur,$nombre);
			$this->listStock();
		} else {
			echo "Insert error !";
			$this->load->view('fournisseur/ajouterFournisseur');
		}
	}

	public function ajouterArticle()
	{
		$id = $this->input->get('idfournisseur');
		$this->session->set_flashdata('idFournisseur',$id);  
		$data['designation'] = $this->input->post('designation');
		$response = $this->StockFournisseur->saveArticle($data);
		if ($response == true) {
			$this->formAjouterStock();
		} else {
			echo "Insert error !";
			$this->formAjouterArticle();
		}
	}
	
	public function listentree()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->listStock($idFournisseur);
		$this->load->view('fournisseur/historiqueentree', $data);
	}
	public function listesortie()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->listSortie($idFournisseur);
		$this->load->view('fournisseur/historiquesortie', $data);
	}
	public function valeur()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->cmup($idFournisseur);
		$data['info2']=$this->StockFournisseur->total($idFournisseur);
		$this->load->view('fournisseur/valeurs', $data);
	}
	public function lifo()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->listlifo($idFournisseur);
		$data['info2']=$this->StockFournisseur->total($idFournisseur);
		$this->load->view('fournisseur/lifo',$data);
	}
	public function fifo()
	{
		$data = array();
		$idFournisseur = $this->input->get('idfournisseur');
		$data['info'] = $this->StockFournisseur->listfifo($idFournisseur);
		$data['info2']=$this->StockFournisseur->total($idFournisseur);
		$this->load->view('fournisseur/fifo',$data);
	}
}
