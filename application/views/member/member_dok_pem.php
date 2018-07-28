        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>E-Book</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/member">Home</a>
                            </li>
                            <li><a href="/member/ebook/0">E-Book</a></li>
                            <li>View</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">

                <div class="col-sm-12">
                <div class="heading">
                    <h4>
                        List Pembelian
                    </h4>
                </div>
                <div style="overflow-y: auto;" >
                  
                   <table class="table table-responsive table-hover" id="tbl">
                     
                       <thead>
                           <tr class="text-center success">
                               <th>No</th>
                               <th>No Transaksi</th>
                               <th>Nama Produk</th>
                               <th>Jumlah</th>
                               <th>Total Harga</th>
                               <th>Tanggal Pembelian</th>
                               <th>Status</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php 
                        $no =1;
                        foreach ($list as $key => $value) { ?>
                           <tr>
                               <td><?php echo $no; ?></td>
                               <td><?php echo $value['id_transaksi'] ?></td>
                               <td><?php echo $value['judul_dok'] ?></td>
                               <td><?php echo $value['jumlah'] ?></td>
                               <td>Rp.<?php echo number_format($value['hargas'],0,',','.'); ?></td>
                               <td><?php echo date('d-m-Y H:i:s',strtotime($value['tgl_transaksi'])); ?></td>
                               <td><?php echo ($value['stat']==0)?'Belum Terverifikasi':'Sudah Terverifikasi' ?></td>
                               <td><?php if ($value['stat']==1 && $value['exp_down'] > date('Y-m-d H:i:s')) { ?>
                                 <a href="<?php echo base_url();?>member/download/<?php echo $value['id_transaksi'];?>" type="button" class="btn btn-xs btn-template-main">Download</a>
                               <?php }else{ ?>
                                 <button type="button" data-target="#kon" <?php echo ($value['status_kon']==1)?'disabled':'';?> data-toggle="modal" class="btn btn-xs btn-template-primary btn-sm">Konfirmasi</button>
                                 <a href="/member/delTrans/<?php echo $value['id_transaksi'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete" class="btn btn-xs"  style=" background-color: #e60000; color: #fff;" >Delete</a>
                               <?php } ?></td>
                             
                           </tr>
                        <?php $no++; } ?>
                       </tbody>
                   </table>
                </div>

                </div>

                </div> <!-- row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

   <!-- Modal -->
        <div id="kon" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal">&times;</button>
                <blockquote style="margin-bottom: 0 !important;">
                    <h4 class="modal-title">Konfirmasi</h4>
                </blockquote>
              </div>
              <div class="modal-body">
                    <form action="<?php echo base_url();?>member/konfirmasi" method="POST" class="" enctype="multipart/form-data">
                      <center>
                        <h4>Saya Telah Melakukan Pembayaran</h4>
                      </center><br>
                        <input type="text" name="id_tran" id="_id" style="display: none;">
                      <div class="form-group">
                        <label>Keterangan :</label>
                        <input type="text" name="ket" required="" placeholder="keterangan pembayaran.." class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Upload Foto Bukti Pembayaran Jika Perlu:</label>
                        <input type="file" name="bukti" class="form-control">
                      </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger pull-right btn-sm" type="button" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info pull-right btn-sm" style="margin-right: 5px;">Submit</button>&nbsp
                </form>
              </div>
            </div>

          </div>
        </div>




<script type="text/javascript">
    $('#tbl').DataTable({
    "paging": true,
        "lengthChange": true,
        "searching": true,
        // "order": [[5, 'desc']],
        "info": true,
        "autoWidth": true
  }); 

    $(".btn[data-target='#kon']").on('click',function(){
    $("#_id").val($(this).closest('tr').children()[1].textContent);
  });
</script>
