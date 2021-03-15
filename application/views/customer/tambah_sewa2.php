<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Sewa Kamar</h2>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
    
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
<div class="container">

    <div class="card" style="margin-top: 100px; margin-bottom:200px">
    <div class="card-header">
        Form Sewa Kamar

    </div>

    <div class="card-body">
        <?php foreach($detail as $dt) : ?>
            <form method="POST" action="<?php echo base_url('customer/sewa/tambah_sewa_aksi')?>" class="">

            <div class="form-group">
                <label>Harga Sewa/Bulan</label>
                <input type="hidden" name="id_kamar" value="<?php echo $dt->id_kamar?>">
                <input type="text" name="harga" class="form-control" value="<?php echo $dt->harga?>" readonly>
            </div>

            <div class="form-group">
                <label>Tanggal Pembayaran</label>
                <input type="date" name="tanggal_sewa" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">Sewa </button>
            <a class="btn btn-primary" href="<?php echo base_url('customer/transaksi') ?>">Kembali</a>

        </form>
        <?php endforeach;?>
    </div>
        
    </div>
</div>