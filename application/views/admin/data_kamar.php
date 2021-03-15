<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kamar</h1>
          </div>
          <a href="<?php echo base_url('admin/data_kamar/tambah_kamar') ?>" class="btn btn-primary mb-2">Tambah Data Kamar</a>
          
          <?php echo $this->session->flashdata('pesan') ?>

<table class="table table-hover table-responsive table-stripted table-borderd">
    <thead>
      <tr>
        <th>No</th>
        <th>Id Kamar</th>
        <th>Nama Kamar</th>
        <th>Type Kamar</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($kamar as $kmr) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $kmr->id_kamar ?></td>
                      <td><?php echo $kmr->nama_kamar ?></td>
                      <td><?php echo $kmr->kode_type ?></td>
                      <td><?php 
                      if($kmr->status == "0"){
                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                      }else {
                        echo "<span class='badge badge-primary'>Tersedia</span>";
                      }
                      ?></td>
                      <td>
                      <a href="<?php echo base_url('admin/data_kamar/detail_kamar/').$kmr->id_kamar ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                      <a onclick="return confirm ('Anda Yakin ?')" href="<?php echo base_url('admin/data_kamar/delete_kamar/').$kmr->id_kamar ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      <a href="<?php echo base_url('admin/data_kamar/update_kamar/').$kmr->id_kamar ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
    </section>
</div>
    