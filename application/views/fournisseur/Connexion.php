<?php 
function dbconnect()
{
 $connect=null;
 try{

$connect=new PDO('pgsql:host=localhost;port=5432;dbname=achat_vente','postgres','071204');

}
catch(PDOException $ex){
echo $ex;
}
return $connect;
}


?>