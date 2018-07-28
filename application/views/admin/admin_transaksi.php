<?php 
$level = $this->session->userdata('level');
if ($level > 1) { ?>
       <div id="content">
            <div class="container">

                <div class="col-sm-6 col-sm-offset-3" id="error-page">

                    <div class="box">

                        <p class="text-center">
                            <a href="index.html">
                                <img src="<?php echo base_url();?>assets/img/bm_logo.png" alt="e">
                            </a>
                        </p>

                        <h3>We are sorry - this page is not here anymore</h3>
                        <h4 class="text-muted">Error 404 - Page not found</h4>

                        <p class="buttons"><a href="<?php echo base_url();?>member" class="btn btn-template-main"><i class="fa fa-home"></i> Go to Homepage</a>
                        </p>
                    </div>

                </div>
                <!-- /.col-sm-6 -->
            </div>
            <!-- /.container -->
        </div>
<?php }elseif ($level = 1) { ?>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>List Dokumen</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Transaksi</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('alert')){ ?>
<div class="container">
<div class="row">
      <div class="col-md-12" style="padding: 10px;">
        <div class="alert <?php echo $this->session->flashdata('alert');?> alert-dismissible" style="margin-bottom: 0">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <?php echo $this->session->flashdata('alert-msg'); ?>
        </div>
      </div>
</div>
</div>
 <?php } ?>

<section>
<div class="container">
    <div class="row">
     <div class="col-md-3">
            <!-- *** MENUS AND WIDGETS *** -->
            <div class="panel panel-default sidebar-menu with-icons">
                <div class="panel-heading">
                    <h3 class="panel-title">User</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li >
                            <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url();?>admin/menDokAdd">Add Dokumen</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url();?>admin/transaksi">Transaksi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
    </div><!-- col -->
 
    <div class="col-md-9">
    <div class="heading" style="margin-bottom: 20px !important;">
        <h5>List Transaksi</h5>  
    </div>
      <div style="overflow-y: auto;" >
      <button type="button" onclick="del()" style="margin:10px !important;" class="btn btn-danger">DELETE</button>
      <table style="overflow-x: auto" class="table table-responsive table-hover" id="tbl">
           <thead>
               <tr>
                   <th style="display: none;">id</th>
                   <th><input type="checkbox" class="del_all" value=""></th>
                   <th>No</th>
                   <th>No Transaksi</th>
                   <th>User</th>
                   <th>Dokumen</th>
                   <th>Harga</th>
              <!--      <th>Jumlah</th> -->
                   <th>Tanggal</th>
                   <th>Konfirmasi</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
            <?php 
            $no=1;
                foreach ($list as $key => $value) {
               
             ?>
               <tr>
                   <td style="display: none;"><?php echo $value['id_t'] ?></td>
                   <td><input type="checkbox" name="id_t[]" class="del_t" value="<?php echo $value['id_t'] ?>"></td>
                   <td class="text-center"><?php echo $no; ?></td>
                   <td><?php echo $value['id_transaksi'];?></td>
                   <td><?php echo $value['nama']; ?></td>
                   <td><?php echo $value['judul']; ?></td>
                   <td><?php echo number_format($value['hargas'],0,',','.');   ?></td>
                 <!--   <td><?php echo $value['jumlah']; ?></td> -->
                   <td><?php echo $value['tgl_transaksi']; ?></td>
                   <td><?php echo ($value['status_kon']==1)?'<p class="text-center" style="background-color: green; color: #fff;">Terkonfirmasi</p>':'<p class="text-center" style="background-color: red; color: #fff;">Belum Terkonfirmasi</p>'; ?></td>
                   <td><?php if($value['statuss']==0) { ?>
                    <p class="text-center" style="background-color: orange; color: #fff;">Belum Terverifikasi</p>
                   <?php }else{ ?>
                    <p class="text-center" style="background-color: green; color: #FFF;">Sudah Terverifikasi</p>
                   <?php } ?></td>
                   <td>
                    <div class="dropdown">
                      <button class="btn btn-info btn sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" style="min-width: 0px !important; padding: 0 !important; margin: 1 !important;">
                        <li><a href="/admin/TransDetail/<?php echo $value['id_transaksi'];?>" title="Delete" class="btn btn-sm "  style=" background-color: #33cc33; color: #fff;" >Detail</a></li>
                        <li><a href="" data-toggle="modal" data-target="#edit_" title="Delete" class="btn btn-sm"  style=" background-color: #00bfff; color: #fff;" >Edit</a></li>
                        <li><a href="/admin/delTrans/<?php echo $value['id_t'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete" class="btn btn-sm"  style=" background-color: #e60000; color: #fff;" >Delete</a></li>
                      </ul>
                    </div>
                    </td>
               </tr>
            <?php $no++; }  ?> 
           </tbody>
       </table>
       </div> 
    </div>
    </div>
</div>
</section>             
  

  <!-- Modal -->
  <div class="modal fade" id="edit_" >
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit transaksi</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url();?>admin/editTrans" method="POST">

            <input style="display: none;" type="text" name="id" id="_id" value="" placeholder="">

            <div class="form-group has-feedback">
            <select class="form-control" name="status" id="_level" >
              <option disabled="" value="0" selected="">~Pilih Status~</option>}
              <option value="1">Sudah Bayar</option>
              <option value="0">Belum Bayar</option>
            </select>
            </div> 
            
        </div>
        <div class="modal-footer">
          <input type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">
        </div>
         </form>
      </div>
      
    </div>
  </div>



  <script type="text/javascript">

  $(".btn[data-target='#edit_']").on('click',function(){
    $("#_id").val($(this).closest('tr').children()[0].textContent);   
 
  });

  $('#tbl').DataTable({
    "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[0, 'desc']],
        "info": true,
        "autoWidth": true,
  }); 

  function del(){
  if(confirm('Are you sure your want to delete?')){
    var base = "<?php echo base_url(); ?>";
    var id = $(".del_t").val();
      if (id == ""){
        alert("Pilih list Transaksi");
      }else{

        var id_t = $(".del_t:checked").map(function(){
          return $(this).val();
        }).get();

        $.ajax({
          url: base+'admin/delTransBatch',
          type: 'POST',
          dataType: 'json',
          data: {idt: id_t},
          success:function(data){
            if (data){
              window.location = base+'admin/transaksi';
            }else{
              alert('delete gagal');
            }
          }
        });
      }
   }
  }

  $('.del_all').change(function(e){
     if ($(this).is(':checked')) {
         $('.del_t').prop('checked', true);
        }else {
         $('.del_t').prop('checked', false);
        };
  });

  </script>



<?php } ?>