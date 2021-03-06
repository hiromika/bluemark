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
                <h1>Forum</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Forum</li>
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
        <h5>List Forum</h5>
        <a href="<?php echo base_url();?>admin" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
    </div>
 <a href="<?php echo base_url();?>admin/inForum" style="" class="btn btn-template-main " title="">New Thread</a>
      <div style="overflow-x: auto;">

        <table class="table table-hover" id="tbl">
          <thead>
            <tr>
              <th style="display: none;">no</th>
              <th>Thread</th>
              <th>Stat</th>
              <th>Action</th>
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
              <td>Replies : <?php echo $replies[$key]['jmlrep']; ?> <br>
                  Views   : <?php echo $viewer[$key]['vForum']; ?>
              </td>
              <td><a href="<?php echo base_url();?>admin/DelForum/<?php echo $value['idf']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger" title="Delete">Delete</a></td>
            </tr>
         <?php  } ?>

          </tbody>
        </table>
       </div>
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
        "order": [[0, 'desc']],
        "info": true,
        "autoWidth": true,
        "ordering": false,
	});	
});	

// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>

<?php } ?>
