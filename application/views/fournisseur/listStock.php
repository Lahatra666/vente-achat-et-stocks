<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>LISTE STOCK</h3>
        <table class="table table-striped">
            <tr>
                <th>Article</th>
                <th>Nombre</th>
                <th>Prix</th>
                <th colspan="2">action</th>
            </tr>
            
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['prixe'] ?></td>
                <td><a href="<?php echo base_url('fournisseur/StockFournisseurController/formsortie')?>?idfournisseur=<?php echo $_GET['idfournisseur']; ?>&&stock=<?php echo $row['designation'] ?>&&idstock=<?php echo $row['idstockfournisseur'] ?>&&methode=<?php echo $row['methode'] ?>">Sortie</a></td>
            <tr>
            <?php } ?>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>