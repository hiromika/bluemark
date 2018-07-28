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
                    <li>Detail User</li>
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
        <h5>Personal Info</h5>
        <a href="<?php echo base_url();?>admin" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
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
              <li class=""><a href="<?php echo base_url();?>admin/listforum/<?php echo $this->session->userdata('idAuth');?>">My Thread</a>
              </li>
              <li><a href="<?php echo base_url();?>admin/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
              </li>
         </ul>
      </div>

        <div class="col-md-10">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td class="bio">Nama :</td>
                <td><?php echo $user['nama']; ?></td>
              </tr>
              <tr>
                <td class="bio">Jenis Kelamin :</td>
                <td>  <?php if ($user['jenis_kelamin'] == 1) {
                       echo "Laki-Laki";
                      }elseif($user['jenis_kelamin'] == 2){
                        echo "Perempuan";
                      }else{ echo "";
                        }?>
                </td>
              </tr>
              <tr>
                <td class="bio">Tempat Lahir :</td>
                <td><?php echo $user['tempat_lahir']; ?></td>
              </tr>
              <tr>
                <td class="bio">Tanggal Lahir :</td>
                <td><?php echo date('d-M-Y',strtotime($user['tgl_lahir'])); ?></td>
              </tr>
              <tr>
                <td class="bio">Alamat :</td>
                <td><?php echo $user['alamat']; ?></td>
              </tr>
              <tr>
                <td class="bio">Agama :</td>
                <td> <?php echo ($user['agama'] == 1) ? "Islam" :''; ?>
                     <?php echo ($user['agama'] == 2) ? "Kristen" :''; ?>
                     <?php echo ($user['agama'] == 3) ? "Hindu" :''; ?>
                     <?php echo ($user['agama'] == 4) ? "Budha" :''; ?>
                     <?php echo ($user['agama'] == 0) ? "" :''; ?></td>
              </tr>
              <tr>
                <td class="bio">No. Telp :</td>
                <td><?php echo $user['tlp']; ?></td>
              </tr>
              <tr>
                <td class="bio">E-mail Aktif :</td>
                <td><?php echo $user['email']; ?></td>
              </tr>
              <tr>
                <td class="bio">Kampus/Sekolah :</td>
                <td><?php echo $user['sekolah']; ?></td>
              </tr>
              <tr>
                <td class="bio">Status :</td>
                <td><?php echo $user['status']; ?></td>
              </tr>
            </tbody>
          </table> 



              <a href="<?php echo base_url();?>admin" title="Back" class="btn btn-warning btn-sm btn-flat pull-right" style="margin: 3px;">Back</a>
              <a href="<?php echo base_url();?>admin/EditUsers/<?php echo $this->session->userdata('idAuth')?>" title="Edit" class="btn btn-success btn-sm btn-flat pull-right" style="margin: 3px;">Edit</a>
              <a href="<?php echo base_url();?>admin/EditUsers/<?php echo $this->session->userdata('idAuth')?>" title="Edit" class="btn btn-info btn-sm btn-flat pull-right" style="margin: 3px;">Tambah Data</a>
   <!--        </form> -->
          </div>
      </div> <!-- col -->
        
</div><!-- row -->
</div>
</section>



<script type="text/javascript">

$(function(){
    $(".profil-foto").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".input-foto").trigger('click');
    });
});

</script>
<?php } ?>