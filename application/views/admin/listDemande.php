



        <?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>LIST DEMANDES</h3>
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Designation</th>
                <th>Nombre</th>
                <th>Departement</th>
            </tr>
            
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['datededemande'] ?></td>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['nomdept'] ?></td>
            <tr>
            <?php } ?>
        </table>
        <form action="<?php echo site_url('admin/DemandeAdminController/ListDemandeMitambatra') ?>" method="post">
        <input type="submit" value="Faire un commande" class="btn btn-outline-success">
    </form>
        <h3>LIST DEMANDES PUBLIE</h3>
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Designation</th>
                <th>Nombre</th>
            </tr>
            
            <?php foreach($info2 as $row2){ ?>
                <td><?php echo $row2['dates'] ?></td>
                <td><?php echo $row2['designation'] ?></td>
                <td><?php echo $row2['nombre'] ?></td>
            <tr>
            <?php } ?>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>


