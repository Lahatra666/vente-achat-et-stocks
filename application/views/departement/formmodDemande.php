<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h1>modifier demande</h1>
            <form action="<?= site_url('departement/DemandedepartementController/updaterDemande')?>?iddemandedept=<?php echo $_GET['iddemandedept']; ?>" method="post">
                <?php foreach($info as $row){ ?>
                    <p>designation <input type="text" value="<?php echo $row['designation']?>" name="designation"></p>
                    <p>nombre <input type="number" value="<?php echo $row['nombre']?>" min="0" name="nombre"></p>
                    <p> categorie:
                    <select name="categorie">
                        <option value="1">Informatique</option>
                        <option value="2">Sante</option>
                        <option value="3">Bureautique</option>
                        <option value="4">Vetement et chaussure</option>
                    </select>
                <?php } ?>   
                <input type="submit" value="valider">
            </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>