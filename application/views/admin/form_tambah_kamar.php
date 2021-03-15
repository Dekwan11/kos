    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Input Data Kamar</h1>
            </div>

            <div class="card">
                <div class="card-body">

                    <form method="POST" action="<?php echo base_url('admin/data_kamar/tambah_kamar_aksi') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Id Kamar <small class="form-text text-muted">*id kamar akan otomatis terisi.</small></label>
                            </div>
                            <div class="form-group">
                                <label>Type Kamar</label>
                                <select name="id_type" class="form-control">
                                    <option value="">--Pilih Type Kamar--</option>
                                    <?php foreach($type_kamar as $tk) : ?>
                                        <option value="<?php echo $tk->id_type ?>"><?php echo $tk->nama_type?></option> 
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_type','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control">
                                <?php echo form_error('nama_kamar','<div class="text-small text-danger">','</div>') ?>                
                            </div>


                            <div class="form-group">
                                <label>Status</label>   
                                <select name="status" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>            
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">

                            </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a class="btn btn-light" href="<?php echo base_url('admin/data_kamar') ?>">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>