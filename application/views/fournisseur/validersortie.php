<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h1>Mode de sortie <?php echo $_POST['methode']; ?></h1>
    <form action="<?= site_url('fournisseur/StockFournisseurController/ajouterSortie')?>?idfournisseur=<?php echo $_GET['idfournisseur']; ?>"" method="post">
    <table border="1">
        <tr>
            <th>nombre</th>
            <th>designation</th>
            <th>prix</th>
            <th>date</th>
        </tr>
        <tr>
            <td><input type="text" value="<?php echo $_POST['nombre']; ?>" name="nombre" readonly></td>
            <td><input type="text" value="<?php echo $_POST['article']; ?>" name="article" readonly></td>
            <?php foreach ($info as $row) { ?>
                <td><input type="text" value="<?php echo $row['prix']; ?>" name="prix" readonly></td>
            <?php } ?>
            <td><input type="text" value="<?php echo $_POST['date']; ?>" name="date" readonly></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="effectuer la sortie">
    </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>