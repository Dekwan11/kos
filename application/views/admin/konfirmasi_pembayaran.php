<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1 class="">Konfirmasi Pembayaran</h1>
        </div>

        <div class="card" style="width:55%">
            <div class="card-header">
                Konfirmasi Pembayaran
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/transaksi/cek_pembayaran')?>">

                    <?php foreach ($pembayaran as $pmb) : ?>
                        <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/transaksi/download_pembayaran/'.$pmb->id_transaksi) ?>">
                            <i class="fas fa-download"></i> Download Bukti Pembayaran </a>

                            <div class="custom-control custom-switch ml-3">
                                <input type="hidden" class="custom-control-input"value="<?php echo $pmb->id_transaksi?>" name="id_transaksi">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
                                <label for="customSwitch1" class="custom-control-label">Konfirmasi Pembayaran</label>
                            </div>
                            
            
                            <hr>
                            <div class="form-group">
                                <label >Tanggal Pembayaran Bulan Ini</label>
                                <input type="date" name="tanggal_pembayaran" class="form-control" value="<?php echo $pmb->tanggal_pembayaran?>">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary"> Simpan</button>
                    <?php endforeach;?>
                </form>
            </div>
        </div>
    </div>
</div>