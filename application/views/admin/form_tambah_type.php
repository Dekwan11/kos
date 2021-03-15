<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Type Kamar</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('admin/data_type/tambah_type_aksi') ?>">
        
        <div class="form-group">
            <label>Id Type <small class="form-text text-muted">*id tipe akan otomatis terisi.</small></label>
        </div>

        <div class="form-group">
            <label>Kode Type</label>
            <input type="text" name="kode_type" class="form-control">
            <?php echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Nama Type</label>
            <input type="text" name="nama_type" class="form-control">
            <?php echo form_error('nama_type','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control">
            <?php echo form_error('fasilitas','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
            <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <a class="btn btn-light" href="<?php echo base_url('admin/data_type') ?>">Kembali</a>


    
    </form>
</div>