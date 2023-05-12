<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>Liste Demande</h3>
        <table class="table table-striped">
            <tr>
                <th>Nom idEntreprise</th>
                <th>Lieux</th>
          
            </tr>
            <tr>
            <?php foreach($info as $row){ ?>
                <td><a href="<?php echo base_url('Fournisseur/ProformaFournisseurController/ouvrir_proforma')?>?idEntreprise=<?php echo $row['idadmin']; ?>&idfournisseur=<?php echo $id; ?> "><?php echo $row['idadmin'] ?></a></td>
        <?php } ?>
        </tr>
        </table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>