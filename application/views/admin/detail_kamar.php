<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Kamar</h1>
          </div>
          
    </section>

    <?php foreach($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <img width="80%" src="<?php echo base_url().'assets/upload/'.$dt->gambar ?>">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Id Kamar</td>
                                <td class=""><?php echo $dt->id_kamar ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kamar</td>
                                <td class=""><?php echo $dt->nama_kamar ?></td>
                            </tr>
                            <tr>
                            <td>Id Type</td>
                                <td class=""><?php echo $dt->id_type?></td>
                            </tr>
                            <tr>
                                <td>Type Kamar</td>
                                <td class=""><?php echo $dt->kode_type ?></td>
                            </tr>
                            <tr>
                                <td>Nama Type</td>
                                <td class=""><?php echo $dt->nama_type ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td class=""><?php echo $dt->harga ?></td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td class=""><?php echo $dt->fasilitas ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php 
                                if($dt->status=="0"){
                                    echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                } else{
                                    echo "<span class='badge badge-primary'>Tersedia</span>";

                                }
                                ?>
                            </tr>
                        </table>
                        
                        <a class="btn btn-sm btn-primary ml-4" href="<?php echo base_url('admin/data_kamar/update_kamar/'.$dt->id_kamar) ?>">Update</a>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_kamar') ?>">Kembali</a>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    