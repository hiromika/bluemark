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
                    <li><a href="<?php echo base_url();?>member">Home</a></li>
                    <li>Change Password</li>
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
        <h5>Change Password</h5>
        <a href="<?php echo base_url();?>member/DetailUser/<?php echo $this->session->userdata('idAuth');?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
      </div>

      <div class="col-md-3">
         <div class="panel panel-default sidebar-menu with-icons">
              <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked">
                     <li><a href="<?php echo base_url();?>member/DetailUser/<?php echo $this->session->userdata('idAuth');?>">My Profile</a>
                      </li>
                      <li class=""><a href="<?php echo base_url();?>member/listforum/<?php echo $this->session->userdata('idAuth');?>">My Thread</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url();?>member/message">Message</a>
                      </li>
                      <li class="active"><a href="<?php echo base_url();?>member/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>

      <div class="col-md-9">
        <div class="col-md-2 text-center" style="padding-bottom: 15px;">
          <p style="color: grey;">Foto Profile</p>
          <form action="<?php echo base_url();?>member/upFotoPro" method="POST" id="fot" accept-charset="utf-8" enctype="multipart/form-data">
          <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-responsive" alt="profile foto" width="100%" height="150">
            <a href="#" class="profil-foto">Edit</a>
            <input type="text" name="id" value="<?php echo $this->session->userdata('idAuth');?>" hidden placeholder="">
            <input type="file" name="foto" id="foto" class="input-foto" onchange="javascript:this.form.submit()" style="display: none;">
          </form>
        </div>

        <div class="col-md-10">
        	<form action="<?php echo base_url();?>member/change/<?php echo $this->session->userdata('idAuth');?>" method="POST" accept-charset="utf-8" class="form-horizontal">
        		<div class="form-group">
                <label for="Nama" class="col-md-3">Current Password<span class="required">*</span></label>
                <div class="col-md-7">
                <input class="form-control" required="" type="password" value="" name="oldpas" placeholder="Current Password">              
                </div>
             	</div>
             	<div class="form-group">
                <label for="Nama" class="col-md-3">New Password<span class="required">*</span></label>
                <div class="col-md-7">
                <input type="password" class="form-control" id="password" name="newpas" value="" placeholder="New Password" required>        
                </div>
             	</div>	

             	<div class="form-group">
                <label for="Nama" class="col-md-3">Retype New Password<span class="required">*</span></label>
                <div class="col-md-7">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="Confirm  Password" >            
                </div>
             	</div>
             <div class="col-md-9">
              <a href="<?php echo base_url();?>member/DetailUser/<?php echo $this->session->userdata('idAuth');?>" title="Back" class="btn btn-warning btn-sm btn-flat pull-right">Back</a>
              <button style="margin-right: 10px;" type="submit" class="btn btn-primary pull-right btn-sm btn-flat "><i class="fa fa-save"></i> Save new password</button>
              </div>
        	</form>
        </div>
      </div>
    </div> <!-- col -->
        
</div><!-- row -->
</div>
</section>



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
    $(".profil-foto").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".input-foto").trigger('click');
    });
});
</script>