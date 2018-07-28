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
                <h1>Dashboard Admin</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Dashboard</a>
                    </li>
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
                <div class="col-md-7">
                <div class="heading" style="margin-bottom: 10px;">
                    <h5>Jadwal Kelas</h5>
                </div>
                   <h6 class="pull-left"><i class="fa fa-clock-o"></i> Jadwal Hari Ini </h6>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr style="display: none;">
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!$jad_today) { ?>
                            <td colspan="2" class="text-center"><h6>Tidak Ada Kelas</h6></td>
                        <?php }else{ ?>
                        <?php foreach ($jad_today as $key => $value) { ?>
                            <tr>
                                <td style="width: 30%;" class="text-center"><?php echo date('l-d-m-Y',strtotime($value['tgl_kelas']));  ?></td>
                                <td><?php echo date('H:i',strtotime($value['jam_mulai'])); echo " s/d ".date('H:i',strtotime($value['jam_akhir'])); ?> : <?php echo $value['kelas']; ?></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                    <h6 class="pull-left"><i class="fa fa-clock-o"></i> Jadwal Yang Akan Datang </h6>
                     <table class="table table-striped table-bordered">
                        <thead>
                            <tr style="display: none;">
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!$jad_soon) { ?>
                            <td colspan="2" class="text-center"><h6>Tidak Ada Kelas</h6></td>
                        <?php }else{ ?>
                        <?php foreach ($jad_soon as $key => $value) { ?>
                            <tr>
                                <td style="width: 30%;" class="text-center"><?php echo date('l-d-m-Y',strtotime($value['tgl_kelas']));  ?></td>
                                <td><?php echo date('H:i',strtotime($value['jam_mulai'])); echo " s/d ".date('H:i',strtotime($value['jam_akhir'])); ?> : <?php echo $value['kelas']; ?></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5" >
                <div class="heading" style="margin-bottom: 10px;">
                    <h5>Event</h5>
                </div>
                 <div class="homepage owl-carousel">
                         <?php foreach ($event as $key => $value) { ?>    
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo base_url();?>admin/viewEvent/<?php echo $value['id']; ?>" title=""><img style="width:100%; height: 250px;" src="<?php echo base_url().$value['gambar'];?>" alt="" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>   
                    </div>
                </div>
    </div> <!-- row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <h6 class="pull-left"><i class="fa fa-clock-o"></i> Last Forum Post </h6>
      
        <table class="table table-hover" id="tbl">
          <thead>
            <tr>
              <th style="display: none;">no</th>
              <th>Thread</th>
              <th>Stat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($forum as $key => $value) { ?>
            <tr>
              <td style="display: none;"><?php echo $value['idf']; ?></td>
              <td class="">
              <blockquote style="margin-bottom: 0px;">
              <a href="<?php echo base_url();?>admin/viewForum/<?php echo $value['idf'];?>" title="read more"><h5><?php echo $value['judul_forum'];?> </h5></a>
                <p> <i> By</i> : <u><?php echo $value['nama'].'</u> | '. date('M d, Y H:i a',strtotime($value['tgl_forum'])); ?></p>
              </blockquote>
              </td>
              <td>Replies : <?php echo $replies[$key]['jmlrep']; ?> <br>
                  Views   : <?php echo $viewer[$key]['vForum']; ?>
              </td>
              <td><a href="<?php echo base_url();?>admin/DelForum/<?php echo $value['idf']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger" title="Delete">Delete</a></td>
            </tr>
         <?php  } ?>

          </tbody>
        </table>
        </div>

    </div>
</div><!-- container -->
</section>

  


<?php } ?>