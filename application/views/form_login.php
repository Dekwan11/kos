 <!--== Login Page Content Start ==-->
 <br><br><br>
 <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
							
							<h3>Login</h3>
							<span class=""><?php echo $this->session->flashdata('pesan') ?></span>
							<form method="POST" action="<?php echo base_url('auth/login')?>" >
								<div class="form-group">
									<input id="username" type="text" name="username" tabindex="1" autofocus placeholder="Username">
									<?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
								</div>
								<div class="form-group">
									<input id="password" type="password" name="password" tabindex="2" placeholder="Password">
									<?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
								</div>
								<div class="log-btn">
									<button type="submit"><i class="fa fa-sign-in"></i> Login</button>
								</div>
							</form>
                		</div>
                		

                		<div class="create-ac">
                			<p>Belum Punya Akun? <a href="<?php echo base_url('register')?>">Buat Sekarang</a></p>
                		</div>

                	</div>
                </div>
        	</div>
        </div>
</section>
<br><br>
    <!--== Login Page Content End ==-->