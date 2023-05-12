<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginFournisseurController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('fournisseur/LoginFournisseur', 'LoginFournisseur');
     }
     
     //affiche l'accueil du client 
     public function accueil()
     {
          //echo 'Mety';
          $this->load->view('fournisseur/accueil');
     }
     //authentification côté client
     public function login()
     {
          
          if ($this->input->server('REQUEST_METHOD') == 'POST') {
               $contact = $this->input->post('contact');
               $pass = $this->input->post('mdp');

               $exists = $this->LoginFournisseur->login($contact, $pass);

               if (isset($exists)) {
                    // $_SESSION['user'] = $exists;
                    $this->load->library('form_validation');
                    $this->load->library('session');
                    $this->session->set_flashdata('idFournisseur',$exists);  
                    $refa_ampesaina_le_session=$this->session->flashdata('idFournisseur');          
                    $this->accueil();
               } else {
                    $data['error'] = " Veuillez vérifier vos informations";
                    $this->load->view('fournisseur/login', $data);
               }
          } else 
          {
               $this->load->view('fournisseur/login');
          }
     }
}
