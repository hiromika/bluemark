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
                <h1>List User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>List User</li>
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
                            <a href="<?php echo base_url();?>admin/menUser">List User</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/addUser">Add User</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/message">Message</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->

      <div class="col-md-9">

                <div class="heading">
                    <h2>List User</h2>
                </div>
           <!--      <a href="<?php echo base_url();?>admin/addUser" title="" class="btn btn-template-main">Add User</a> -->
                      <div class="" style="overflow-x:auto;">
                      <button type="button" onclick="del()" style="margin:10px !important;" class="btn btn-danger">DELETE</button>
                        <table class="table table-hover" id="tbuser">
                          <thead>
                            <tr class="success">
                              <th><input type="checkbox" class="del_all" value=""></th>
                              <th>No</th>
                            <!--   <th>Kode User</th> -->
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Level</th>
                              <th style="display: none;"></th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $no=1;
                          foreach ($dtuser as $key => $value) {
                           ?>
                            <tr>
                              <td><input type="checkbox" name="id_t[]" class="del_t" value="<?php echo $value['id'] ?>"></td>
                              <td><?php echo $no; ?></td>
                           <!--    <td><?php echo $value['kode_user']; ?></td> -->
                              <td><?php echo $value['username']; ?></td>
                              <td><?php echo $value['nama']; ?></td>
                              <td><?php echo $value['role_name']; ?></td>
                              <td style="display: none;"><?php echo $value['level']?></td>
                              <td><?php if ($value['verified'] == 1 ) { ?>
                             	<p>verified</p>
                              <?php }else echo "<p>unverified</p>"; ?></td>
                              <td>
                              <a href="<?php echo base_url();?>admin/DetailUser/<?php echo $value['id']; ?>/0" title="Info Detail" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
                              <a href="<?php echo base_url();?>admin/user_edit/<?php echo $value['id']; ?>" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                              <a title="Delete" href="<?php echo base_url();?>admin/DeleteUser/<?php echo $value['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <a href="<?php echo base_url();?>admin/Inemail/<?php echo $value['id']; ?>" title="Info Detail" class="btn btn-sm btn-warning"><i class="fa fa-envelope"></i></a>
                              </td>
                            </tr>
                          <?php $no++; }?>
                          </tbody>
                        </table>
                      </div>
    </div>
  </div>
  </div>
</section>
  


  <!-- Modal -->
  <div class="modal fade" id="edit" >
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url();?>admin/EditUser" method="POST">

            <input style="display: none;" type="text" name="id" id="_id" value="" placeholder="">

            <div class="form-group has-feedback">
            <input type="text" class="form-control" disabled name="username" value="" id="_username" placeholder="Username">
            </div> 

            <div class="form-group has-feedback">
            <select class="form-control" name="level" id="_level" >
            <?php 
              foreach ($role as $key => $value) { ?>
              <option value="<?php echo $value['id_role'] ?>"><?php echo $value['role_name']; ?></option>
            <?php } ?>
            </select>
            </div> 
            
        </div>
        <div class="modal-footer">
          <input type="submit" value="Submit" class="btn btn-primary btn-block btn-flat">
        </div>
         </form>
      </div>
      
    </div>
  </div>



<script type="text/javascript">

$(function(){
  $('#tbuser').DataTable({
    "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true
  }); 
}); 

$(".btn[data-target='#edit']").on('click',function(){
  $("#_id").val($(this).closest('tr').children()[1].textContent);
  $("#_username").val($(this).closest('tr').children()[2].textContent);
  $("#_level").val($(this).closest('tr').children()[5].textContent);
  console.log($(this).closest('tr').children()[6].textContent); 
});

 function del(){
  if(confirm('Are you sure your want to delete?')){
    var base = "<?php echo base_url(); ?>";
    var id = $(".del_t").val();
      if (id == ""){
        alert("Pilih list Transaksi");
      }else{

        var id_t = $(".del_t:checked").map(function(){
          return $(this).val();
        }).get();

        $.ajax({
          url: base+'admin/delUserBatch',
          type: 'POST',
          dataType: 'json',
          data: {idt: id_t},
          success:function(data){
            if (data){
              window.location = base+'admin/menUser';
            }else{
              alert('delete gagal');
            }
          }
        });
      }
   }
  }

  $('.del_all').change(function(e){
     if ($(this).is(':checked')) {
         $('.del_t').prop('checked', true);
        }else {
         $('.del_t').prop('checked', false);
        };
  });

</script>
<?php } ?>