<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <p>sortie</p>
            <form action="<?= site_url('fournisseur/StockFournisseurController/ajouterSortie')?>?idfournisseur=<?php echo $_GET['idfournisseur']; ?>&&stock='<?php echo $_GET['stock']; ?>'&&idstock=<?php echo $_GET['idstock'];?>" method="post">
            <?php foreach ($info as $row) { ?>
                <p> Methode: <input type="text" value="<?php echo $row['methode'] ?>" name="methode" readonly></p>
                <p> article: <input type="text" value="<?php echo $row['designation'] ?>" name="article" readonly></p>
                <p>Date de sortie <input type="datetime-local" name="date"></p>
            <?php } ?>
            <?php 
            foreach ($info2 as $row) {
            ?> 
            <p>Nombre <input type="number" value="<?php echo $row['nombre'] ?>" name="nombre"></p>
            <p>Prix de sortie :<input type="text" value="<?php echo $row['prix']*1; ?>" readonly>*1.3 = <input type="text" value="<?php echo $row['prix']*1.3;} ?>" name="prixs" readonly></p>
            <p><input type="submit" value="valider"></p>
            </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>
<!-- <input type="text" value="?php echo $info2[1]*1.3; ?" name="prixs" readonly> -->