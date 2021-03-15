<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Transaksi</h2>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
    
            </div>
        </div>
    </section>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card"></div>
                <div class="card-header alert alert-success">
                    Invoice Pembayaran Anda
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <?php foreach($transaksi as $tr) : ?>
                            <tr>
                                <th>Nama </th>
                                <td>:</td>
                                <td><?php echo $tr->nama_users?></td>
                            </tr>
                            <tr>
                                <th>Nama Kamar</th>
                                <td>:</td>
                                <td><?php echo $tr->nama_kamar?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai Sewa</th>
                                <td>:</td>
                                <td><?php echo date('d/m/Y',strtotime($tr->tanggal_sewa)); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Tagihan Anda Bulan Ini</th>
                                <td>:</td>
                                <td>Rp. <?php echo number_format($tr->harga,0,',','.')?></td>
                            </tr>
                            <tr class="">
                            <p class="mb-3">Silakan Selesaikan Pembayaran Anda dalam waktu 7 Hari</p>
                        <?php endforeach;?>
                    </table>
                    <?php 
                                if(empty($tr->bukti_pembayaran)) { ?>
                                <button style="width: 100%" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
                                    Upload Bukti Pembayaran
                                </button>
                                <?php } elseif($tr->status_pembayaran == "0"){ ?>
                                <button style="width: 100%" class="btn btn-sm btn-warning mt-3"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
                                <?php } elseif($tr->status_pembayaran == "1"){ ?>
                                <button style="width: 100%" class="btn btn-sm btn-success mt-3"><i class="fa fa-check"></i> Pembayaran Selesai</button>
                                <?php } ?>
                            </tr>
                </div>
            </div>
        <div class="col-md-4">
            <div class="card" style="margin-bottom:300px">
            <div class="card-header alert alert-primary" >Informasi Pembayaran</div>


            <div class="card-body">
                <p class="mb-3">Silakan Melakukan Pembayaran Melalui Nomor Rekening di Bawah Ini:</p>
                <ul class="list-group">
                    <li class="list-group-item">Bank BCA 1660365181 a/n I Gde Ekadharma SW</li>
                    <li class="list-group-item">Bank BRI 081601000006532 a/n I Wayan Suanda</li>
                    <li class="list-group-item">Bank DKI 50223180526 a/n I Made Dharmawan</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal untuk upload pembayaran-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url('customer/transaksi/pembayaran_aksi')?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            <label for="" class="">Upload Bukti Pembayaran dengan format jpg,png,jpeg,pdf,doc, atau docx</label>
            <input type="hidden" name="id_transaksi" class="form-control" value="<?php echo $tr->id_transaksi?>">
            <input type="file" name="bukti_pembayaran" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-success">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>