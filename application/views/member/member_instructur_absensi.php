<style type="text/css" media="screen">

</style>   
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Instructur</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>member">Home</a>
                    </li>
                    <li>Instructur</li>
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
			        <a href="<?php echo base_url();?>member/instructur/<?php echo $this->session->userdata('idAuth'); ?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
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
               <th>Action</th>
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
               <select class="btn btn-sm btn-info" name="absen[]">
                 <option <?php echo ($value['status'] == 1) ? "selected" :'';  ?> value="1" >Hadir</option>
                 <option <?php echo ($value['status'] == 2) ? "selected" :'';  ?> value="2" >Sakit</option>
                 <option <?php echo ($value['status'] == 3) ? "selected" :'';  ?> value="3" >Izin</option>
                 <option <?php echo ($value['status'] == 4) ? "selected" :'';  ?> value="4" >Alfa</option>
               </select></td>
             </tr>
             <?php $no++; } ?>
           </tbody>
         </table> <br>

         <button type="submit"  class="btn btn-success pull-right">Submit</button>
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
        "autoWidth": true,
        "paging": false,
  }); 
}); 
// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>


