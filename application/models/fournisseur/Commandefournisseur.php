<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commandefournisseur extends CI_Model
{
// fonction qui prend un client si le compte existe dans la base
     public function listcommande($id) {
        $csx = $this->db;
      //   $sql = "select * from commande 
      //   join proformafournisseur on commande.idfournisseur=proformafournisseur.idfournisseur
      //   Where Etat=0 and commande.idfournisseur=".$id;
      $sql = "select * from commande 
      Where Etat=0 and idfournisseur=".$id;  
      $query = $csx->query($sql);
        return $query->result_array();
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

// select distinct(idcommande),commande.nombre,proformafournisseur.idfournisseur,commande.designation,commande.nombre,proforma.montant  from commande 
//         join proformafournisseur on commande.idfournisseur=proformafournisseur.idfournisseur
//         join proforma on proforma.idproforma=proformafournisseur.idproforma
//         Where Etat=0 and commande.idfournisseur=1;