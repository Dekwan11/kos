<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Users</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('admin/data_users/tambah_users_aksi') ?>">
        
        <div class="form-group">
            <label>Id Users <small class="form-text text-muted">*id users akan otomatis terisi.</small></label>
        </div>

        <div class="form-group">
            <label>Nama Users</label>
            <input type="text" name="nama_users" class="form-control">
            <?php echo form_error('nama_users','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon" class="form-control">
            <?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <div class="form-group">
            <label>No. KTP</label>
            <input type="text" name="no_ktp" class="form-control">
            <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <div class="form-group">
            <label>Role id</label><small class="form-text text-muted">*1 = admin, 2 = user</small>
            <input type="text" name="role_id" class="form-control">
            <?php echo form_error('role_id','<div class="text-small text-danger">','</div>') ?>                
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>                
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <a class="btn btn-light" href="<?php echo base_url('admin/data_users') ?>">Kembali</a>


    
    </form>
</div>