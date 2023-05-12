<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>ENTREE DEPARTEMENT</h3>
        <table border="1" class="table table-striped">
            <tr>
                <th>Designation</th>
                <th>Nombre demandée</th>
                <th>Nombre Zaraina Departement</th>
                <th>Departement</th>
            </tr>
            
            <?php foreach($info as $row){ ?>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <form action="<?php echo site_url('admin/DepartementAdminController/zarainaStock') ?>" method="post">
                <td><input name="nombre" value="<?php echo $row['nombre'] ?>" type="text" readonly></td>
                <td><?php 

                    $designation = $string = str_replace(' ', '', $row['designation']);
                    echo "<select name='".$designation."'>";

                    $host = "localhost"; 
                    $user = "postgres"; 
                    $pass = "071204"; 
                    $db = "achat_vente"; 

                    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                        or die ("Could not connect to server\n"); 

                    $query = "SELECT DemandeDept.iddept, Departement.nomDept 
                                FROM DemandeDept
                                INNER JOIN Departement ON DemandeDept.iddept=Departement.iddept
                                WHERE designation = '" . $row['designation'] ."'"; 

                    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

                    while ($rows = pg_fetch_assoc($rs)) {
                        echo "<option value='".$rows['iddept']."' label='".$rows['nomdept']."'></option>";
                    }

                    pg_close($con);


                    echo "</select>";
                    ?>          
                </td>
                <td><input name="designation" type="text" value="<?php echo $row['designation'] ?>" hidden></td>
                <td><input name="idStock" type="text" value="<?php echo $row['idstock'] ?>" hidden></td>
                <td><input name="nombreReste" type="text" value="<?php echo $row['nombre'] ?>" hidden></td>
                <td><input type="submit" value="Zaraina" class="btn btn-outline-success"></td>
                </form>
            <tr>
            <?php } ?>
        </table>

		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>


