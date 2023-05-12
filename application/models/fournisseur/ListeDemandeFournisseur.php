<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ListeDemandeFournisseur extends CI_Model
{  
       public function ListeDemande() {
          $csx = $this->db;
          $sql = "select * from DemandeEntreprise Where Etat=0";
          $query = $csx->query($sql);
          return $query->result_array();
     }
}     