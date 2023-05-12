<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginDepartementController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('departement/LoginDepartement', 'LoginDepartement');
     }
     
     //affiche l'accueil du client 
     public function accueil()
     {
          $this->load->view('departement/accueil');
     }
     //authentification côté client
     public function login()
     {
          if ($this->input->server('REQUEST_METHOD') == 'POST') {
               $contact = $this->input->post('contact');
               $pass = $this->input->post('mdp');

               $exists = $this->LoginDepartement->login($contact, $pass);

               if (isset($exists)) {
                    // $_SESSION['user'] = $exists;
                    $this->load->library('form_validation');
                    $this->load->library('session');
                    $this->session->set_flashdata('idDepartement',$exists);  
                    $refa_ampesaina_le_session=$this->session->flashdata('idDepartement');          
                    $this->accueil();
                    //  echo $refa_ampesaina_le_session;
               } else {
                    $data['error'] = " Veuillez vérifier vos informations";
                    $this->load->view('departement/login', $data);
               }
          } else 
          {
               $this->load->view('departement/login');
          }
     }
}
