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
<?php }elseif ($level = 1) { ?>

<style type="text/css" media="screen">
	.foto{
		padding-top: 70px;
		padding-left: 65px;
		font-size: 50px;
		border: 2px;
		border-style: dashed;
		margin-left: 15px;
		margin-right: 5px;
		margin-bottom: 10px;
		height: 200px;
		width: 180px;
	}
	._f{
		height: 200px !important;
		width: 180px !important;
		margin-left: 15px;
		margin-right: 5px;
		margin-bottom: 10px;
	}
</style>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Add Dokumen</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Add Dokumen</li>
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
                            <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                        </li> 
                        <li class="active">
                            <a href="<?php echo base_url();?>admin/menDokAdd">Add Dokumen</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/transaksi">Transaksi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
    </div><!-- col -->
 
    <div class="col-md-9">
        <div class="heading">
            <h5>Add Dokumen</h5>  
        </div>
        <form action="<?php echo base_url();?>admin/addDok" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <input hidden="" type="text" name="id" value="" placeholder="">
            <div class="form-group">
            <label for="">No Dokumen :</label>
                <input class="form-control" type="text" name="no" value="" placeholder="No Dokumen" required="">
            </div>

            <div class="form-group">
            <label for="">Judul Dokumen :</label>
                <input class="form-control" type="text" name="judul" value="" placeholder="judul Dokumen" required="">
            </div>

            <div class="form-group">
            <label for="">Tahun Dokumen :</label>
                <input class="form-control" id="thn"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number"
                maxlength = "4"  name="tahun" value="" placeholder="Tahun Dokumen" required="">
            </div>

            <div class="form-group">
            <label for="">Abstrak</label>
                <textarea class="form-control" name="abstrak" placeholder="Abstrak" required=""></textarea>
            </div>

            <div class="form-group">
            <label for="">Kata Kunci/keyword</label>
                <textarea class="form-control" name="keyword" placeholder="Kata Kunci/keyword" required=""></textarea>
            </div>

            <div class="form-group">
            <label for="">Penulis :</label>
                <input class="form-control" type="text" name="penulis" value="" placeholder="Penulis" required="">
            </div>

            <div class="form-group">
            <label for="">Jenis Dokumen :</label>
                <select class="form-control" name="dokumen" required="">
                    <option value="" disabled="" selected="">Pilih Jenis Dokumen</option>
                    <?php foreach ($jen as $key => $value) { ?>
                        <option value="<?php echo $value['id'];?>">
                        <?php echo $value['nama_jenis']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
            <label for="">Kategori :</label>
                <select class="form-control" name="kategori" required="">
                    <option value="" disabled="" selected="">Pilih Kategori</option>
                    <?php foreach ($kat as $key => $value) { ?>
                        <option value="<?php echo $value['id'];?>">
                        <?php echo $value['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
            <label for="">Harga Satuan:</label>
                <input class="form-control" type="number" name="harga" value="" placeholder="Harga" required="">
            </div>

            <div class="form-group">
            <label for="">Upload File Pdf/Docx/Doc:</label>
                <input class="form-control" type="file" name="upload" required="">
            </div>

            <div class="form-group">
            	<caption>Pilih Gambar :</caption>
	            	<div class="row">
		            	<div class="col-md-3 ">
		            		<a href="" class="f_1" title=""><div class="foto"><span class="glyphicon glyphicon-plus "></span></div></a>
		            		<input type="file" accept="image/*" class="foto_1" name="upload1" onchange="image1(this);" placeholder="" style="display: none;">
		            		<img src="" class="_f" id="1_f" alt="Image 1" style="display: none;">
		            	</div>
		            	<div class="col-md-3 ">	
		            		<a href="" class="f_2" title=""><div class="foto"><span class="glyphicon glyphicon-plus "></span></div></a>
		            		<input type="file" accept="image/*" class="foto_2" name="upload2" onchange="image2(this);" placeholder="" style="display: none;">
		            		<img src="" class="_f" id="2_f" alt="Image 2" style="display: none;">
		            	</div>
		            	<div class="col-md-3 ">
		            		<a href="" class="f_3" title=""><div class="foto"><span class="glyphicon glyphicon-plus "></span></div></a>
		            		<input type="file" accept="image/*" class="foto_3" name="upload3" onchange="image3(this);" placeholder="" style="display: none;">
		            		<img src="" class="_f" id="3_f" alt="Image 3" style="display: none;">
		            	</div>
	            	</div>

            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-template-main pull-right btn-flat">Submit</button>
            </div>
        </form>     
    </div>
    </div>
</div>
</section>             
  




  <script type="text/javascript">
    $(function(){
        $('#thn').datetimepicker({
                format: 'YYYY',
          });
    });

    $(function(){
    $(".f_1").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".foto_1").trigger('click');
    });
	});

    $(function(){
    $(".f_2").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".foto_2").trigger('click');
    });
	});

    $(function(){
    $(".f_3").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".foto_3").trigger('click');
    });
	});

    function image1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	$('.f_1')
            		.remove();
                $('#1_f')
 					.show()
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function image2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	$('.f_2')
            		.remove();
                $('#2_f')
 					.show()
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function image3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	$('.f_3')
            		.remove();
                $('#3_f')
 					.show()
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }



  </script>



<?php } ?>