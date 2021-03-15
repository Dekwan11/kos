<body>
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2> Detail Kamar</h2>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
    
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
<div class="container mt-5 mb-5">
    <div class="card" style="margin-top: 100px;margin-bottom:200px">
        <div class="card-body">
            <?php foreach($detail as $dt) : ?>
                <div class="row">
                    <div class="col-md-6">
                        <img width="" src="<?php echo base_url('assets/upload/'.$dt->gambar)?>">
                        
                    </div>                   
                    <div class="col-md-6">
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
                                <td>Nama Type Kamar</td>
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
                                        echo "Tidak Tersedia";
                                    } else{
                                        echo "Tersedia"; 
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php 
                                if($dt->status=="0"){
                                    echo "<span class='btn btn-danger' disable> Tidak Tersedia</span>";
                                } else{
                                    echo anchor('customer/sewa/tambah_sewa/'.$dt->id_kamar,'<button class="btn btn-success">Sewa</button>');
                                }
                                ?>
                                <a class="btn btn-primary" href="<?php echo base_url('customer/data_kamar') ?>">Kembali</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>