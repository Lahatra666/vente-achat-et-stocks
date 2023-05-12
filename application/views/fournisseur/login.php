<?php include(FCPATH.'application\views\header.php') ?>
	
	<div class="row">
		<div class="col col-md-4">
			<center>
				<p>Achat Vente Stock</p>
			</center>
		</div>

		<div class="col col-md-8">
        <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <section class="login-clean">
            <form method="post" action="<?= site_url('fournisseur/LoginFournisseurController/login')?>">
                <div class="illustration">
                    <h1 style="color: var(--dark);font-size: 35px;">Login Fournisseur</h1>
                </div>
                <div class="form-group">
                    <p>Email</p><input name="contact" type="email" value="fournisseur1@gmail.com">
                </div>
                <div class="form-group">
                    <p>Mot de passe</p><input type="password" name="mdp" value="fournisseur1">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" style="background: rgb(158,244,71);">Se connecter</button>
                </div
                <?php if (isset($error)){  ?>
                    <center><a class="alert-danger" href="#"><?= $error ?></a></center>
                    
                <?php }   ?>
            </form>
        </section>
		</div>
	</div>

<?php include(FCPATH.'application\views\footer.php') ?>