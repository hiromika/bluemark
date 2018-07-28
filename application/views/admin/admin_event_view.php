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
                <h1>Event View</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a></li>
                    <li><a href="<?php echo base_url();?>admin/menEvent">List View</a></li>
                    <li>View Event</li>
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
                    <h4>Detail Event</h4>
                    <a href="<?php echo base_url();?>admin/menEvent" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
                </div>


                <div class="box box-info">
                <div class="box-body">
                    <div class="alert">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?php echo base_url(); echo $event['gambar']; ?>" class="img-rounded" style="width: 100%; height: 300px;  background-size: cover;
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
                    
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
</section>




<script type="text/javascript">

$(function(){
	$('#tbuser').DataTable({
		"paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
	});	
});	
/*
$(".btn[data-target='#edit']").on('click',function(){
  $("#_judul").val($(this).closest('tr').children()[1].textContent);
  $("#_gambar").val($(this).closest('tr').children()[3].textContent);
  $("#textarea").val($(this).closest('tr').children()[2].textContent);
  console.log($(this).closest('tr').children()[4].textContent); 
});*/

$('#textarea').wysihtml5({
	toolbar: {
	"link": false, 
    "image": false,
	}});
</script>
<?php } ?>