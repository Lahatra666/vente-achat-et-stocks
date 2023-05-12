<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <table border="1" class="table table-striped">
            <tr>
                <th>designation</th>
                <th>nombre</th>
                <th>montant</th>
            </tr>
            <?php foreach($info as $row){ ?>
            <tr>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['montant'] ?></td>
            </tr>
            <?php } ?>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>