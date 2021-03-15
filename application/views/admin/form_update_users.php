<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Penghuni</h1>
        </div>
    </div>

    <?php foreach($users as $usr) : ?>

    <form method="POST" action="<?php echo base_url('admin/data_users/update_users_aksi') ?>">
        
        <div class="form-group">
            <label>Id Penghuni <small class="form-text text-muted">*id users akan otomatis terisi.</small></label>
            <input class="form-control" type="text" placeholder="<?php echo $usr->id_users ?>" readonly>
        </div>

        <div class="form-group">
            <label>Nama Penghuni</label>
            <input type="hidden" name="id_users" value="<?php echo $usr->id_users?>">
            <input type="text" name="nama_users" class="form-control" value="<?php echo $usr->nama_users ?>">
            <?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $usr->username?>">
            <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $usr->alamat ?>">
            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="<?php echo $usr->no_telepon ?>">
            <?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <div class="form-group">
            <label>No. KTP</label>
            <input type="text" name="no_ktp" class="form-control" value="<?php echo $usr->no_ktp ?>">
            <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $usr->password?>">
            <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>                
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-light" href="<?php echo base_url('admin/data_users') ?>">Kembali</a>
    
    </form>
    <?php endforeach; ?>
</div>
</div>