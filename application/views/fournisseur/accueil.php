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
        $session=$this->session->flashdata('idFournisseur');     
        ?>
        <p><a href="<?php echo base_url('fournisseur/ListeDemandeFournisseurController/ListeDemande')?>?idfournisseur=<?php echo $session; ?>">Liste des Demandes</a></p>
        <p><a href="<?php echo base_url('fournisseur/StockFournisseurController/listStock')?>?idfournisseur=<?php echo $session; ?>">Liste Stocks</a></p>
        <p><a href="<?php echo base_url('fournisseur/StockFournisseurController/formAjouterStock')?>?idfournisseur=<?php echo $session; ?>">Ajouter Stock</a></p>
        <p><a href="<?php echo base_url('fournisseur/StockFournisseurController/listentree')?>?idfournisseur=<?php echo $session; ?>">Historique des entrees</a></p>
        <p><a href="<?php echo base_url('fournisseur/StockFournisseurController/listesortie')?>?idfournisseur=<?php echo $session; ?>">Historique des sortie</a></p>
        <p><a href="<?php echo base_url('fournisseur/StockFournisseurController/valeur')?>?idfournisseur=<?php echo $session; ?>">valeurs de stock</a></p>
        <p><a href="<?php echo base_url('fournisseur/CommandeFournisseurController/voircommande')?>?idfournisseur=<?php echo $session; ?>">Liste des Commandes non livre</a></p>
        <p><a href="<?php echo base_url('fournisseur/CommandeFournisseurController/voircommandelivrer')?>?idfournisseur=<?php echo $session; ?>">Liste des Commandes Livre</a></p>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>