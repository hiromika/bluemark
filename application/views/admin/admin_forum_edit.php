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

<style type="text/css" media="screen">

</style>   
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Forum</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li><a href="<?php echo base_url();?>admin/forum">Forum</a></li>
                    <li>New Forum</li>
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
        <h5>Edit Forum</h5>
      	<a href="<?php echo base_url();?>admin/viewForum/<?php echo $forum['id']; ?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
    </div>

    <form action="<?php echo base_url();?>admin/addForum" method="POST" accept-charset="utf-8" class="" enctype="multipart/form-data">
    
    <input type="text" name="id" value="<?php echo $forum['idf']; ?>" hidden placeholder="">
    <input type="text" name="id_user" value="<?php echo $this->session->userdata('idAuth'); ?>" placeholder="" hidden>	

	<div class="form-group">
      	<span class="input-group-addon">Judul</span>
      	<input  type="text" class="form-control" name="judul" value="<?php echo $forum['judul_forum']; ?>" placeholder="Judul Thread" required="">
    </div>
	<div class="form-group">
		<span class="input-group">Detail</span>
		<textarea class="form-control" name="isi" id="textarea" placeholder=" Enter text ..." style=" height: 200px; " required=""><?php echo $forum['isi_forum']; ?></textarea>
	</div>

    <?php if (!$forum['file']) { ?>
    <div class="input-group" style="margin-bottom: 20px;">
        <span class="input-group-addon">File</span>
        <input  type="file" class="form-control" name="file" placeholder="File">
    </div>
    <?php }else{ ?>
    <div class="input-group" style="margin-bottom: 20px;">
        <span class="input-group-addon">File</span>
        <input  type="file" class="form-control" name="file" placeholder="File" required="">
    </div>    	
    <?php } ?>

	<div class="form-input">
	<button type="submit" class="btn btn-template-primary pull-right">Save</button>	
	</div>
    </form>
     	
    </div>
  </div>
</div>
</section>
        


<script type="text/javascript">

	$('#textarea').wysihtml5({
	toolbar: {
	"link": false, 
    "image": false,
	}});


</script>

<?php } ?>
