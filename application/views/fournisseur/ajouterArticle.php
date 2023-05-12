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
            <h1>Votre demande</h1>
            <form action="<?= site_url('fournisseur/StockFournisseurController/ajouterArticle')?>?idfournisseur=<?php echo $session; ?>" method="post">
                <p>Article <input type="text" name="designation"></p>
                <p><input type="submit" value="valider"></p>
            </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>