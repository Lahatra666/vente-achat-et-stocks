<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>LIST demande</h3>
        <table border="1" class="table table-striped">
                <tr>
                    <th scope="col">date</th>
                    <th scope="col">nombre</th>
                    <th scope="col">designation</th>
                    <th scope="col">Action</th>
                </tr>
                <?php foreach($info as $row){ ?>
                <tbody id="myTable">
                <tr>
                    <td class="cell"><?php echo $row['datededemande']?></td>
                    <td class="cell"><?php echo $row['designation']?></td>
                    <td class="cell"><?php echo $row['nombre'] ?></td>
                    <td class="cell"><a href="<?php echo base_url('departement/DemandedepartementController/form_modifDemande')?>?iddemandedept=<?php echo $row['iddemandedept'] ?>">modifier le demande</a></td>
                </td>
            <tr>
            <?php } ?>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>

