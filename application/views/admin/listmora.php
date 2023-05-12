<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <form action="<?= site_url('admin/ProformaAdminController/commander')?>" method="post">
            <table border="1">
                <tr>
                    <th>designation</th>
                    <th>nombre</th>
                    <th>montant</th>
                    <th>nom du fournisseur</th>
                </tr>
                <?php for($i=0;$i<count($a);$i++){ ?>
                <tr>
                    <td><input name="designation[]" value="<?php echo $a[$i][0]; ?>" type="text" readonly></td>   
                    <td><input name="nombre[]" value="<?php echo $a[$i][1]; ?>" type="text" readonly></td>
                    <td><input name="montant[]" value="<?php echo $a[$i][2]; ?>" type="text" readonly></td>
                    <td><input name="nomfournisseur[]" value="<?php echo $a[$i][4]; ?>" type="text" readonly></td> 
                    <input type="hidden" name="idfournisseur[]" value="<?php echo $a[$i][3]; ?>">
                </tr>
                <?php } ?>
            </table>
            <br>
            <input type="submit" value="Commander">
            </form>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>