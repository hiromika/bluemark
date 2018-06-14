<!DOCTYPE html>
<html>
<head>
	   	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Finance Management System</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/logo.ico" />

        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/fonts/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/fonts/ionicons/css/ionicons.min.css" />

        <link rel="stylesheet" href="<?php echo theme_path(); ?>/js/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/js/daterangepicker/daterangepicker.css">

        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/_all-skins.min.css">
        
        <!-- EasyUI Style -->
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/metro/easyui.css" />
        <link rel="stylesheet" href="<?php echo theme_path(); ?>/css/style.css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- EasyUI -->
        <script src="<?php echo theme_path(); ?>/js/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/jQuery/jQuery-ui.js"></script>
        <script src="<?php echo theme_path(); ?>/js/easyui/jquery.easyui.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/easyui/datagrid-filter.js"></script>
        
        
        <!--inline styles related to this page-->
        <style type="text/css">
		#ttd tbody tr td{
		border: none;
		}
		@media print{
			@page{margin: 0;}
			body{margin: 0cm;}
		}
		</style>
</head>
<body onload="window.print();">

<div class="container">
    <div class="invoice">
                    <div class="row invoice-info">
                        <div class="col-md-12">     
                            <table class="table table-renponsive">
                                <thead>
                                    <tr>
                                        <th> <h3 align="center">Rekap <?php echo ''.date('d-M-Y',strtotime($tgl['start'])).' s/d '.date('d-M-Y',strtotime($tgl['end'])).'';  ?></h3></th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-responsive">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Akun</th>
                                        <th>Kategori</th>
                                        <th class="success">Debet</th>
                                        <th class="danger">Kredit</th>
                                        <th>Komponen</th>
                                        <th>Cleint</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                $debet=0;
                                $kredit=0;
                                foreach ($data as $key => $value) {
                                 ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($value['tanggal'])); ?></td>
                                        <td><?php echo $value['nama_akun']; ?></td>
                                        <td><?php echo $value['nama_kategori']; ?></td>
                                        <td class="success">Rp.<?php echo number_format($value['debet'],0,',','.'); ?></td>
                                        <td class="danger">Rp.<?php echo number_format($value['kredit'],0,',','.'); ?></td>
                                        <td><?php echo $value['nama_komponen']; ?></td>
                                        <td><?php echo $value['nama_client']; ?></td>
                                        <td><?php echo $value['note']; ?></td>
                                    </tr>
                                    <?php 
                                    $kredit += $value['kredit'];
                                    $debet += $value['debet'];
                                    $no++;
                                        } 
                                    ?>
                                    <tr>
                                        <th colspan="4"> <center>Jumlah Saldo :</center>  </th>
                                        <th>Rp.<?php echo number_format($debet,0,',','.'); ?></th>
                                        <th>Rp.<?php echo number_format($kredit,0,',','.'); ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>
    
</div>

<!-- JavaScript -->
        
        <script src="<?php echo theme_path(); ?>/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/datatables/dataTables.bootstrap.min.js"></script>
        
        <script src="<?php echo theme_path(); ?>/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/daterangepicker/moment.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo theme_path(); ?>/js/bootstrap-datetimepicker.min.js"></script>

        <script src="<?php echo theme_path(); ?>/js/app.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo theme_path(); ?>/js/chartjs/Chart.min.js"></script>
        

</body>
</html>

