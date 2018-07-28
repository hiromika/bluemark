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

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>View Dokumen</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>View Dokumen</li>
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
                          <li class="">
                              <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                          </li> 
                          <li>
                              <a href="<?php echo base_url();?>admin/menDokAdd">Add Dokumen</a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- *** MENUS AND FILTERS END *** -->
      </div><!-- col -->
   
      <div class="col-md-9">
        <div class="heading">
            <h5>View Dokumen</h5> 
            <a href="<?php echo base_url();?>admin/menDok" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a> 
        </div>

      <article>
        <h2><?php echo $dok['judul_dok'];?></h2>
        <i>Kode Dokumen :</i>
        <p><?php echo $dok['no_dok'];?></p>
        <i>Abstrak :</i>
        <p><?php echo $dok['abstrak'];?></p>
        <i>Penulis :</i>
        <p><?php echo $dok['penulis'];?></p>
        <i>Kata Kunci :</i>
        <p><?php echo $dok['keyword'];?></p>
        <div class="row" style="margin-bottom: 10px !important;">
          <div class="col-md-4">
            <div style="width: 160px; height: 220px;">
              <img src="<?php echo base_url().$dok['image1']; ?>" alt=""   class="img img-responsive">
            </div>
          </div>
          <div class="col-md-4">
            <div style="width: 160px; height: 220px;">
              <img src="<?php echo base_url().$dok['image2']; ?>" alt="" class="img img-responsive">
            </div>
          </div>
          <div class="col-md-4">
            <div style="width: 160px; height: 220px;">
              <img src="<?php echo base_url().$dok['image3']; ?>" alt="" class="img img-responsive">
            </div>
          </div>
        </div>
        <p align="center"><a class="btn" href="<?php echo base_url(); echo $dok['upload_file']; ?>" target="_blank"><i class="fa fa-download"></i> Download</a></p>

          

      </article>

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
        $('#list').DataTable();
    });
  </script>



<?php } ?>