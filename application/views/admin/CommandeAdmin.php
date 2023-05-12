<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommandeAdmin extends CI_Model
{
    public function commande(){
        $csx = $this->db;
        $sql = "INSERT INTO Commande (Designation, Nombre) SELECT Designations, Nombres FROM Proforma";
        $query = $csx->query($sql);
    } 
}