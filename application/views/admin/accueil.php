


<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
			<p><a href="<?php echo base_url('admin/DemandeAdminController/listDemande')?>">Liste des Demmandes</a></p>
			<p><a href="<?php echo base_url('admin/DepartementAdminController/listStock')?>">Entree Departement</a></p>
			<p><a href="<?php echo base_url('admin/ProformaAdminController/proforma')?>">Liste des proforma</a></p>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>


