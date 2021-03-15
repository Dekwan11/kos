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
    <!--== Page Title Area End ==-->
<section id="room-list-area" class="section-padding">
    <div class="container">
    <div class="card mx-auto" style="margin-top: 50px; margin-bottom:50px">
        <div class="card-header">
            Data Transaksi Anda
        </div>
        <span class="mt-3"><?php echo $this->session->flashdata('pesan') ?></span>
        <div class="card-body">
            <table class="table table-bordered table-responsive table-stripted">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Nama Kamar</th>
                    <th>Tgl. Mulai Sewa</th>
                    <th>Harga</th>
                    <th>Tgl. Konfirmasi Pembayaran</th>
                    <th>Status Sewa</th>
                    <th>Status Pembayaran Bulan Ini</th>
                    <th>Aksi</th>
                    <th>Tambah Sewa Bulan Berikutnya</th>
                    <th>Batal Sewa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1; 
                    foreach($transaksi as $tr): ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tr->nama_users ?></td>
                    <td><?php echo $tr->nama_kamar ?></td>
                    <td><?php echo date('d/m/Y',strtotime($tr->tanggal_sewa)); ?></td>
                    <td>Rp. <?php echo number_format($tr->harga,0,',','.')?></td>
                    <td>
                        <?php 
                            if($tr->tanggal_pembayaran=="0000-00-00"){
                                echo "-";
                            }else{ 
                                echo date('d/m/Y',strtotime($tr->tanggal_pembayaran));}
                        ?>
                    </td>

                    <td>
                        <?php 
                            if($tr->status=="0"){
                                echo "Belum Selesai";
                            }else{ 
                                echo "Sudah Selesai";}
                        ?>
                    
                    </td>
                    <td class="">
                    <?php 
                            if($tr->status_pembayaran=="0"){
                                echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                            }else{ 
                                echo "<span class='badge badge-success'>Sudah Dibayar</span>";}
                        ?>
                        </td>
                    <td>
                        <?php 
                            if($tr->status=="1"){ ?>
                            <button class="btn btn-sm btn-danger">Sewa Selesai</button>
                        <?php }else{ ?>
                            <a href="<?php echo base_url('customer/transaksi/pembayaran/'.$tr->id_transaksi) ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
                            
                        <?php } ?>
                    </td>
                    <td class=""><a class="btn btn-sm btn-success" href="<?php echo base_url('customer/sewa/tambah_sewa2/').$tr->id_kamar ?>">Tambah</a>
                    </td>
                    <td class=""><a onclick="return confirm ('Anda Yakin ?')" href="<?php echo base_url('customer/transaksi/batal_transaksi/').$tr->id_transaksi ?>" 
                            class="btn btn-sm btn-danger">Batal</a></td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</section>