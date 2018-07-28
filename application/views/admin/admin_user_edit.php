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
 -->                      </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->
    <div class="col-md-9">
      <div class="heading">
        <h4>Detail User</h4>
           <a href="<?php echo base_url();?>admin/menUser" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
      </div>

      <div class="col-md-3" style="padding-right: 0px">
        <p style="color: grey; margin: 0;">Foto Profile</p>
        <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-rounded" alt="profile foto" width="100%" height="180">
        <center><b><?php echo $user['username']; ?></b></center>
      </div>

        <div class="col-md-9" style="padding-left: 8px;">
          <p style="color: grey; margin: 0;">Personal Info</p>
          <form action="<?php echo base_url();?>admin/EditUser" method="POST" accept-charset="utf-8">
           <table class="table table-hover">
            <input type="text" name="id" style="display: none;" value="<?php echo $user['id_user'];?>">
            <tbody>
              <tr>
                <td class="bio">Nama :</td>
                <td> <input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Jenis Kelamin :</td>
                <td> <select name="kelamin" class="form-control" >
                  <option selected="" value="0"  >~ Pilih Jenis Kelamin ~</option>
                  <option <?php echo ($user['jenis_kelamin']==1) ? "selected" :''; ?> value="1">Laki - Laki</option>  
                  <option <?php echo ($user['jenis_kelamin']==2) ? "selected" :''; ?> value="2">Perempuan</option>  
                </select>    
                </td>
              </tr>
              <tr>
                <td class="bio">Tempat Lahir :</td>
                <td><input type="text" name="tempat" class="form-control" value="<?php echo $user['tempat_lahir']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Tanggal Lahir :</td>
                <td><input type="text" name="tgl" id="tgl" class="form-control" value="<?php echo date('d-m-Y',strtotime($user['tgl_lahir'])); ?>"></td>
              </tr>
              <tr>
                <td class="bio">Alamat :</td>
                <td><input type="text" name="alamat" class="form-control" value="<?php echo $user['alamat']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Agama :</td>
                <td><select name="agama" class="form-control">
                  <option selected="" value="0" >~ Pilih Agama ~</option>
                    <option <?php echo ($user['agama'] == 1) ? "selected" :''; ?> value="1">Islam</option>
                    <option <?php echo ($user['agama'] == 2) ? "selected" :''; ?> value="2">Kristen</option>
                    <option <?php echo ($user['agama'] == 3) ? "selected" :''; ?> value="3">Hindu</option>
                    <option <?php echo ($user['agama'] == 4) ? "selected" :''; ?> value="4">Budha</option>
                </select>      
                </td>
              </tr>
              <tr>
                <td class="bio">No. Telp :</td>
                <td><input type="number" name="tlp" class="form-control" value="<?php echo $user['tlp']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">E-mail Aktif :</td>
                <td><input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Sekolah :</td>
                <td><input type="text" name="kampus" class="form-control" value="<?php echo $user['sekolah']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Status :</td>
                <td><input type="text" name="status" class="form-control" value="<?php echo $user['status']; ?>"></td>
              </tr>
              <tr>
                <td class="bio">Level :</td>
                <td>
                  <select class="form-control" name="level" id="_level" >
                  <?php 
                    foreach ($role as $key => $value) { ?>
                    <option value="<?php echo $value['id_role']; ?>" <?php echo ($value['id_role']==$users['level'])?'selected':''; ?>><?php echo $value['role_name']; ?></option>
                  <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="bio">Status Akun :</td>
                <td>
                   <select name="verified" class="form-control">
                     <option disabled >~ Select Satus Akun ~</option>
                     <option value="1" <?php echo ($user['verified']==1)?'selected':'' ?> >Verified</option>}
                     <option value="0" <?php echo ($user['verified']==0)?'selected':'' ?> >Unverified</option>}
                   </select>
                </td>
              </tr>
              <tr>
                <td class="bio">User Password :</td>
                <td><input type="password" class="form-control" id="password" name="newpas" value="" placeholder="New Password">  </td>
              </tr>  
              <tr>
                <td class="bio">Retype User Password :</td>
                <td><input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="Confirm  Password" > </td>
              </tr>
            </tbody>
          </table> 
            <button type="submit" class="btn btn-template-primary pull-right">Submit</button>
          </form>
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
            <?php } ?>
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

var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

$(function(){
  $('#tgl').datetimepicker({
      format: 'D-M-YYYY',
    });
});
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