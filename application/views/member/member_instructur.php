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
			        <h5>List Class</h5>
			        <a href="<?php echo base_url();?>member" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
			   </div>

   <div class="panel-group accordion" id="accordionOne">
 <?php $no=0; 
       foreach ($idk as $key => $value1) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-12">
                  <h5 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordionOne" href="#<?php echo $no; ?>">
                    <?php echo $value1['kelas']; ?> 
                   </a>

                   <div class="member-information">
                    <a href="<?php echo base_url();?>member/viewForums/<?php echo $value1['id']?>" class="btn btn-sm btn-template-primary pull-right" title="">Forum Class</a>
                    <a href="<?php echo base_url();?>member/print_absensi/<?php echo $value1['id']?>" class="btn btn-template-main btn-sm pull-right" title="">Print Daftar Absensi</a>
                   </div>
 

                  </h5>  
            </div>
            </div>
            </div>
            <div id="<?php echo $no; ?>" class="panel-collapse collapse in">
                <div class="panel-body">

                <table class="table table-hover table-striped" id="">
                    <thead>
                      <tr class="info">
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($keljad[$key]['jadwal'] as $subkey2 => $value2) {
                      ?> 
                      <tr>
                      <td><?php echo date('l-d-m-Y',strtotime($value2['tgl_kelas'])); ?></td>
                      <td><?php echo $value2['jam_mulai']; echo " s/d ".$value2['jam_akhir']; ?></td>
                      <td><?php if ($value2['status']==1) { ?>
                        <h6 class="text-center" style="color: white; background-color: #00802b; padding: 2px; ">Selesai</h6>
                      <?php }else{ ?>
                        <h6 class="text-center" style="color: white; background-color: #ff9933; padding: 2px; ">Belum Selesai</h6>
                      <?php  }?></td>
                      <td>
                      <a href="<?php echo base_url();?>member/instAbsen/<?php echo $value2['id_kelas'].'/'. $value2['id']; ?>" class="btn btn-xs btn-primary" title=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </td>
                      </tr>
                    <?php }?>
                    </tbody>
                </table>

           
                </div>
            </div>
        </div>
      <?php $no++; }  ?>                    

  </div>


	   </div>
	</div>
</div>
</section>
        


<script type="text/javascript">

/*$(function(){
	$('#tbl').DataTable({
		"paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
	});	
});	*/

// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>


