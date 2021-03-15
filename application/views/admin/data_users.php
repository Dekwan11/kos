<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Users</h1>
          </div>
          <a href="<?php echo base_url('admin/data_users/tambah_users') ?>" class="btn btn-primary mb-2">Tambah Data Users</a>
          
          <?php echo $this->session->flashdata('pesan') ?>

<table class="table table-hover table-stripted table-responsive table-borderd">
    <thead>
      <tr>
        <th>No</th>
        <th>Id Users</th>
        <th>Role id</th>
        <th>Nama Users</th>
        <th>Username</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>No. KTP</th>
        <th>Password</th>
        <th>Aksi</th>
      </tr>
    </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($users as $usr) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $usr->id_users?></td>
                      <td><?php 
                      if($usr->role_id == "1"){
                        echo "<span class='badge badge-danger'>Admin</span>";
                      }else {
                        echo "<span class='badge badge-primary'>Penghuni</span>";
                      }
                      ?>
                      <td><?php echo $usr->nama_users ?></td>
                      <td><?php echo $usr->username ?></td>
                      <td><?php echo $usr->alamat ?></td>
                      <td><?php echo $usr->no_telepon ?></td>
                      <td><?php echo $usr->no_ktp ?></td>
                      <td><?php echo $usr->password ?></td>
                      <td>
                      <div class="row mr-3">
                      <a onclick="return confirm ('Anda Yakin ?')"  href="<?php echo base_url('admin/data_users/delete_users/').$usr->id_users ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      <a href="<?php echo base_url('admin/data_users/update_users/').$usr->id_users ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                      </div>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
    </section>
</div>
    