  

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>New account / Sign in</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li>New account / Sign in</li>
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
    <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">New account</h2>

                         <hr>
                        <form action="<?php echo base_url();?>login/register" method="POST" id="register">
                        <fieldset>
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
                            <small class="muted">[Konfirmasi Account Akan dikirim Lewat E-mail Address ini]</small>
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
                            <button type="submit" class="btn btn-template-main">Register</button>
                            </div>
                        </fieldset>
                        </form>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Login</h2>

                            <p class="lead">Already our Account ?</p>
                            <div class="alert alert-danger alert-dismissible" style="display:none;" id="fail-alerts">
                                <i class="icon-remove-sign"></i>
                                <strong>Ooops!</strong>
                                <font>
                                Username and/or password invalid.                       
                                </font>
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input type="text" class="form-control"  name="usernames">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control"  name="passwords">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"  id="btn_submits"><i class="fa fa-sign-in"></i> Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
    </div>

<script type="text/javascript">

    $(document).ready(function($){
                var username = $("input[name=usernames]");
                var password = $("input[name=passwords]");
                var base_url = "<?php echo base_url();?>";

                $("#btn_submits").click(function(e){
                  e.preventDefault();

                  if(username.val() != "" && password.val() != "" ){
                    $.ajax({
                      type: "POST",
                      url: base_url+"verify_login/verify",
                      data: {'username':username.val(), 'password':password.val()},
                      success: function(resp){
                        var obj = jQuery.parseJSON(resp);
                        if(obj.result === true){
                          window.location = base_url+"home";
                        }else{
                          $('#fail-alerts').show();
                        }
                      },
                    });
                  }
                });
            });        


    var passwords = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
      if(passwords.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

