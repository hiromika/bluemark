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
                <h1>List Kelas</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>List Kelas</li>
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
                    <h3 class="panel-title">Kelas</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php echo base_url();?>admin/menKelas">List Kelas</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/addKelas">Add Kelas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->

  <div class="col-md-9">

                <div class="heading">
                    <h4>List Kelas</h4>
                </div>
                <div class="" style="overflow-x:auto;">            
                   <table class="table table-hover" id="tbl">
                       <thead>
                           <tr class="success">
                               <th>No</th>
                               <th style="display: none;">idk</th>
                               <th>Event</th>
                               <th>instruktur</th>
                               <th>Kelas</th>
                               <th>Jumlah Sesi</th>
                               <th>Jumlah Terdaftar</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php
                       $id=1;
                        foreach ($kelas as $key => $value) { ?>
                           <tr>
                            <td><?php echo $id; ?></td>
                            <td style="display: none;"><?php echo $value['idk']; ?></td>
                            <td><?php echo $value['judul_event']; ?></td>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['kelas']; ?></td>
                            <td><?php echo $value['jumlah_sesi']; ?></td>
                            <td><?php echo $value['terdaftar']; ?></td>
                            <td>

                            <div class="dropdown">
                              <button class="btn btn-primary btn sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu" style="min-width: 0px !important; padding: 0 !important; margin: 1 !important;">
                                <li><a href="<?php echo base_url();?>admin/DetailKelas/<?php echo $value['idk']; ?>" title="Info Detail" style="background-color:  #00c0ef; color: #fff;" >Detail</a></li>
                                <li><a href="<?php echo base_url();?>admin/KelasEdit/<?php echo $value['idk'];?>" title="Edit" style="background-color:  #5cb85c; color: #fff;" >Edit</a></li>
                                <li><a href="<?php echo base_url();?>admin/DeleteKelas/<?php echo $value['idk']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"  title="Delete" style="background-color: #d9534f; color: #fff;">Delete</a></li>
                              </ul>
                            </div>
                            </td>
                           </tr>
                        <?php $id++; } ?>
                       </tbody>
                   </table>
                </div>
         </div>
    </div> <!-- row -->
</div><!-- container -->
</section>


<script type="text/javascript">

$(function(){
	$('#tbl').DataTable({
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

</script>
<?php } ?>