<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <form action="<?= site_url('admin/CommandeAdminController/validerlivraison')?>?idfournisseur=<?php echo $_GET['idfournisseur']; ?>" method="post">
<table border="1" class="table table-striped">
    <?php foreach($info2 as $row){ ?>
        <p>Nom du fournisseur : <?php echo $row['nomfournisseur']; ?></p>
        <p>Date RECU: <?php echo $row['datelivraison']; ?></p>
        <input type="hidden" name="datelivraison" value="<?php echo $row['datelivraison']; ?>">
    <?php } ?>       
    <table border="1" class="table table-striped">
            <tr>
                <th>Nombre</th>
                <th>Article</th>
                <th>Prix Unitaire</th>
                <th>montant HT</th>
                <th>TVA</th>
                <th>montant TVA</th>
                <th>montant TTC</th>    
            </tr>
            <tr>
            <?php

                $totalht = 0;
                $totaltva = 0;
                $totalttc = 0;    
            
            foreach($info as $row){ ?>
                    <td><input type="number" name="nombre[]" value="<?php echo $row['nombre'] ?>" readonly></td>
                    <td><input type="text" name="designation[]" value="<?php echo $row['designation'] ?>" readonly></td>
                    <td><input type="number" name="pu[]" value="<?php echo $row['montant'] ?>" readonly></td>
                    <td><input type="number" name="montant[]" value="<?php echo ($row['montant'] * $row['nombre']); ?>" readonly></td>
                    <td><input type="text" name="tva" value="20%" readonly></td>
                    <td><input type="number" name="montant[]" value="<?php echo (($row['montant'] * $row['nombre']) * .20); ?>" readonly></td>
                    <td><input type="number" name="montant[]" value="<?php echo ((($row['montant'] * $row['nombre']) * .20) + ($row['montant'] * $row['nombre'])); ?>" readonly></td>
                </tr>
            </tr>
        <?php $totalht = $totalht + ($row['montant'] * $row['nombre']);
                    $totaltva = $totaltva + (($row['montant'] * $row['nombre']) * .20);
                    $totalttc = $totalttc + ((($row['montant'] * $row['nombre']) * .20) + ($row['montant'] * $row['nombre']));
                } ?>
        <tr>
            <td colspan="5"></td>
            <td>TOTAL HT</td>
            <td><input type="number" value="<?php echo $totalht ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>TOTAL TVA</td>
            <td><input type="number" value="<?php echo $totaltva ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>TOTAL TTC</td>
            <td><input type="number" value="<?php echo $totalttc ?>" readonly></td>
        </tr>
        </table>
    <br>
    <input type="submit" value="Faire un bon de recu">
        </form>
</table>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>