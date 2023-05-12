<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginAdminController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('admin/LoginAdmin', 'LoginAdmin');
     }
     
     //affiche l'accueil du client 
     public function accueil()
     {
          //echo 'Mety';
          $this->load->view('admin/accueil');
     }
     //authentification côté client
     public function login()
     {
          /*$_SESSION['commande'] = isset($_SESSION['commande']) ? $_SESSION['commande'] : array();
          //initialise la session a mettre avant l'appel de la fonction l'ajout de commande
          if (count($_SESSION['commande']) == 0) {
               $_SESSION['verifi'] = 0;
               $_SESSION['k'] = 0;
               $_SESSION['i'] = 0;
               $_SESSION['init'] = 0;
               
               $this->initialize_session();
          }*/
          if ($this->input->server('REQUEST_METHOD') == 'POST') {
               $contact = $this->input->post('contact');
               $pass = $this->input->post('mdp');

               $exists = $this->LoginAdmin->login($contact, $pass);

               if (isset($exists)) {
                    // $_SESSION['user'] = $exists;
                    $this->load->library('form_validation');
                    $this->load->library('session');
                    $this->session->set_flashdata('idAdmin',$exists);  
                    $refa_ampesaina_le_session=$this->session->flashdata('idAdmin');          
                    $this->accueil();
                    //echo $refa_ampesaina_le_session;
               } else {
                    $data['error'] = " Veuillez vérifier vos informations";
                    $this->load->view('admin/login', $data);
               }
          } else 
          {
               $this->load->view('admin/login');
          }
     }
}
