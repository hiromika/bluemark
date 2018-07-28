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
                <h1>Kategori</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Kategori</li>
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
                            <a href="<?php echo base_url();?>admin/menJenis">Jenis Dokumen</a>
                        </li> 
                        <li class="active">
                            <a href="<?php echo base_url();?>admin/menKategori">Kategori</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
    </div><!-- col -->
 
    <div class="col-md-9">
        <div class="heading">
        <button class="btn btn-info btn-sm" type="button" data-toggle="modal"  data-target="#add">Add Kategori</button>
        </div>
        <table class="table table-hover" id="kat">
            <thead>
                <tr>
                    <th style="display: none;">id</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($kat as $key => $value) { ?>
                <tr>
                    <td style="display: none;"><?php echo $value['id']; ?></td>
                    <td><?php echo $value['nama_kategori']; ?></td>
                    <td><?php echo $value['keterangan']; ?></td>
                    <td>
                    <button type="button" data-toggle="modal" data-target="#edit" class="btn btn-xs btn-success">Edit</button>
                    <a href="/admin/delKat/<?php echo $value['id']; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</section>             
  


  <!-- Modal -->
  <div class="modal fade" id="add" >
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
        <form action="/admin/addKat" method="post" accept-charset="utf-8">
            <div class="form-group">
            <input type="text" class="form-control" name="kategori" value="" placeholder="Nama Kategori" required="">
            </div>
            <div class="form-group">
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Kategori" required=""></textarea>
            </div>
             <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal -->
  <div class="modal fade" id="edit" >
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kategori</h4>
        </div>
        <div class="modal-body">
        <form action="/admin/addKat" method="post" accept-charset="utf-8">
            <input type="text" name="id" id="_id" placeholder="" hidden="">
             <div class="form-group">
            <input type="text" class="form-control" name="kategori" id="_kat" value="" placeholder="Nama Kategori" required="">
            </div>
            <div class="form-group">
            <textarea class="form-control" name="keterangan" id="_ket" placeholder="Keterangan Kategori" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
 $(function(){
    $('#kat').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
    }); 
}); 

 $(".btn[data-target='#edit']").on('click',function(){
  $("#_id").val($(this).closest('tr').children()[0].textContent);
  $("#_kat").val($(this).closest('tr').children()[1].textContent);
  $("#_ket").val($(this).closest('tr').children()[2].textContent);
  console.log($(this).closest('tr').children()[3].textContent); 
});
</script>

<?php } ?>