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
  .bio{
    color: #000033;
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    width: 30%;
  }
  label{
   font-weight: bold;
  }
</style>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Detail User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a></li>
                    <li>My Threads</li>
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
        <h5>My Threads</h5>
        <a href="<?php echo base_url();?>admin" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
      </div>

      <div class="col-md-2 text-center" style="padding-bottom: 15px;">
        <p style="color: grey;">Foto Profile</p>
        <form action="<?php echo base_url();?>admin/upFotoPro" method="POST" id="fot" accept-charset="utf-8" enctype="multipart/form-data">
        <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-responsive" alt="profile foto" width="100%" height="150">
          <a href="#" class="profil-foto">Edit</a>
          <input type="text" name="id" value="<?php echo $this->session->userdata('idAuth');?>" hidden placeholder="">
          <input type="file" name="foto" id="foto" class="input-foto" onchange="javascript:this.form.submit()" style="display: none;">
        </form>
        <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="<?php echo base_url();?>admin/">My Thread</a>
              </li>
              <li><a href="<?php echo base_url();?>admin/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
              </li>
         </ul>
      </div>

        <div class="col-md-10">
			<div style="overflow-x: auto;">
				<table class="table table-hover " id="tbl">
					<thead>
						<tr>
						<th style="display: none;">no</th>
						<th>Thread</th>
						<th>Stat</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($forum as $key => $value) { ?>
						<tr>
						<td style="display: none;"><?php echo $value['idf']; ?></td>
						<td class="">
						<blockquote style="margin-bottom: 0px;">
						<a href="<?php echo base_url();?>admin/viewForum/<?php echo $value['idf'];?>" title="read more"><h5><?php echo $value['judul_forum'];?> </h5></a>
						<p> <i> By</i> : <u><?php echo $value['nama'].'</u> | '. date('M d, Y H:i a',strtotime($value['tgl_forum'])); ?></p>
						</blockquote>
						</td>
						<td>Replies : <br>
						Views   :
						</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
			</div>
        </div>
      </div> <!-- col --> 
</div><!-- row -->
</div>
</section>



<script type="text/javascript">
$(function(){
	$('#tbl').DataTable({
		    "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'desc']],
        "info": true,
        "autoWidth": true
	});	
});	

$(function(){
    $(".profil-foto").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".input-foto").trigger('click');
    });
});
</script>
<?php } ?>