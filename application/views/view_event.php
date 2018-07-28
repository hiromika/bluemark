<style type="text/css" media="screen">
.tr{
	
	background: rgba(0, 0, 0, 0.10);
	font: 20px Sans-Serif;
	color: black;
	margin-bottom: 10px;
	margin-top: 10px;
	padding: 10px; 
	border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
</style>   
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>List Event</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>dashboard">Home</a>
                    </li>
                    <li>Event</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<section>
<div class="container">
    <div class="row">        
        <div class="col-md-12">
				<div class="heading">
			        <h5>Detail Event</h5>
			        <a href="<?php echo base_url();?>dashboard/event" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
			    </div>


	        	<div class="box box-info">
	        	<div class="box-body">
	        		<div class="alert">
	        			<div class="row">
	        				<div class="col-md-12">
	            				<img src="<?php echo base_url(); echo $event['gambar']; ?>" class="img-rounded img-responsive" style="width: 100%; height: 260px;  background-size: cover;
										position: relative; ">
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-12">
	        					<div class="tr">
	        					<?php echo $event['judul_event']; ?>
	        					</div>
							     </div>
	        			</div>
	            	<div class="row">
	        				<div class="col-md-12">
	        					<div style=" width: 100%; height: 100%; overflow-x:auto;">
	        						<p style="color: black"><?php echo $event['isi']; ?></p>
	        					</div>
							     </div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-12">
	        				<?php if (!($check)) { ?>
	        					<button type="button" class="btn btn-info pull-right" data-target="#enroll" data-toggle="modal">Enroll</button>

							<?php }else{} ?>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	</div>
	    </div>
	</div>
</div>
</section>
        

    <!-- Modal -->
  <div class="modal fade" id="enroll" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Daftar Kelas Dalam Event Ini</h4>
				</div>
				<div class="modal-body">
					
<div class="row">
<div class="col-md-12">
<div class="panel-group accordion" id="accordionOne">

<form action="" method="POST" accept-charset="utf-8">
<?php
  if (!$kelas) { ?>
        <div class="heading text-center">
              <h4>Tidak Ada Kelas</h4>
        </div>
 <?php }else{
 $no=0; foreach ($kelas as $key => $value) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-10">
                 <h5 class="panel-title"> 
                  <a data-toggle="collapse" data-parent="#accordionOne" href="#<?php echo $no; ?>">
                    <?php echo $value['kelas']; ?> 
                    </a>
                  </h5>  
            </div>
              <div class="col-md-2">
                <input  type="checkbox" id="pilih"  class="pull-right chk" required="" value="<?php echo $value['id'] ?>" name="id_kelas">
              </div>
            </div>
            </div>
            <div id="<?php echo $no; ?>" class="panel-collapse collapse in">
                <div class="panel-body">
                <caption> Sisa Kuota : <?php foreach ($kuot_k[$key]['kuo_k'] as $keys => $value1) {
                  foreach ($kuot_t[$key]['kuo_t'] as $keyss => $value3) {  
                    echo $value1 -$value3;

                ?>

                </caption>
                <table class="table">
                  	<thead>
                  		<tr>
                  			<th>Hari</th>
                  			<th>Jam</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  	<?php foreach ($list[$key]['lis'] as $subkey => $value2) {
                  		?> 
                  		<tr>
                  		<td><?php echo date('l-d-m-Y',strtotime($value2['tgl_kelas'])); ?></td>
                  		<td><?php echo $value2['jam_mulai']; echo "-".$value2['jam_akhir']; ?></td>
                  		</tr>
                    <?php } } } ?>

                  	</tbody>
                </table>

    
    <input hidden="" type="text" name="id_user" value="<?php echo $this->session->userdata('idAuth') ?>" >
    <input hidden="" type="text" name="id_event" value="<?php echo $id_event; ?>"> 

                </div>
            </div>
        </div>
<?php $no++; } }?>                    

</div>
</div>
</div>


				</div>
				<div class="modal-footer">
        <?php
        if (!$kelas) {}else{ ?>
				<a href="" data-toggle="modal" data-target="#login-modal" class="btn btn-sm btn-info btn-flat" title="" data-dismiss="modal">Submit</a>
        <?php }?>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
    </div>
  </div>

<script type="text/javascript">
$('input.chk').on('change', function() {
    $('input.chk').not(this).prop('checked', false);  
});
</script>


