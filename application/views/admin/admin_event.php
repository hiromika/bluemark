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
                <h1>List Event</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>List Event</li>
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
                        <li class="active"><a href="<?php echo base_url();?>admin/menEvent">List Event</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/addEvent">Add Event</a>
                     	</li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->
        
        <div class="col-md-9">

                <div class="heading">
                    <h4>List Event</h4>
                </div>

                <table class="table table-hover" id="tb">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <div class="row portfolio no-space">
                                <?php 
                                $no=1;
                                foreach ($event as $key => $value) {
                                 ?> 
                                    <tr>
                                    <td>
                                    <section class="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="image" style="height: 200px;">
                                                    <a href="<?php echo base_url();?>dashboard/DetailEvent/<?php echo $value['id']; ?>">
                                                        <img src="<?php echo base_url(); echo $value['gambar']; ?>" style="width: 100%; height: 100%;" class="img-responsive" alt="Example blog post alt">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-7 text-center">
                                                 <p class="buttons" style="margin-top: 80px;">
                                                    <a href="<?php echo base_url();?>admin/viewEvent/<?php echo $value['id']; ?>" class="btn btn-info"o>View</a>
                                                    <a href="<?php echo base_url();?>admin/changeEvent/<?php echo $value['id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url();?>admin/DeleteEvent/<?php echo $value['id']; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                
                                    </td>
                                    </tr>
                                <?php $no++; }?>
                                </div>  
                                </tbody>
                        </table>
                

              <!--   <table id="tb">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($event as $key => $value) {
                         ?>
                        <tr>
                            <td style="">      
                            <div class="box-image" style="height: 200px;">
                                <div class="image">
                                    <img style="height: 200px; width: 100%;" src="<?php echo base_url(); echo $value['gambar']; ?>" alt="" class="img-responsive">
                                </div>
                                <div class="bg"></div>
                                <div class="name">
                                    <h3><a href=""><?php echo $value['judul_event']; ?></a></h3> 
                                </div>
                                <div class="text">
                                    <p class="buttons">
                                        <a href="<?php echo base_url();?>admin/viewEvent/<?php echo $value['id']; ?>" class="btn btn-info"o>View</a>
                                        <a href="<?php echo base_url();?>admin/changeEvent/<?php echo $value['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url();?>admin/DeleteEvent/<?php echo $value['id']; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </p>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
 -->
         </div>
    </div> <!-- row -->
</div><!-- container -->
</section>




<script type="text/javascript">

$(function(){
	$('#tb').DataTable({
		"paging": true,
        "lengthChange": true,
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