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


    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3-wysihtml5.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.css">


    <script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

</head>
<body onload="window.print(); history.back(); ">
<?php   $this->session->userdata('idAuth');$this->session->userdata('level'); ?>

<div id="all">
<style type="text/css">
		#ttd tbody tr td{
		border: none;
		}
		@media print{
			@page{margin: 0;}
			body{margin: 2cm;}
		}
</style>
<header>


<div id="body"  class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-responsive">
					<tbody>
						<tr>
							<td align="center" width="30%"><img style="width: 100%; margin-top: 45px;" src="<?php echo base_url();?>assets/img/bm_logo.png" alt=""></td>
							<td align="center">
							<h3>BMLearning Center</h3>
							<p>
								Jalan Taman malaka selatan<br>
								Blok B12 No 5, Jakarta Timur<br>	
								No telp : 021-85323057<br>
								</p>
							</td>
						</tr>
					</tbody>
			</table>	
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		<table class="table" id="ttd">
		<tr><th class="text-center">LAPORAN DAFTAR ABSENSI</th></tr>
		<tr><th class="text-center">KElAS <?php echo $kelas['kelas']; ?></th></tr>
		</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th rowspan="2" class="text-center" style="width: 5%">No</th>
						<th rowspan="2" class="text-center" style="width: 10%">Kode Peserta</th>
						<th rowspan="2" class="text-center" style="width: 20%">Nama</th>
						<th rowspan="2" class="text-center" style="width: 5%">L/P</th>
						<th colspan="<?php echo $sesi; ?>" class="text-center">Sesi Kelas</th>
						<th colspan="4" class="text-center">Keterangan</th>
						<th rowspan="2" class="text-center">Persentasi Kehadiran</th>
					</tr>
					<tr>
						<?php $no = 1; while ( $no <= $sesi) { ?>

						<th><?php echo $no; ?></th>
							
						<?php $no++; } ?>
						<th class="text-center">Hadir</th>
						<th class="text-center">Sakit</th>
						<th class="text-center">Izin</th>
						<th class="text-center">Alpha</th>
					</tr>
				</thead>
				<tbody>
				<?php $nom = 1; foreach ($user as $key => $value) { ?>
					<tr>
						<td class="text-center"><?php echo $nom; ?></td>
						<td><?php echo $value['kode_user']; ?></td>
						<td><?php echo $value['nama']; ?></td>
						<td  class="text-center"><?php if ($value['jenis_kelamin'] == 1) {
                       echo "L";
                      }elseif($value['jenis_kelamin'] == 2){
                        echo "P";
                      }else{ echo "";
                        }?></td>

						<?php
						$h = 0;
						$s = 0;
						$i = 0;
						$a = 0;
						$total = 0;
							foreach ($stat[$key]['stats'] as $keys => $values) { ?>


								<td class="text-center"> <?php if ($values['status'] == 1) {
									$h++;
									echo "H";
								}elseif ($values['status'] == 2) {
									$s++;
									echo "S";
								}elseif ($values['status'] == 3) {
									$i++;
									echo "I";
								}else{
									$a++;
									echo "A";
								}?></td>

													
						<?php 
							}
						 ?>
						 <td class="text-center"><?php echo $h; ?></td>
						 <td class="text-center"><?php echo $s; ?></td>
						 <td class="text-center"><?php echo $i; ?></td>
						 <td class="text-center"><?php echo $a; ?></td>
						 <td class="text-center"><?php 
						 $total = ($h/$sesi)*100;
						 echo number_format($total,0,',','.');
						  ?>%</td>
					</tr>
				<?php $nom++; } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<small class="pull-right"><center>Jakarta <?php echo date('d-M-Y') ?></center></small>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="ttd" class="table table-responsive">
			<tbody class="pull-right">
			<tr>

			<td><center>Instruktur</center></td>
			</tr>
			<tr>

			<td><center><br><br><br><u><?php echo $kelas['nama']; ?></u></center></td>
			</tr>
			</tbody>
			</table>
		</div>				
	</div>				
</div>

</body>

</div> <!-- id all -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript"></script>

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


</body>
</html>
