 <!--== Login Page Content Start ==-->
 <br><br><br>
 <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">	
							<h3>Ganti Password</h3>
                            <span class="m-2"><?php echo $this->session->flashdata('pesan') ?></span>
                            <form method="POST" action="<?php echo base_url('auth/ganti_password_aksi')?>" >
                                <div class="form-group">
                                    <input id="pass_baru" type="password" placeholder="Password Baru" name="pass_baru" tabindex="1" autofocus>
                                    <?php echo form_error('pass_baru','<div class="text-small text-danger">','</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input id="ulang_pass" type="password" placeholder="Ulangi Password Baru" name="ulang_pass" tabindex="2">
                                    <?php echo form_error('ulang_pass','<div class="text-small text-danger">','</div>') ?>
                                </div>
								<div class="log-btn">
									<button type="submit"><i class="fa fa-sign-in"></i> Ganti Password</button>
								</div>
							</form>
                        </div>
                        <a class="btn btn-sm btn-light my-3" href="<?php echo base_url('dashboard')?>">Kembali</a>
                	</div>
                </div>
        	</div>
        </div>
</section>
<br><br><br>
    <!--== Login Page Content End ==-->