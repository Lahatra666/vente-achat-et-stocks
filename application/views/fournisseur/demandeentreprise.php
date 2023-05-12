
<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <style>
#entete{
    float:left;
}
#vatany{
    float : center;
}
</style>
<p>Email</p>
    <div id="vatany">
        <div >
            <h4>Rabe Koto</h4>
            <h4>102, Andoharanofotsy</h4>
            <h4>Tel : +261 34 00 000 00</h4>
            <h4> E-mail: it@company.com</h4>
        </div>
            <br>
        <div>
        <?php foreach($info2 as $row){ ?>
            <h4><?php echo $row['nomfournisseur']; ?></h4>
            <h4>101, Antananarivo</h4>
            <h4>Adresse : Andraharo</h4>
            <h4> E-mail: <?php echo $row['nomfournisseur']; ?>@fournisseur.com</h4>
            <?php } ?>
            <br>
            <p><strong>Objet</strong> : Demande de proforma en ligne</p>
        </div>
        <div>
        <p>Par présente, je souhaite de demander un proforma auprès de votre entreprise</p>
        <p>En effet, je voudrais recevoir :</p>
            <ul>
            <?php foreach($info as $row){ ?>
                <li><?php echo $row['nombre'] ?> piece(s) de <?php echo $row['designation'] ?></li>
            <?php } ?>
            </ul>
        <p>Je vous serai reconnaissant de bien vouloir confirmer ma commande , et je vous prie d'accepeter,Monsieur</p>
        <p>Mes respectueuse salutation</p>
        </div>
    </div>
    <?php foreach($info2 as $row){ ?>
    <a href="<?php echo base_url('Fournisseur/FicheFournisseurController/fiche')?>?idEntreprise=1&idfournisseur=<?php echo $row['idfournisseur']; ?> "><button style="color:blue">Faire un proforma</button></a>
    <?php } ?>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>