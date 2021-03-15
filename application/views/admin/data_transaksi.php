<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>
    <table class="table table-hover table-stripted table-responsive table-borderd my-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Users</th>
                <th>Nama Kamar</th>
                <th>Tgl. Mulai Sewa</th>
                <th>Harga</th>
                <th>Tgl. Pembayaran Bulan Ini</th>
                <th>Status Sewa</th>
                <th>Status Pembayaran Bulan Ini</th>
                <th>Cek Pembayaran</th>
                <th>Aksi</th>
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

                    <td>
                        <?php 
                            if($tr->status_pembayaran=="0"){
                                echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                            }else{ 
                                echo "<span class='badge badge-success'>Sudah Dibayar</span>";}
                        ?>
                    </td>
                    <td>
                        <center class="">
                        <?php 
                            if(empty($tr->bukti_pembayaran)) { ?>
                                <button class="btn btn-sm btn-danger"> <i class="fas fa-times-circle"></i></button>
                        <?php }else{ ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/transaksi/pembayaran/'.$tr->id_transaksi) ?>">
                                    <i class="fas fa-check-circle"></i> </a>
                        <?php }?>
                        </center>
                    </td>

                    <td>
                        <?php 
                            if($tr->status=="1"){ 
                                echo"<span class='badge badge-danger'>Sewa Selesai</span>";
                            }else{ ?>
                            <a href="<?php echo base_url('admin/transaksi/transaksi_selesai/').$tr->id_transaksi ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                            <?php } ?>
                            <a onclick="return confirm ('Anda Yakin ?')" href="<?php echo base_url('admin/transaksi/batal_transaksi/').$tr->id_transaksi ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </section>
</div>