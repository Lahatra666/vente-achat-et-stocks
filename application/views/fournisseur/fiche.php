<?php
$i=0;
$Total=0;
$Sum;
$taille=0;
foreach($info as $row){
$taille++;
 } ?>


<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
</head>
<body>
<h3>Liste Demande</h3>
<a href="<?php echo base_url('fournisseur/LoginFournisseurController/accueil')?>"><button>Acceuil</button></a>
<table border="1" class="table table-striped">
            <tr>
                <th>Designation</th>
                <th>Dates</th>
                <th>Nombre</th>
            </tr>
            <tr>
<form id="f" action="<?= site_url('fournisseur/ProformaFournisseurController/faire_proforma')?>" method="post">
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['dates'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <input value="<?php echo $id; ?>" type="hidden" name="idfournisseur">
                <input value="<?php echo $row['iddemandeentreprise'] ?>" type="hidden" name="iddemande[]">
            </tr>
            <?php } ?>
        </table>
       
        </form>      
      
        <h4>Saisie Proforma</h4>
 
        <table border="1">
                <tr>
                    <th>Designation</th>
                    <th>nombre</th>
                    <th>montant en Ariary</th>
                </tr>
                           
                <?php foreach($info as $row){ ?>
                    <form id="myForm<?php echo $i ?>"> 
                    <tr>
                  <td><input placeholder="obligatoire" type="text" id="designe<?php echo $i ?>"  name="designe<?php echo $i ?>" value="<?php echo $row['designation'] ?>" /> </td>
                  
                  <input value="<?php echo $i ?>" type="hidden" id="ii" name="ii">
                  <input value="<?php echo $taille ?>" type="hidden" id="taille" name="taille">


                    <td><input placeholder="obligatoire" type="number" name="ref<?php echo $i ?>" id="ref<?php echo $i ?>" onchange="fonction_sup1(this.form.id,<?php echo $i ?>,<?php echo $taille ?>)" />  </td>
                    <td><input type="text" name="test<?php echo $i ?>" id="test<?php echo $i ?>" value="0"readonly/> </td>
          
                </tr>
                </form> 
                <?php $i++;} ?>  
                <td>Total</td>
                    <td></td>
                   
                    <td><input type="text" name="ref7" value="0" id="total" readonly/>  </td>
               </tr>
                </table>
            
              <p><input type="submit" value="envoyer le proforma" onclick="fonction_inserta(<?php echo $i ?>)" ></p>
      
               <br>


        <script>    
     function fonction_sup1(ish,i,taille) {
    var xhr; 
   
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
         }
    }
  
    //Définition des changements d'états  
    var form = document.getElementById(ish);  
    var formData = new FormData(form);

    xhr.open("POST", "Designe",  true); 
  
 

   xhr.send(formData);   
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4){
        if(xhr.status  == 200) {

       retour = JSON.parse(xhr.responseText);
       
console.log(retour);

var a=parseFloat(parseFloat(document.getElementById("ref"+i).value)*retour[0][4]);
          document.getElementById("test"+i).value=a;
          var b=2;
          var a=0;
          console.log(taille);
          for( j=0;j<taille;j++){
            
       a=parseFloat(a)+parseFloat(document.getElementById("test"+j).value);    
          }
          document.getElementById("total").value=a;
        } else {

            document.dyn="Error code " + xhr.status;
     
        }
		}
    }; 
  //XMLHttpRequest.open(method, url, async)

   

}






function fonction_inserta(i) {
    var xhr; 
   
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
         }
    }

  
    //Définition des changements d'états  
    var form ;  
    var formData ;
  
    for( j=0;j<i;j++){
form = document.getElementById("myForm"+j);  
formData = new FormData(form);
    xhr.open("POST", "Insert",  true); 
  
  

   xhr.send(formData); 
    }  
    xhr.open("POST", "Save",  true);
    
   xhr.send(); 
    xhr.onreadystatechange  = function() 
    { 
       if(xhr.readyState  == 4){
        if(xhr.status  == 200) {

            console.log(xhr.responseText);
        } else {

            document.dyn="Error code " + xhr.status;
     
        }
		}
    }; 
  //XMLHttpRequest.open(method, url, async)

   

}

















     </script>
</body>
</html>



