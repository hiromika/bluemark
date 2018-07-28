<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BMlearning Center</title>

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/bluemark_logo_ico.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/morris.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3-wysihtml5.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.css">


    <script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/select2.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/morris.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
 

</head>
<body style="margin-bottom:100px;">
<?php   $this->session->userdata('idAuth');$this->session->userdata('level'); ?>

<div id="all">
<header>

            <!-- *** TOP ***
_________________________________________________________ -->
<div id="top" class="light">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="login">
                   <?php
                    $level = $this->session->userdata('level');
                    $id = $this->session->userdata('idAuth');
                     if (!$this->session->userdata('user')) { ?>
                         <a href="<?php echo base_url();?>dashboard/register"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                    <?php   
                    }elseif ($level > 1) { ?>
                        <a href="<?php echo base_url();?>member/DetailUser/<?php echo $id; ?>" title="Profile">
                        <i class="glyphicon glyphicon-user"></i> &nbsp;
                        <span class="hidden-xs"><?php echo $this->session->userdata('user'); ?></span> 
                        </a>   
                    <?php }else {?>
                        <a href="#" title="Profile">
                        <i class="glyphicon glyphicon-user"></i> &nbsp;
                        <span class="hidden-xs"><?php echo $this->session->userdata('user'); ?></span> 
                        </a>   
                    <?php } ?>                         

                    <?php if (!$this->session->userdata('user')) { ?>
                        <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                    <?php }else{ ?>
                        <a href="<?php echo base_url();?>dashboard/logout" title="Logout">
                        <i class="glyphicon glyphicon-log-out"></i> &nbsp;
                        <span class="hidden-xs">Logout</span> 
                        </a> 
                    <?php } ?>         
                               
               </div>
            </div>
        </div>
    </div>
</div>
            <!-- *** TOP END *** -->



        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">login</h4>
                    </div>
                    <div class="modal-body"> 
                    <div class="alert alert-danger alert-dismissible" style="display:none;" id="fail-alert">
                        <i class="icon-remove-sign"></i>
                        <strong>Ooops!</strong>
                        <font>
                        Username and/or password invalid.                       
                        </font>
                    </div>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username"  placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main" id="btn_submit"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo base_url();?>dashboard/register"><strong>Register now</strong></a></p>

                    </div>
                </div>
            </div>
        </div>

