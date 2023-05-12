<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h1>Fifo</h1>
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
    <table border="1" id="myTable" class="table table-striped">
            <tr>
            <th>date entree</th>
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
                $totalht = $totalht + ($row['prixe']*$row['nombre']);
                $totaltva = $totaltva + ($row['prixe']*$row['nombre'])* .20;
                $totalttc = $totalttc + ((($row['prixe']*$row['nombre']) * .20) + ($row['prixe']*$row['nombre']));    
                ?>
                    <td><?php echo $row['dateentree'] ?></td>
                    <td><?php echo $row['designation'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['prixe'] ?></td>
                    <td><?php echo $row['prixe']*$row['nombre'] ?></td>
            </tr>
            <?php } ?>
    </table>
            <h4>Total Hors Taxe : <?php echo $totalht ?></h4>
            <h4>Total TVA : <?php echo $totaltva ?></h4>
            <h4>Total TTC : <?php echo $totalttc ?></h4>
    <br>
    <button onclick="sortTable()">Voir l'arrangement du sortie en lifo</button>   
        <script>
            function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                }
            }
            }
            </script>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>