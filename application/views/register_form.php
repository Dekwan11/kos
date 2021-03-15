 <!--== Login Page Content Start ==-->
 <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Register</h3>
                            <span class=""><?php echo $this->session->flashdata('pesan') ?></span>
							<form method="POST" action="<?php echo base_url('register')?>">
								<div class="name">
									<div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input id="nama_users" type="text" placeholder="Nama" name="nama_users" autofocus>
                                            <?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input id="username" type="text" placeholder="Username" name="username">
                                            <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input id="no_ktp" type="text" placeholder="No. KTP" name="no_ktp">
                                            <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input id="no_telepon" type="text"  placeholder="No. Telepon" name="no_telepon">
                                            <?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="alamat" type="text" placeholder="Alamat" name="alamat">
                                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input id="password" type="password" placeholder="Password" name="password">
                                                <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                                            </div>
                                            <div class="col-md-6 mb-3 mb-3">
                                                <input id="password2" type="password" placeholder="Ulangi Password" name="password2">
                                                <?php echo form_error('password2','<div class="text-small text-danger">','</div>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="log-btn">
                                        <button type="submit"><i class="fa fa-check-square"></i> Register</button>
                                    </div>
                                    

							</form>
                        </div>
                                    <a class="btn btn-sm btn-light my-3" href="<?php echo base_url('dashboard')?>">Kembali</a>
						
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->