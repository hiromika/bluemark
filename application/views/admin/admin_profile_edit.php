
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
                    <li><a href="<?php echo base_url();?>admin">Home</a></li>
                    <li>Edit User</li>
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
        <h5>Edit User</h5>
  
      </div>

      <div class="col-md-2 text-center" style="padding-bottom: 15px;">
        <p style="color: grey;">Foto Profile</p>
          <form action="<?php echo base_url();?>admin/upFotoPro" method="POST" id="fot" accept-charset="utf-8" enctype="multipart/form-data">
        <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-responsive" alt="profile foto" width="100%" height="150">
          <a href="#" class="profil-foto">Edit</a>
          <input type="text" name="id" value="<?php echo $this->session->userdata('idAuth');?>" hidden placeholder="">
          <input type="file" name="foto" id="foto" class="input-foto" onchange="javascript:this.form.submit()" style="display: none;">
        </form>
         <ul class="nav nav-pills nav-stacked">
             <li class="">
             <a href="<?php echo base_url();?>admin/listforum/<?php echo $this->session->userdata('idAuth');?>"">My Thread</a>
              </li>
              <li>
              <a href="<?php echo base_url();?>admin/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
              </li>
         </ul>
      </div>

        <div class="col-md-10">

          <form action="<?php echo base_url()?>admin/EditUserPro" method="POST" class="form-horizontal" accept-charset="utf-8">
            <input type="text" name="id" value="<?php echo $this->session->userdata('idAuth');?>" hidden placeholder="">
              <div class="form-group">
                <label for="Nama" class="col-md-3">Nama  <span class="required">*</span></label>
                <div class="col-md-9">
                <input class="form-control" required="" type="text" value="<?php echo $user['nama'] ?>" name="nama">                  
                </div>
              </div>
              <div class="form-group">
                <label for="Kelamin" class="col-md-3">Jenis Kelamin </label>
                <div class="col-md-9">
                <select name="kelamin" class="form-control" >
                  <option selected="" value="0"  >~ Pilih Jenis Kelamin ~</option>
                  <option <?php echo ($user['jenis_kelamin']==1) ? "selected" :''; ?> value="1">Laki - Laki</option>  
                  <option <?php echo ($user['jenis_kelamin']==2) ? "selected" :''; ?> value="2">Perempuan</option>  
                </select>                  
                </div>
              </div>
              <div class="form-group">
                <label for="Tmpt Lahir" class="col-md-3">Tempat Lahir  <span class="required">*</span></label>
                <div class="col-md-9">
                <input class="form-control" type="text" value="<?php echo $user['tempat_lahir'] ?>" name="tmplahir" required="">                  
                </div>
              </div>
              <div class="form-group">
                <label for="Tmpt Lahir" class="col-md-3">Tanggal Lahir  <span class="required">*</span></label>
                <div class="col-md-9">
                <input class="form-control" id="tgl" type="text" value="<?php echo date('d-m-Y',strtotime($user['tgl_lahir'])); ?>" name="tgl_lahir" required="">                  
                </div>
              </div>
              <div class="form-group">
                <label for="Alamat" class="col-md-3">Alamat </label>
                <div class="col-md-9">
                <textarea name="alamat" class="form-control"><?php echo $user['alamat'] ?></textarea>                  
                </div>
              </div>
              <div class="form-group">
                <label for="Agama" class="col-md-3">Agama </label>
                <div class="col-md-9">
                <select name="agama" class="form-control">
                  <option selected="" value="0" >~ Pilih Agama ~</option>
                    <option <?php echo ($user['agama'] == 1) ? "selected" :''; ?> value="1">Islam</option>
                    <option <?php echo ($user['agama'] == 2) ? "selected" :''; ?> value="2">Kristen</option>
                    <option <?php echo ($user['agama'] == 3) ? "selected" :''; ?> value="3">Hindu</option>
                    <option <?php echo ($user['agama'] == 4) ? "selected" :''; ?> value="4">Budha</option>
                </select>                  
                </div>
              </div>
              <div class="form-group">
                <label for="Tlp" class="col-md-3">No Tlp <span class="required">*</span></label>
                <div class="col-md-9">
                <input class="form-control" type="number" value="<?php echo $user['tlp'] ?>" name="tlp" required="">                  
                </div>
              </div>
              <div class="form-group">
                <label for="Email" class="col-md-3">Email Aktif  <span class="required">*</span></label>
                <div class="col-md-9">
                <input class="form-control" type="email" value="<?php echo $user['email'] ?>" name="email" required="">                  
                </div>
              </div>
              <div class="form-group">
                <label for="sekolah" class="col-md-3">Kampus/Sekolah </label>
                <div class="col-md-9">
                <input class="form-control" type="text" value="<?php echo $user['sekolah'] ?>" name="kampus">
                </div>
              </div>
              <div class="form-group">
                <label for="Status" class="col-md-3">Status </label>
                <div class="col-md-9">
                <input class="form-control" type="text" value="<?php echo $user['status'] ?>" name="status">
                </div>
              </div>

              <a href="<?php echo base_url();?>admin/DetailUsers/<?php echo $this->session->userdata('idAuth')?>" title="Back" class="btn btn-warning btn-sm btn-flat pull-right" style="margin: 3px;">Back</a>
              <a href="<?php echo base_url();?>admin/DetailUsers/<?php echo $this->session->userdata('idAuth')?>" title="batal" class="btn btn-success btn-sm btn-flat pull-right" style="margin: 3px;">Batal</a>
              <button type="submit" class="btn btn-info btn-sm btn-flat pull-right" style="margin: 3px;">Submit</button>
          </form>
          </div>
      </div> <!-- col -->
        
</div><!-- row -->
</div>
</section>



<script type="text/javascript">
$(function(){
  $('#tgl').datetimepicker({
      format: 'D-M-YYYY',
    });
});
$(function(){
    $(".profil-foto").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".input-foto").trigger('click');
    });
});
</script>

<?php } ?>