<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>LIST DES Proforma</h3>
    <?php foreach($info as $row){ ?>
        <form action="#" method="post">
        <table border="1" class="table table-striped">
            <tr>
                <th>Email</th>
                <th>nom du fournisseur</th>
                <th>Action</th>
            </tr>
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['nomfournisseur'] ?></td>
                <td><a href="<?php echo base_url('admin/ProformaAdminController/proposition')?>?idfournisseur=<?php echo $row['idfournisseur']; ?>">voir</a></td>
            <tr>
            <?php } ?>
        </table>
        <hr>
        <button><a href="<?php echo base_url('admin/ProformaAdminController/mora')?>">Generer</a></button>
    </form>
    <br>
    <?php } ?>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>

