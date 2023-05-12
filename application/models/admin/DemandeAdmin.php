<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DemandeAdmin extends CI_Model
{
    public function listDemande(){
        $csx = $this->db;
        $sql = "SELECT Departement.nomDept, datededemande, designation, nombre FROM DemandeDept INNER JOIN Departement ON DemandeDept.iddept=Departement.iddept where etat=0;";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
    public function listDemandeencours(){
        $csx = $this->db;
        $sql = "select*from DemandeEntreprise";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
    public function listDemandeMitambatra(){
        $csx = $this->db;
        $sql = "SELECT Designation, SUM(Nombre) as Nombre FROM DemandeDept where etat=0 GROUP BY Designation";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
}