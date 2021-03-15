<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Type Kamar</h1>
        </div>

        <a href="<?php echo base_url('admin/data_type/tambah_type') ?>" class="btn btn-primary mb-2">Tambah Data Type</a>

        <?php echo $this->session->flashdata('pesan') ?>
<table class="table table-bordered table-stripted table-hover table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Type</th>
            <th>Kode Type</th>
            <th>Nama Type</th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
            <tbody>
                <?php
                $no=1; 
                    foreach($type_kamar as $tk): ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tk->id_type ?></td>
                    <td><?php echo $tk->kode_type ?></td>
                    <td><?php echo $tk->nama_type ?></td>
                    <td><?php echo $tk->fasilitas ?></td>
                    <td><?php echo $tk->harga ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/data_type/update_type/').$tk->id_type ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm ('Anda Yakin ?')" href="<?php echo base_url('admin/data_type/delete_type/').$tk->id_type ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      
                      </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>