<style type="text/css" media="screen">

</style>   
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Class</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>member">Home</a>
                    </li>
                    <li>Class</li>
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
 <?php $no=0; foreach ($idk as $key => $value) {
       foreach ($idkel[$key]['id_kel'] as $subkey => $value1) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-12">
                 <h5 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordionOne" href="#<?php echo $no; ?>">
                    <?php echo $value1['kelas']; ?> 
                  </a>
                  <div class="member-information">
                    <a href="<?php echo base_url();?>member/delroll/<?php echo $this->session->userdata('idAuth'); ?>/<?php echo $value1['id']?>" class="btn btn-sm btn-danger pull-right" title="Delete class" onclick="return confirm('Are you sure you want to delete this item?');">Remove Class</a>
                     <a href="<?php echo base_url();?>member/viewForums/<?php echo $value1['id']?>" class="btn btn-sm btn-success pull-right" title="forum class" style="margin-right: 10px;">Forum Class</a>
                  </div>
                  </h5>  
            </div>
            </div>
            </div>
            <div id="<?php echo $no; ?>" class="panel-collapse collapse in">
                <div class="panel-body">

                <table class="table table-hover table-striped">
                    <thead>
                      <tr class="info">
                        <th>Hari</th>
                        <th>Jam</th>
                        <!-- <th>Absensi</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($keljad[$subkey]['jadwal'] as $subkey2 => $value2) {
                    			// foreach ($kelAb[$subkey2]['keleb'] as $subkey3 => $value3) {
                      ?> 
                      <tr>
                      <td><?php echo date('l-d-m-Y',strtotime($value2['tgl_kelas'])); ?></td>
                      <td><?php echo $value2['jam_mulai']; echo " s/d ".$value2['jam_akhir']; ?></td>
                     <!--  <td>  <?php echo ($value3['status'] == 1) ? "Hadir":'';  ?>
                 			<?php echo ($value3['status'] == 2) ? "Sakit":'';  ?> 
                 			<?php echo ($value3['status'] == 3) ? "Izin" :'';  ?> 
                 			<?php echo ($value3['status'] == 4) ? "Alfa" :'';  ?>
                 	  </td> -->

                      </tr>
                    <?php } ?>
                    </tbody>
                </table>

           
                </div>
            </div>
        </div>
      <?php $no++; } } ?>                    

  </div>


	   </div>
	</div>
</div>
</section>
        


<script type="text/javascript">
// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>


