<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Update Data Kamar</h1>
            </div>

            <div class="card">
                <div class="card-body">

                <?php foreach($kamar as $kmr) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_kamar/update_kamar_aksi') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Id Kamar <small class="form-text text-muted">*id kamar tidak dapat diubah.</small></label>
                            </div>

                            <div class="form-group">
                                <label>Type Kamar</label>
                                <input type="hidden" name="id_kamar" value="<?php echo $kmr->id_kamar ?>">
                                <select name="id_type" class="form-control">
                                    <option value="<?php echo $kmr->id_type ?>"><?php echo $kmr->id_type ?></option>
                                    <?php foreach($type_kamar as $tk) : ?>
                                        <option value="<?php echo $tk->id_type ?>"><?php echo $tk->nama_type ?></option> 
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_type','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control" value="<?php echo $kmr->nama_kamar?>">
                                <?php echo form_error('nama_kamar','<div class="text-small text-danger">','</div>') ?>                
                            </div>

                            <div class="form-group">
                                <label>Status</label>   
                                <select name="status" class="form-control">
                                    <option <?php if($kmr->status=="1") {echo "selected='selected'";}
                                    echo $kmr ->status;?> value="1">Tersedia</option>
                                    <option <?php if($kmr->status=="0") {echo "selected='selected'";}
                                    echo $kmr ->status;?> value="0">Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>            
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">

                            </div>
                            
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-light" href="<?php echo base_url('admin/data_kamar') ?>">Kembali</a>
                        </div>
                    </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>