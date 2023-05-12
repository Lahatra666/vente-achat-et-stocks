<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>Historique entree</h3>
        <table border="1" class="table table-striped">
            <tr>
                <th>Article</th>
                <th>Nombre</th>
                <th>Prix</th>
                <th>Date</th>
            </tr>
            
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['prixe'] ?></td>
                <td><?php echo $row['dateentree'] ?></td>
            <tr>
            <?php } ?>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>