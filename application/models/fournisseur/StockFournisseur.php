<?php
defined('BASEPATH') or exit('No direct script access allowed');
class StockFournisseur extends CI_Model
{

    public function listStock($idFournisseur)
    {
        $csx = $this->db;
        // $sql = "SELECT designation, nombre, prixe FROM StockFournisseur
        // INNER JOIN Entana ON StockFournisseur.idEntana = Entana.idEntana
        // INNER JOIN Entree ON StockFournisseur.idEntree = Entree.idEntree
        // where idFournisseur = ". $idFournisseur;
        $sql = "SELECT * from v_liststock
        where idFournisseur = ". $idFournisseur;
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function listfifo($id)
    {
        $csx = $this->db;
        $sql = "select dateentree,designation,nombre,prixe from v_liststock where methode='FIFO' and idfournisseur='$id' order by dateentree asc";
        $query = $csx->query($sql);
        return $query->result_array();
       
    }

    public function listlifo($id)
    {
        $csx = $this->db;
        $sql = "select dateentree,designation,nombre,prixe from v_liststock where methode='LIFO' and idfournisseur='$id'
        order by dateentree desc";
        $query = $csx->query($sql);
        return $query->result_array();
    }

    public function total($id)
    {
        $csx = $this->db;
        $sql = "select SUM(prixe) as prix,SUM(nombre) as nombre from v_liststock where idfournisseur='$id'";
        $somme = $csx->query($sql);
        return $somme->result_array();
       
    }

    public function listSortie($idFournisseur)
    {
        $csx = $this->db;
        $sql = "SELECT distinct(sortie.idsortie),entana.designation, sortie.datesortie,StockFournisseur.nombre, sortie.prixs FROM StockFournisseur
        INNER JOIN Entana ON StockFournisseur.idEntana = Entana.idEntana
        INNER JOIN sortie ON Entana.idEntana = sortie.idEntana
        where StockFournisseur.idFournisseur =' $idFournisseur'";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function listArticle()
    {
        $csx = $this->db;
        $sql = "SELECT * from Entana";
        $query = $csx->query($sql);
        return $query->result_array();
    }

    public function listArticle1($idFournisseur,$stock,$idstock)
    {
        $csx = $this->db;
        $sql = "SELECT prixe,designation,methode from v_liststock 
        where designation='$stock' and idfournisseur='$idFournisseur' and idstockfournisseur='$idstock'
        GROUP BY prixe,designation,methode";
        $query = $csx->query($sql);
        return $query->result_array();
    }

    function saveStock($idFournisseur, $idEntana, $nombre, $methode)
    {
        $csx = $this->db;
      echo  $sql = "INSERT INTO StockFournisseur (idFournisseur,idEntana, idEntree,nombre,methode) VALUES ($idFournisseur,$idEntana,(select MAX(idEntree) from entree),$nombre,'$methode')";
         $csx->query($sql);
        return true;
    }
    function saveEntree($data)
    {
        $this->db->insert('entree', $data);
        return true;
    }
    
    function savesortie($id,$nombre,$article,$prix,$date)
    {
        $csx = $this->db;
        echo $sql = "INSERT INTO sortie(identana,idfournisseur,datesortie,prixs,quantite) VALUES ((select identana from entana where designation='$article'),$id,'$date',$prix,$nombre)";
        $csx->query($sql);
        return true;
    }
    function updatestock($idstockfournisseur,$nombre){
        $csx = $this->db;
        echo $sql = "update stockfournisseur set nombre=(nombre-$nombre)
        where idstockfournisseur='$idstockfournisseur'";
        $csx->query($sql);
        return true;
    }

    function saveArticle($data)
    {
        $this->db->insert('entana', $data);
        return true;
    }
    public function cmup($idFournisseur){
        $csx = $this->db;
        echo $sql = "SELECT Designation, SUM(nombre) as nombre,AVG(prixe) as moyenne FROM v_liststock 
        where idFournisseur ='$idFournisseur' and methode='CMUP'
        GROUP BY Designation";
         $query = $csx->query($sql);
         return $query->result_array();
    } 
    public function cmup1($idFournisseur,$article){
        $csx = $this->db;
        echo $sql = "SELECT Designation,AVG(prixe) as prix,SUM(nombre) as nombre FROM v_liststock 
        where idFournisseur ='$idFournisseur' and Designation='$article' and methode='CMUP'
        GROUP BY Designation";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
 
    public function fifo($idFournisseur,$article){
        echo "fifo";
        $csx = $this->db;
        echo $sql = "select first_VALUE(prixe) over(partition by dateentree
        order by dateentree desc
        rows between unbounded preceding and unbounded following) as prix,nombre from v_liststock where
        dateentree=(select max(dateentree) from v_liststock where
        idFournisseur ='$idFournisseur' and Designation='$article' and methode='FIFO') limit 1";
        $query = $csx->query($sql);
        return $query->result_array();
    }     
    public function lifo($idFournisseur,$article){
        echo "lifo";
        $csx = $this->db;
        echo $sql = "select prixe as prix,nombre from v_liststock 
        where dateentree=(select max(dateentree) from v_liststock where
        idFournisseur ='$idFournisseur' and Designation='$article' and methode='LIFO') limit 1";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
}
?>
<!-- select prixe as prix from v_liststock
        where dateentree=(select min(dateentree) from v_liststock where
        idFournisseur ='1' and Designation='Stylo' and methode='FIFO') order by dateentree desc limit 1; -->