

<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
            <h3>LIST Commande</h3>
            <table class="table table-striped">
                <tr>
                    <th>Designation</th>
                    <th>Nombre</th>
                </tr>
                
                <?php foreach($info as $row){ ?>
                    <td><?php echo $row['designation'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                <tr>
                <?php } ?>
            </table>
            <form action="<?php echo site_url('admin/CommandeAdminController/commande') ?>" method="post">
            <input type="submit" value="VALIDER" class="btn btn-outline-success">
        </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>

