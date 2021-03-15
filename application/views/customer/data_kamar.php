    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Kamar</h2>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <section id="room-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- <img src="<?php echo base_url('assets/upload/'.$kmr->gambar)?>" alt="" class=""> -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                    <?php echo $this->session->flashdata('pesan') ?>
                        <div class="row">
                            <?php foreach($kamar as $kmr) : ?>
                            <div class="col-6 col-sm-3 mb-4">
                                <div class="single-car-wrap">
                                    <div class="car-list-info without-bar">
                                        <h3><?php echo $kmr->nama_kamar ?></h3>
                                        <h5>Harga : Rp. <?php echo $kmr->harga?> / Bulan </h5>
                                        <p>Fasilitas :</p>
                                        <p><?php echo $kmr->fasilitas ?></p>
                                        <?php 
                                            if ($kmr->status == "0"){
                                                echo "<span class='btn btn-sm btn-danger' disable> Tidak Tersedia</span>";
                                            }else{
                                                echo anchor('customer/sewa/tambah_sewa/'.$kmr->id_kamar,'<button class="btn btn-sm btn-success">Sewa</button>');
                                            }
                                        ?>
                                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('dashboard/detail_kamar/').$kmr->id_kamar ?>">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
