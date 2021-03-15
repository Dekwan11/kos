<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="">Update Transaksi</h1>
        </div>

    </section>
        <?php foreach($transaksi as $tr) : ?>
            <form method="POST" action="<?php echo base_url('admin/transaksi/transaksi_selesai_aksi')?>">
            <input type="hidden" name="id_transaksi" value="<?php echo $tr->id_transaksi ?>">
            <input type="hidden" name="id_kamar" value="<?php echo $tr->id_kamar ?>">

            <div class="form-group">
                <label>Status</label>
                   <select name="status" class="form-control">
                        <option <?php if($tr->status=="1") {echo "selected='selected'";}
                                    echo $tr ->status;?> value="1">Sewa Selesai</option>
                        <option <?php if($tr->status=="0") {echo "selected='selected'";}
                                    echo $tr ->status;?> value="0">Belum Selesai</option>
                         </select>    
             </div>
            <button type="submit "class="btn btn-success">Simpan</button>
        </form>

        <?php endforeach;?>
</div>