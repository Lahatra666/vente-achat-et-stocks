<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <?php
            $this->load->library('form_validation');
            $this->load->library('session');
            $refa_ampesaina_le_session=$this->session->flashdata('idDepartement');
        ?>

    <p><a href="<?php echo base_url('departement/DemandedepartementController/listStockdept')?>?iddept=<?php echo $refa_ampesaina_le_session; ?>">Stock Departement</a></p>
    <p><a href="<?php echo base_url('departement/DemandedepartementController/listDemande')?>?iddept=<?php echo $refa_ampesaina_le_session; ?>">Liste de demande</a></p>
    <p><a href="<?php echo base_url('departement/DemandedepartementController/formDemande')?>?iddept=<?php echo $refa_ampesaina_le_session; ?>">Faire un demande</a></p>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>