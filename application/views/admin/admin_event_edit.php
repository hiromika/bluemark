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
<!-- head -->
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Edit Event</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li><a href="<?php echo base_url();?>admin/menEvent">List Event</a></li>
                    <li>Edit Event</li>
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
                    <h3 class="panel-title">Event</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo base_url();?>admin/menEvent">List Event</a>
                        </li>
                        <li class="active"><a href="<?php echo base_url();?>admin/addEvent">Add Event</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->

        <div class="col-md-9">
                <div class="heading">
                    <h4>Edit Event</h4>
                    <a class="btn btn-info pull-right" href="<?php echo base_url();?>admin/menEvent"><i class="glyphicon glyphicon-arrow-left"></i></a> 
                </div>
    
                <div style="overflow-x:auto;">
            		<form action="<?php echo base_url();?>admin/inputEvent" method="post" enctype="multipart/form-data">
	            			<input type="text" name="id" value="<?php echo $event['id']; ?>" hidden placeholder="">
	            			
	            		<div class="form-group">
			          		<input type="text" class="form-control" name="judul" value="<?php echo $event['judul_event']; ?>" placeholder="Judul Event">
			          	</div> 

						<div class="form-group">
							<input type="file" name="gambar" value="" onchange="readURL(this);"  class="form-control" required="">
							<img id="blah" src="<?php echo base_url();echo $event['gambar']; ?>" class="img-thumbnail" width="300" height="200">
						</div>

	            		<div class="form-group">
							<textarea class="textarea form-control" name="isi" id="textarea" placeholder=" Enter text ..." style=" height: 200px"><?php echo $event['isi']; ?></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success pull-right">Submit</button>
						</div>
            		</form>
		        </div>
        </div>

     </div><!-- row -->

  </div>
</section>



<script type="text/javascript">
	$('#textarea').wysihtml5({
	toolbar: {
	"link": false, 
    "image": false,
	}});


	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php } ?>