<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h1>Votre demande</h1>
            <form action="<?= site_url('departement/DemandedepartementController/insertDemande')?>?iddept=<?php echo $_GET['iddept']; ?>" method="post">
                <p>designation <input type="text" name="designation"></p>
                <p>nombre <input type="number" min="0" name="nombre"></p>
                <p> categorie:
                <select name="categorie">
                    <option value="1">Informatique</option>
                    <option value="2">Sante</option>
                    <option value="3">Bureautique</option>
                    <option value="4">Vetement et chaussure</option>
                </select>
                </p>
            <p><input type="submit" value="valider"></p>
            </form>    
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>