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
<?php }elseif ($level = 1) {
?>
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>List Kelas</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li><a href="<?php echo base_url();?>admin/menKelas" title="">List Kelas</a></li>
                    <li>Detail Kelas</li>
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
                    <h3 class="panel-title">Kelas</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo base_url();?>admin/menKelas">List Kelas</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/addKelas">Add Kelas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->

  <div class="col-md-9">

                <div class="heading">
                    <h5>Detail Kelas</h5>
                    <a href="<?php echo base_url();?>/admin/menKelas" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
                </div>
                <div class="" style="overflow-x:auto;">            
                   <table class="table table-hover">
                      <tr>
                        <th style="width: 30%;">Kelas :</th>
                            <td><?php echo $kelas['kelas']; ?></td>
                      </tr>
                      <tr>
                        <th>Event :</th>
                            <td><?php echo $kelas['judul_event']; ?></td>
                      </tr>
                      <tr>
                        <th>Instruktur :</th>
                            <td><?php echo $kelas['username']; ?></td>
                      </tr>
                      <tr>
                        <th>Jumlah Sesi :</th>
                            <td><?php echo $kelas['jumlah_sesi']; ?></td>
                      </tr>
                      <tr>
                        <th>Maksimum Peserta :</th>
                            <td><?php echo $kelas['kuota']; ?></td>
                      </tr>
                   </table>
                   <table class="table table-hover">
                     <thead>
                    <caption><big>Jadwal Kelas </big>
                      <?php 
                      if (!$cekstat) { ?>
                      <a href="" class="btn btn-template-primary btn-sm pull-right" style="margin-bottom: 10px;" data-toggle="modal" data-target="#absensi" title="Add Peserta">Print Laporan Absensi</a>
                        
                     <?php  }else{ ?>
                      <a href="<?php echo base_url();?>admin/print_kelas/<?php echo $id_kelas; ?>" class="btn btn-template-primary btn-sm pull-right" style="margin-bottom: 10px;"  title="print laporan">Print Laporan Absensi</a>
                      <?php  }?>
                    


                    </caption>
                       <tr class="success">
                         <th style="width: 30%;">Tanggal</th>
                         <th>Jam</th>
                         <th>Status</th>
                         <th>Detail</th>
                       </tr>
                     </thead>
                     <tbody>
                     <?php $no=1; foreach ($jadwal as $key => $value) { ?>
                       <tr>
                         <td><?php echo date('d-M-Y',strtotime($value['tgl_kelas']));?></td>
                         <td><?php echo $value['jam_mulai']." s/d ".$value['jam_akhir'];?></td>
                         <td>
                           <?php if ($value['status']==1) { ?>
                            <h6 class="text-center" style="color: white; background-color: #00802b; padding: 2px; ">Selesai</h6>
                          <?php }else{ ?>
                            <h6 class="text-center" style="color: white; background-color: #ff9933; padding: 2px; ">Belum Selesai</h6>
                          <?php  }?>
                         </td>
                         <td><a href="<?php echo base_url();?>admin/DetailAbsen/<?php echo $id_kelas.'/'.$value['id']; ?>" class="btn btn-info btn-sm" title="Info Detail"><i class="fa fa-info"></i></a></td>
                       </tr>
                       <?php $no++; }?>
                     </tbody>
                   </table>
                  
                   <table class="table table-hover">
                     <thead>
                     <caption><big>Daftar Nama Peserta Kelas </big> <a href="" class="btn btn-success btn-sm pull-right" style="margin-bottom: 10px;" data-toggle="modal" data-target="#myModal" title="Add Peserta">Add Peserta</a></caption>
                       <tr class="info">
                         <th>No</th>
                         <th style="width: 15%">Kode User</th>
                         <th style="width: 75%">Nama</th>
                         <th>Detail</th>
                       
                       </tr>
                     </thead>
                     <tbody>
                      <?php $nom =1; foreach ($peserta as $key => $value) {  ?>
                       <tr>
                         <td><?php echo $nom; ?></td>
                         <td><?php echo $value['kode_user']; ?></td>
                         <td><?php echo $value['nama']; ?></td>
                         <td>

                          <div class="dropdown">
                            <button class="btn btn-primary btn sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" style="min-width: 0px !important; padding: 0 !important; margin: 1 !important;">
                              <li><a href="<?php echo base_url();?>admin/DetailUser/<?php echo $value['id_user'].'/'.$id_kelas; ?>" title="Info Detail" style="background-color:  #00c0ef; color: #fff;" >Detail</a></li>
                              <li><a href="<?php echo base_url();?>admin/delroll/<?php echo $value['id_user'].'/'.$id_kelas; ?>" onclick="return confirm('Are you sure you want to delete this item?');"  title="Delete" style="background-color: #d9534f; color: #fff;">Delete</a></li>
                            </ul>
                          </div>
                          
                         </td>
                       </tr>
                       <?php $nom++; } ?>
                     </tbody>
                   </table>

                </div>
         </div>
    </div> <!-- row -->
</div><!-- container -->
</section>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Peserta Kelas</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url();?>admin/addPeserta" method="POST" accept-charset="utf-8">
      <table class="table" id="tbl">
        <thead>
          <tr style="background-color: grey; color: white;">
            <th style="width:;">Kode User</th>
            <th>Nama</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($user as $key => $value) { ?>
          <tr>
            <td><?php echo $value['kode_user']; ?></td>
            <td><?php echo $value['nama']; ?></td>
            <td class="text-center"><input type="checkbox" name="id_user[]" value="<?php echo $value['idu']; ?>"></td>
          </tr>
        <?php } ?>
            <input hidden="" type="text" name="id_kelas" value="<?php echo $id_kelas; ?>" >
            <input hidden="" type="text" name="id_event" value="<?php echo $id_events['id_event']; ?>"> 
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="absensi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Info</h4>
      </div>
      <div class="modal-body">

        <div class="heading text-center">
            <h3>Tidak Dapat Print Laporan Karena Seluruh Sesi Kelas Belum Selesai</h3>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

$(function(){
  $('#tbl').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true,
        "ordering" : false,
  }); 
}); 

/*
$(".btn[data-target='#edit']").on('click',function(){
  $("#_judul").val($(this).closest('tr').children()[1].textContent);
  $("#_gambar").val($(this).closest('tr').children()[3].textContent);
  $("#textarea").val($(this).closest('tr').children()[2].textContent);
  console.log($(this).closest('tr').children()[4].textContent); 
});*/

</script>
<?php } ?>