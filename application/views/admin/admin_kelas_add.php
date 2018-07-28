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
                <h1>Add Kelas</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Add Kelas</li>
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
                        <li><a href="<?php echo base_url();?>admin/menKelas">List Kelas</a>
                        </li>
                        <li class="active"><a href="<?php echo base_url();?>admin/addKelas">Add Kelas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->
        
        <div class="col-md-9">
                <div class="heading">
                    <h4>Add Kelas</h4>
                </div>

                <div>
                  	<form action="<?php echo base_url();?>admin/insertKelas" class="form form-horizontal" method="post" enctype="multipart/form-data">
			                 
					<div class="form-group">
                        <label class="control-label col-xs-3">Event :</label>
						<div class="col-xs-6">
						<select name="event" class="form-control" required="">
							<option disabled selected>~Pilih Event~</option>
							<?php 
								foreach ($event as $key => $value) { ?>
								<option  value="<?php echo $value['id']; ?>"><?php echo $value['id'].' - '.$value['judul_event']; ?></option>
							<?php 	
								}
							?>
						</select>
						</div>
					</div>

					<div class="form-group">
                        <label class="control-label col-xs-3">Kelas :</label>
						<div class="col-xs-6">
						<input class="form-control" type="text" name="kelas"  placeholder="Nama Kelas" required="">
						</div>
					</div>

					<div class="form-group">
                        <label class="control-label col-xs-3">Instruktur/Pengajar :</label>
						<div class="col-xs-6">
						<select name="instruktur" class="form-control" required="">
							<option disabled selected>~Pilih Instruktur~</option>
							<?php 
								foreach ($instruc as $key => $value) { ?>
								<option  value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
							<?php 	
								}
							?>
						</select>
						</div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Sesi :</label>
                        <div class="col-xs-6">
                        <input class="form-control" type="number" name="sesi" placeholder="Jumlah sesi" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Peserta :</label>
                        <div class="col-xs-6">
                        <input class="form-control" type="number" name="kuota" placeholder="Maksimum Peserta" required="">
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label col-xs-3">Tanggal Mulai :</label>
						<div class="col-xs-6">
						<input class="form-control" type="text" name="tgl" value="" id="date1" placeholder="Tanggal Mulai Kelas" required="">
						</div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Jam :</label>
                        <div class="col-xs-3">
                        <input type="text" name="jam_s" class="form-control" id="jam1" placeholder="Start" required=""> 
                        </div>
                        <div class="col-xs-3">
                        <input type="text" name="jam_e" class="form-control" id="jam2" placeholder="End" required=""> 
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-xs-3"></label>
                        <div class="col-xs-6">
                        <button type="submit" class=" form-control btn btn-success">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
         </div>
    </div> <!-- row -->
</div><!-- container -->
</section>   




<script type="text/javascript">

$(function(){
	$('#date1').datetimepicker({
        format: 'D-M-YYYY',
        minDate: new Date(),
    });
    $('#jam1,#jam2').datetimepicker({
        format: 'H-mm',
    }); 
});

// var doAction = (function(){
//     var input = document.getElementById('materi');
//     var times = input.value;
//     $('#dynamic').html('');
//   for (var i = 0; i < times; i++) {
//     $("#dynamic").append("<div class='form-group row'><div class='col-xs-4 col-xs-offset-3'><input class='form-control' type='date' name='tgl' id='tgl' placeholder='Tanggal Sesi'>");
//   	}
// });

</script>
<?php } ?>