<!-- *** LOGIN MODAL END *** -->


            <!-- *** NAVBAR ***
    _________________________________________________________ -->

           
            <?php
                    $level = $this->session->userdata('level');
                    $id = $this->session->userdata('idAuth');
            if (!$this->session->userdata('user')) { ?>
                <div class="navbar-affixed-top" data-spy="affix" data-offset-top="40">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="<?php echo base_url();?>dashboard">
                                <img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="hidden-xs hidden-sm">
                                <img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="visible-xs visible-sm"><span class="sr-only">- go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>dashboard/" class="dropdown-toggle">Home <b></b></a>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>dashboard/event" class="dropdown-toggle">Event <b></b></a>
                                </li>
                                
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="<?php echo base_url();?>dashboard/forum" class="dropdown-toggle">Forum<b ></b></a>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>dashboard/ebook/0" class="dropdown-toggle">E-Book</a>
                                </li>


                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>dashboard/about_us" class="dropdown-toggle">About Us <b ></b></a>
                                </li>

                           

                            </ul>

                        </div>
                        <!--/.nav-collapse -->

                    </div>
                </div>
                    <!-- /#navbar -->
                </div>

            <?php } elseif ($level > 1) { ?>
                <div class="navbar-affixed-top" data-spy="affix" data-offset-top="40">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="<?php echo base_url();?>member">
                             	<img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="hidden-xs hidden-sm">
                                <img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="visible-xs visible-sm"><span class="sr-only">- go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <?php if ($this->session->userdata('verify') == 0) {
                            # code...
                        }else{

                         ?>
                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>member" class="dropdown-toggle">Home </a>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>member/event" class="dropdown-toggle">Event </a>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>member/kelas/<?php echo $id; ?>" class="dropdown-toggle">Class </a>
                                </li>

                                <?php if ($level == 3) { ?>
                                    <li class="">
                                    <a href="<?php echo base_url();?>member/instructur/<?php echo $id; ?>" class="dropdown-toggle">Instructor</a>
                                    </li>
                                <?php } ?>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>member/forum" class="dropdown-toggle">Forum </a>
                                </li> 

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">E-Book<b class="caret"></b></a>
                                    <ul class="dropdown-menu">                             
                                        <li><a href="<?php echo base_url();?>member/ebook/0">List E-book</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>member/pembelian/<?php echo $id; ?>">Pembelian</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>member/DetailUser/<?php echo $id; ?>" class="dropdown-toggle">Profile </a>
                                </li>

                            </ul>

                        </div>
                        <!--/.nav-collapse -->
                        <?php } ?>
                    </div>
                </div>
                     <!-- /#navbar -->
                </div>
                
            <?php } elseif ($level = 1) { ?>

                <div class="navbar-affixed-top" data-spy="affix" data-offset-top="40">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="<?php echo base_url();?>admin">
                                <img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="hidden-xs hidden-sm">
                                <img src="<?php echo base_url();?>assets/img/bluemark.png" style="width: 236px; height: 45px;" alt="logo" class="visible-xs visible-sm"><span class="sr-only">- go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>admin" class="dropdown-toggle">Home</a>
                                </li>

                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>admin/forum" class="dropdown-toggle">Forum </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event<b class="caret"></b></a>
                                    <ul class="dropdown-menu">                             
                                        <li><a href="<?php echo base_url();?>admin/menEvent">List Event</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/addEvent">Add Event</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kelas<b class="caret"></b></a>
                                    <ul class="dropdown-menu">                             
                                        <li><a href="<?php echo base_url();?>admin/menKelas">List Kelas</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/addKelas">Add Kelas</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<b class="caret"></b></a>
                                    <ul class="dropdown-menu">                             
                                        <li>
                                            <a href="<?php echo base_url();?>admin/menUser">List User</a>
                                        </li>
                                         <li>
                                            <a href="<?php echo base_url();?>admin/addUser">Add User</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/message">Message</a>
                                        </li>
                                    </ul>
                                </li>
<!-- 
                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>admin/info" class="dropdown-toggle">Info </a>
                                </li>
 -->

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokumen<b class="caret"></b></a>
                                    <ul class="dropdown-menu"> 
                                        <h5 style="text-transform: uppercase;
    padding-bottom: 10px;
    padding-left: 13px;
    border-bottom: dotted 1px #555555;
    letter-spacing: 0.08em;">Dokumen</h5>                            
                                        <li>
                                            <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo base_url();?>admin/menDokAdd">Add Dokumen</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/transaksi">Transaksi</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/ebook/0">Add Transaksi</a>
                                        </li>
                                        <h5 style="text-transform: uppercase;
    padding-bottom: 10px;
    padding-left: 13px;
    border-bottom: dotted 1px #555555;
    letter-spacing: 0.08em;">References</h5>
                                         <li>
                                            <a href="<?php echo base_url();?>admin/menJenis">Jenis Dokumen</a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo base_url();?>admin/menKategori">Kategori</a>
                                        </li>
                                    </ul>
                                </li>
                             
                              
                                <li class="dropdown">
                                    <a href="<?php echo base_url();?>admin/DetailUsers/<?php echo $id; ?>" class="dropdown-toggle">Profile </a>
                                </li>


                            </ul>

                        </div>
                        <!--/.nav-collapse -->

                    </div>
                </div>
                     <!-- /#navbar -->
                </div>  

            <?php  } ?>    
            

            <!-- *** NAVBAR END *** -->
 </header>
 
<?php $this->load->view($view);?>

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright" style=" width: 100%;  position: fixed; bottom: 0">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2017. PT.BAMASEJAHTERA / BMLearning</p>
                    <!-- <div class="box social" id="product-social">
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse" style="opacity: 1;"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse" style="opacity: 1;"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse" style="opacity: 1;"><i class="fa fa-envelope"></i></a>
                    </p>
                    </div> -->
                    <!-- <p class="pull-right">Template by <a href="https://bootstrapious.com">Bootstrapious</a> & <a href="https://remoteplease.com">Remote Please</a> -->
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->


</div> <!-- id all -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/morris.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/select2.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-hover-dropdown.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/waypoints.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/front.js" type="text/javascript"></script>
    
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function($){
            var username = $("input[name=username]");
            var password = $("input[name=password]");
            var base_url = "<?php echo base_url();?>";

            $("#btn_submit").click(function(e){
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
                      $('#fail-alert').show();
                    }
                  },
                });
              }
            });
        });        
    </script>
    
</body>
</html>
