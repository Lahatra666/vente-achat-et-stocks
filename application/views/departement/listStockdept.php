<?php include(FCPATH.'application\views\header.php') ?>	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <h3>LIST articles reçu</h3>
        <table border="1" class="table table-striped">
                <tr>
                    <th scope="col">date reçu</th>
                    <th scope="col">designation</th>
                    <th scope="col">nombre</th>
                </tr>
                <?php foreach($info as $row){ ?>
                <tbody id="myTable">
                <tr>
                    <td class="cell"><?php echo $row['daterecu']?></td>
                    <td class="cell"><?php echo $row['designation']?></td>
                    <td class="cell"><?php echo $row['nombre'] ?></td>
                </td>
            <tr>
            <?php } ?>
        </table>


		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>