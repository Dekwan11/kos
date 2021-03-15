<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Type</h1>
        </div>

        <?php foreach($type_kamar as $tk) : ?>
        <form method="POST" action="<?php echo base_url('admin/data_type/update_type_aksi') ?>">

            <div class="form-group">
                <label>Id Type <small class="form-text text-muted">*id type tidak dapat diubah.</small></label>
                <input class="form-control" type="text" placeholder="<?php echo $tk->id_type ?>" readonly>
            </div>

            <div class="form-group">
                <label>Kode Type</label>
                <input type="hidden" name="id_type" value="<?php echo $tk->id_type?>">
                <input type="text" name="kode_type" class="form-control" value="<?php echo $tk->kode_type ?>">
                <?php echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>                
            </div>

            <div class="form-group">
                <label>Nama Type</label>
                <input type="text" name="nama_type" class="form-control" value="<?php echo $tk->nama_type ?>">
                <?php echo form_error('nama_type','<div class="text-small text-danger">','</div>') ?>                
            </div>

            <div class="form-group">
                <label>Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control" value="<?php echo $tk->fasilitas ?>">
                <?php echo form_error('fasilitas','<div class="text-small text-danger">','</div>') ?>                
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $tk->harga ?>">
                <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>                
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-light" href="<?php echo base_url('admin/data_type') ?>">Kembali</a>

        </form>

        <?php endforeach; ?>
    </div>
</div>