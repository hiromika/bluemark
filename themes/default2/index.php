<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Cooperative System</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!--[if !IE]>-->

        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
        <script>var theme_path = '<?php echo theme_path(); ?>'; window.jQuery || document.write('<script src="'+theme_path+'/js/jquery-2.0.3.min.js"><\/script>')</script>
        

        <!--<![endif]-->

        <!--[if IE]>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="'+theme_path+'/js/jquery-1.10.2.min.js"><\/script>')</script>
        <![endif]-->
        
        <!--basic styles-->
        
        <link href="<?php echo theme_path(); ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo theme_path(); ?>/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->

        <!-- styles-->

        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/metro/easyui.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/icon.css" rel="stylesheet"/>
        
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/ace-ie.min.css" />
        <![endif]-->

        <script src="<?php echo theme_path(); ?>/js/jquery.easyui.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/datagrid-filter.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/date-time/bootstrap-datepicker.min.js"></script>
        
        <!--ace scripts-->

        <script src="<?php echo theme_path(); ?>/js/ace-elements.min.js"></script>
                
        <!--inline styles related to this page-->
        <?php echo $headtag; ?>
        
        <style>
            .nav-list > li > a > [class*="icon-"]:first-child {
                display: inline-block;
                float: left;
                font-size: 18px;
                font-weight: normal;
                min-width: 30px;
                text-align: center;
                vertical-align: middle;
            }
            
            .menu-text {
                float: none;
                height: 20px;
                line-height: 20px;
                padding-left: 0;
            }
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="#" class="brand">
                        <div style="font-weight:200px; font-size: 20px">
                            <i class="icon-xing"></i>
                        </div>
                    </a><!--/.brand-->

                    <ul class="nav ace-nav pull-right">
                        
                        <?php echo modules::run('notifikasi'); ?>

                        <?php echo modules::run('broadcast/navbarList'); ?>
                       

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo theme_path(); ?>/img/user.jpg" alt="" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php $auth = $this->session->userdata('auth'); echo $auth['name']; ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                                <li>
                                    <a href="/configuration">
                                        <i class="icon-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="/logout">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!--/.ace-nav-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-small btn-success">
                            <i class="icon-signal"></i>
                        </button>

                        <button class="btn btn-small btn-info">
                            <i class="icon-pencil"></i>
                        </button>

                        <button class="btn btn-small btn-warning">
                            <i class="icon-group"></i>
                        </button>

                        <button class="btn btn-small btn-danger">
                            <i class="icon-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!--#sidebar-shortcuts-->

                <ul class="nav nav-list">
                    <?php echo renderNavigation(); ?>
                </ul><!--/.nav-list-->
                <!--
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left"></i>
                </div>
                -->
            </div>

            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="#">Home</a>
                            <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                        </li>
                        <li class="active"><?php echo $breadcrumb; ?></li>
                    </ul>

                </div>

                <div class="page-content">
                    <?php if($header !== ''){ ?>
                    <div class="page-header position-relative">
                        <h1><?php echo $header; ?></h1>
                    </div><!--/.page-header-->
                    <?php } ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <!--PAGE CONTENT BEGINS-->
                            <?php echo $content; ?>
                            <!--PAGE CONTENT ENDS-->
                        </div><!--/.span-->
                    </div><!--/.row-fluid-->
                </div><!--/.page-content-->
            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <!--basic scripts-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo theme_path(); ?>/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo theme_path(); ?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo theme_path(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/date-time/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/date-time/bootstrap-timepicker.min.js"></script>        
        <!--page specific plugin scripts-->

        <!--[if lte IE 8]>
          <script src="<?php echo theme_path(); ?>/js/excanvas.min.js"></script>
        <![endif]-->

        <script src="<?php echo theme_path(); ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jquery.slimscroll.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jquery.easy-pie-chart.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jquery.sparkline.min.js"></script>
        

        <!--ace scripts-->

        <script src="<?php echo theme_path(); ?>/js/ace-elements.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/ace.min.js"></script>

        <!--inline scripts related to this page-->

        <script type="text/javascript">
            
        </script>
    </body>
</html>
