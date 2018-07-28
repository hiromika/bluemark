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
                    <li>Detail Absensi</li>
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
        <div class="col-md-12">
				  <div class="heading">
			        <h5>Absensi <?php echo date('l-d-m-Y',strtotime($jadwal['tgl_kelas']));  ?></h5>
			        <a href="<?php echo base_url();?>admin/DetailKelas/<?php echo $idk; ?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
			   </div>
         
       <form action="<?php echo base_url();?>member/inAbsen/<?php echo $idk.'/'.$idj; ?>" method="POST" accept-charset="utf-8">
       <input type="text" name="id_jad" hidden value="<?php echo $jadwal['id']; ?>" placeholder="">
         <table class="table table-hover table-striped" id="tbl">
           <thead>
             <tr class="warning">
               <th style="width: 5%;">No</th>
               <th style="width: 10%;">Kode User</th>
               <th>Nama</th>
               <th>L/P</th>
               <th>Status</th>
             </tr>
           </thead>
           <tbody>
           <?php $no = 1; foreach ($user as $key => $value) {
            ?>
             <tr>
               <td><?php echo $no; ?> 
               <td><?php echo $value['kode_user']; ?> 
               <input type="text" name="id_user[]" value="<?php echo $value['ids']; ?>" hidden>  </td>
               <input type="text" name="id_jadwal[]" value="<?php echo $jadwal['id']; ?>" hidden>
               <td><?php echo $value['nama'];?></td>
               <td  class="text-center"><?php if ($value['jenis_kelamin'] == 1) {
                       echo "L";
                      }elseif($value['jenis_kelamin'] == 2){
                        echo "P";
                      }else{ echo "";
                        }?></td>
               <td>
             <!--   <select class="btn btn-sm btn-info" name="absen[]"> -->
                 <?php echo ($value['status'] == 1) ? "Hadir" :'';  ?> <!-- value="1" >Hadir</option> -->
                 <?php echo ($value['status'] == 2) ? "Sakit" :'';  ?> <!-- value="2" >Sakit</option> -->
                 <?php echo ($value['status'] == 3) ? "Izin" :'';  ?> <!-- value="3" >Izin</option> -->
                 <?php echo ($value['status'] == 4) ? "Alfa" :'';  ?> <!-- value="4" >Alfa</option> -->
           <!--     </select></td> -->
             </tr>
             <?php $no++; } ?>
           </tbody>
         </table> <br>

       <!--   <button type="submit"  class="btn btn-success pull-right">Submit</button> -->
       </form>



	   </div>
	</div>
</div>
</section>
        


<script type="text/javascript">
$(function(){
  $('#tbl').DataTable({
    "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
  }); 
}); 
// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>
<?php } ?>

