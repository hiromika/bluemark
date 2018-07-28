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
</style>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>List User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a></li>
                    <li><a href="<?php echo base_url();?>admin/menUser">List User</a></li>
                    <li>Detail User</li>
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
                    <h3 class="panel-title">User</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class=""><a href="<?php echo base_url();?>admin/menUser">List User</a>
                        </li>
<!--                         <li><a href="<?php echo base_url();?>admin/addUser">Add User</a>
 -->                    </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->
    <div class="col-md-9">
      <div class="heading">
        <h4>Detail User</h4>
        <?php if (!$kelas) { ?>
           <a href="<?php echo base_url();?>admin/menUser" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
         <?php }else{ ?>
           <a href="<?php echo base_url();?>admin/DetailKelas/<?php echo $kelas; ?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
         <?php } ?>
      </div>

      <div class="col-md-3" style="padding-right: 0px">
        <p style="color: grey; margin: 0;">Foto Profile</p>
        <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-rounded" alt="profile foto" width="100%" height="180">
        <center><b><?php echo $user['username']; ?></b></center>
      </div>

        <div class="col-md-9" style="padding-left: 8px;">
          <p style="color: grey; margin: 0;">Personal Info</p>
           <table class="table table-hover">
            <tbody>
              <tr>
                <td class="bio">Nama :</td>
                <td><?php echo $user['nama']; ?></td>
              </tr>
              <tr>
                <td class="bio">Jenis Kelamin :</td>
                <td>  <?php if ($user['jenis_kelamin'] == 1) {
                       echo "Laki-Laki";
                      }elseif($user['jenis_kelamin'] == 2){
                        echo "Perempuan";
                      }else{ echo "";
                        }?>
                </td>
              </tr>
              <tr>
                <td class="bio">Tempat Lahir :</td>
                <td><?php echo $user['tempat_lahir']; ?></td>
              </tr>
              <tr>
                <td class="bio">Tanggal Lahir :</td>
                <td><?php echo date('d-M-Y',strtotime($user['tgl_lahir'])); ?></td>
              </tr>
              <tr>
                <td class="bio">Alamat :</td>
                <td><?php echo $user['alamat']; ?></td>
              </tr>
              <tr>
                <td class="bio">Agama :</td>
                <td><?php echo ($user['agama'] == 1) ? "Islam" :''; ?>
                     <?php echo ($user['agama'] == 2) ? "Kristen" :''; ?>
                     <?php echo ($user['agama'] == 3) ? "Hindu" :''; ?>
                     <?php echo ($user['agama'] == 4) ? "Budha" :''; ?>
                     <?php echo ($user['agama'] == 0) ? "" :''; ?></td>
              </tr>
              <tr>
                <td class="bio">No. Telp :</td>
                <td><?php echo $user['tlp']; ?></td>
              </tr>
              <tr>
                <td class="bio">E-mail Aktif :</td>
                <td><?php echo $user['email']; ?></td>
              </tr>
              <tr>
                <td class="bio">Status :</td>
                <td><?php echo $user['status']; ?></td>
              </tr>
            </tbody>
          </table> 

          </div>
      </div> <!-- col -->
        
</div><!-- row -->
</div>
</section>

  


  <!-- Modal -->
  <div class="modal fade" id="edit" >
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url();?>admin/EditUser" method="POST">

          	<input style="display: none;" type="text" name="id" id="_id" value="" placeholder="">

          	<div class="form-group has-feedback">
          	<input type="text" class="form-control" disabled name="username" value="" id="_username" placeholder="Username">
          	</div> 

          	<div class="form-group has-feedback">
          	<select class="form-control" name="level" id="_level" >
          	<?php 
          		foreach ($role as $key => $value) { ?>
          		<option value="<?php echo $value['id_role'] ?>"><?php echo $value['role_name']; ?></option>
          	<?php }	?>
          	</select>
          	</div> 
          	

        </div>
        <div class="modal-footer">
          <input type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">
        </div>
         </form>
      </div>
      
    </div>
  </div>



<script type="text/javascript">

$(function(){
	$('#tbuser').DataTable({
		"paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
	});	
});	


</script>
<?php } ?>