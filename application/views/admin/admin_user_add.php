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
                <h1>List User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>List User</li>
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
            <li>
              <a href="<?php echo base_url();?>admin/menUser">List User</a>
            </li>
            <li class="active">
              <a href="<?php echo base_url();?>admin/addUser">Add User</a>
            </li>
             <li>
                <a href="<?php echo base_url();?>admin/message">Message</a>
            </li>
          </ul>
        </div>
      </div>
    </div><!-- col -->

		<div class="col-md-9">
        <div class="heading">
            <h2>Add User</h2>
        </div>

        <form action="<?php echo base_url();?>admin/add_user" method="POST" accept-charset="utf-8">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" value="" placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="fullname" value="" placeholder="Full name" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="" placeholder="E-mail" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="Confirm  Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-template-main">Submit</button>
          </div>
        </form>

    </div>


  </div>
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
</script>
<?php } ?>