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
                <h1>List Dokumen</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Transaksi</li>
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
                        <li >
                            <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url();?>admin/menDokAdd">Add Dokumen</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url();?>admin/transaksi">Transaksi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
    </div><!-- col -->
 
    <div class="col-md-9">
    <div class="heading">
        <h5>List Transaksi</h5> 
        <a href="<?php echo base_url();?>/admin/transaksi" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a> 
    </div>
      <div style="overflow-y: auto;" >
      <table style="overflow-x: auto" class="table table-responsive table-hover">
        <tr>
          <th>Id Transaksi :</th>
          <td><?php echo $list['id_transaksi'] ?></td>
        </tr>
        <tr>
          <th>Nama Pembeli</th>
          <td><?php echo $list['nama']; ?></td>
        </tr>
        <tr>
          <th>Nama Produk :</th>
          <td><?php echo $list['judul']; ?></td>
        </tr>
        <tr>
          <th>Total Harga :</th>
          <td>Rp.<?php echo number_format($list['hargas'],0,',','.'); ?></td>
        </tr>
        <tr>
          <th>Tgl Pembelian</th>
          <td><?php echo date("d-m-Y H:i:s",strtotime($list['tgl_transaksi'])); ?></td>
        </tr>
        <tr>
          <th>Status Konfirmasi</th>
          <td><?php echo ($list['status_kon']==1)?'<p class="text-center" style="background-color: green; color: #fff;">Terkonfirmasi</p>':'<p class="text-center" style="background-color: red; color: #fff;">Belum Terkonfirmasi</p>'; ?></td>
        </tr>
        <tr>
          <th>Status Verifikasi</th>
          <td>
            <?php echo ($list['statuss']==1)?'<p class="text-center" style="background-color: green; color: #fff;">Terverifirmasi</p>':'<p class="text-center" style="background-color: red; color: #fff;">Belum Terverifirmasi</p>'; ?>
          </td>
        </tr>
        <tr>
          <th>Keterangan</th>
          <td><?php echo $list['keterangan']; ?></td>
        </tr>
        <tr>
          <th>Bukti Pembayaran</th>
          <td>
            <img src="<?php echo base_url().$list['bukti'];?>" alt="" style="width: 300px; height: 350px;" class="img img-responsive">
          </td>
        </tr>
       </table>
       </div> 
    </div>
    </div>
</div>
</section>             



  <script type="text/javascript">

  </script>



<?php } ?>