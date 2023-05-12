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
        <h1>Ajouter un stock</h1>
            <form action="<?= site_url('fournisseur/StockFournisseurController/ajouterStock')?>?idfournisseur=<?php echo $session; ?>" method="post">
                <p>Nombre <input type="number" name="nombre"></p>
                <p>Prix <input type="text" min="0" name="prix"></p>
                <p>Date <input type="datetime-local" name="date"></p>
                <p> article:
                    <select name="article" onclick="checkAndAddOption(this)">
                        <?php foreach ($info as $row) { ?>
                            <option value="<?php echo $row['identana'] ?>"><?php echo $row['designation'] ?></option>
                        <?php } ?>
                        <option value="">***Nouveau Article***</a></option>
                    </select>
                    <script>
                        function checkAndAddOption(selectElement) {
                            if (selectElement.value === "") {
                                window.location.href = 'formAjouterArticle?idfournisseur=<?php echo $session; ?>';
                            }
                        }
                    </script>
                </p>
                <p> Methode :
                    <select name="methode">
                        <option value="CMUP">CMUP</option>
                        <option value="LIFO">LIFO</option>
                        <option value="FIFO">FIFO</option>
                    </select>
                <p><input type="submit" value="valider"></p>
            </form>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>