<?php
        $this->load->library('form_validation');
        $this->load->library('session');
        $session=$this->session->flashdata('idFournisseur');      
?>
<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h1>Methode de stock</h1>
        <?php foreach($info2 as $row){ ?>
            <h2>Somme total du valeurs de stock : <?php echo $row['prix']; ?></h2>
            <h2>Nombre total de stock : <?php echo $row['nombre']; ?></h2>
        <?php } ?>
        <p> Methode:
            <select name="article" onclick="checkAndAddOption(this)">
                <option value="">Valeurs de stock</option>
                <option value="valeur">CMUP</a></option>
                <option value="fifo">FIFO</a></option>
                <option value="lifo">LIFO</a></option>
            </select>
            <script>
                function checkAndAddOption(selectElement) {
                    if (selectElement.value === "valeur") {
                        window.location.href = 'valeur?idfournisseur=<?php echo $_GET['idfournisseur']; ?>';
                    }
                    if (selectElement.value === "fifo") {
                        window.location.href = 'fifo?idfournisseur=<?php echo $_GET['idfournisseur']; ?>';
                    }
                    if (selectElement.value === "lifo") {
                        window.location.href = 'lifo?idfournisseur=<?php echo $_GET['idfournisseur']; ?>';
                    }
                }
            </script>
        </p>
               <table border="1" class="table table-striped">
            <tr>
                <th>Article</th>
                <th>Nombre</th>
                <th>Prix</th>
                <th>montant</th>
            </tr>
            <tr>
                <?php 
                $totalht = 0;
                $totaltva = 0;
                $totalttc=0;
                ?>
               <?php foreach($info as $row){  
                $totalht = $totalht + ($row['moyenne']*$row['nombre']);
                $totaltva = $totaltva + ($row['moyenne']*$row['nombre'])* .20;
                $totalttc = $totalttc + ((($row['moyenne']*$row['nombre']) * .20) + ($row['moyenne']*$row['nombre']));
                ?>                
                    <td><?php echo $row['designation'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['moyenne']*1 ?></td>
                    <td><?php echo $row['moyenne']*$row['nombre'] ?></td>
                    </tr>
                <?php } ?>
        </table>
        <h4>Total Hors Taxe : <?php echo $totalht ?></h4>
            <h4>Total TVA : <?php echo $totaltva ?></h4>
            <h4>Total TTC : <?php echo $totalttc ?></h4>
    <br>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>