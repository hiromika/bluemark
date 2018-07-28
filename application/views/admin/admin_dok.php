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
                    <li>List Dokumen</li>
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
                        <li class="active">
                            <a href="<?php echo base_url();?>admin/menDok">List Dokumen</a>
                        </li> 
                        <li>
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
        <h5>List Dokumen</h5>  
    </div>
      <div style="overflow-y: auto;" >
      <table class="table table-responsive table-hover" id="list">
           <thead>
               <tr>
                   <th>No</th>
                   <th>NO Jurnal</th>
                   <th>Judul Jurnal</th>
                   <th>Tahun</th>
                   <th>Penulis</th>
                   <th>Keyword</th>
                   <th>Jenis Dokumen</th>
                   <th>Kategori</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
            <?php 
            $no=1;
                foreach ($dok as $key => $value) {
             ?>
               <tr>
                   <td><?php echo $no; ?></td>
                   <td><?php echo $value['no_dok']; ?></td>
                   <td><?php echo $value['judul_dok']; ?></td>
                   <td><?php echo $value['tahun']; ?></td>
                   <td><?php echo $value['penulis']; ?></td>
                   <td><?php echo $value['keyword']; ?></td>
                   <td><?php echo $value['nama_jenis']; ?></td>
                   <td><?php echo $value['nama_kategori']; ?></td>
                   <td>
                    <div class="dropdown">
                      <button class="btn btn-info btn sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" style="min-width: 0px !important; padding: 0 !important; margin: 1 !important;">
                        <li><a href="/admin/dokView/<?php echo $value['iddok']; ?>" title="Delete" class="btn btn-sm "  style=" background-color: #33cc33; color: #fff;" >View</a></li>
                        <li><a href="/admin/dokEdit/<?php echo $value['iddok']; ?>" title="Delete" class="btn btn-sm"  style=" background-color: #00bfff; color: #fff;" >Edit</a></li>
                        <li><a href="/admin/DelDok/<?php echo $value['iddok']; ?>" title="Delete" class="btn btn-sm"  style=" background-color: #e60000; color: #fff;" >Delete</a></li>
                      </ul>
                    </div>
                    </td>
               </tr>
            <?php $no++; } ?>
           </tbody>
       </table>
       </div> 
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