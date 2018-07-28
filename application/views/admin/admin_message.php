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
                <h1>Message User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Message User</li>
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
                            <a href="<?php echo base_url();?>admin/menUser">List User</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/addUser">Add User</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url();?>admin/message">Message &nbsp <?php 
                            if ($notif['notif'] > 0) {
                                echo $notif['notif'];
                            }
                            ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- *** MENUS AND FILTERS END *** -->
        </div><!-- col -->

      <div class="col-md-9">

            <div class="heading">
                <h2>Message</h2>
            </div>
            <div class="row" style="margin-bottom: 10px;">
            <button type="button"  class="btn btn-sm btn-template-main pull-right" onclick="new_msg();" >New Message</button>
            </div>
            <div class="row">
                <div class="tabs">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#tab2-1" data-toggle="tab" aria-expanded="true">Inbox</a>
                        </li>
                        <li class=""><a href="#tab2-2" data-toggle="tab" aria-expanded="false">Sent Message</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-inverse">
                        <div class="tab-pane active" id="tab2-1">
                               <table class="table" id="in">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($in as $key => $value) { 
                                       ?>

                                    <tr>
                                        <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['idm']; ?>" class="btn btn-xs btn-template-primary" title=""><span class="fa fa-eye"></span></a></td>
                                        <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['idm']; ?>"><b><?php
                                        if ($value['idu'] == $this->session->userdata('idAuth')) {
                                            echo "Re :".$value['namar'];
                                        }else{ 
                                        echo $value['namas'];
                                        }
                                        ?>
                                            
                                        </b></a></td>
                                        
                                        <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['idm']; ?>"><b><?php echo $value['subject'] ?></b></b></td>
                                        <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['idm']; ?>"><?php echo date('d-m-Y H:i:s',strtotime($value['date']));?></a></td>
                                    </tr>
                                <?php
                                }
                                    
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab -->
                        <div class="tab-pane" id="tab2-2">
                                <table class="table" id="out">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($out as $key => $value) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['id']; ?>" class="btn btn-xs btn-template-primary" title=""><span class="fa fa-eye"></span></a></td>
                                            <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['id']; ?>"><b>To:<?php echo $value['nama'] ?></b></a></td>
                                            <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['id']; ?>"><b><?php echo $value['subject'] ?></b></b></td>
                                            <td><a href="<?php echo base_url();?>admin/msg_view/<?php echo $value['id']; ?>"><?php echo date('d-m-Y H:i:s',strtotime($value['date']));?></a></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                        <!-- /.tab -->
                    </div>
                </div>
            </div>
        
              
    </div>
  </div>
  </div>
</section>
  

<div id="new_msg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Message</h4>
      </div>
      <div class="modal-body">
    <form action="<?php echo base_url(); ?>admin/sendMsg" method="POST" class="form" accept-charset="utf-8">
        <div class="form-group">
            <label>To</label>
            <div class="text-center">
            <select class="itemName form-control" style="width: 100%;" name="id"></select>
            </div>
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="sub" class="form-control" value="" placeholder="">
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="isi" id="textarea"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-sm btn-info">Send</button>&nbsp
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">


  $('.itemName').select2({
    placeholder: '--- Select User ---',
    ajax: {
      url: '<?php echo base_url(); ?>/admin/search_user',
      dataType: 'json',
      // delay: 150,
      processResults: function (data) {
       return {
          results: data
        };
      },
      cache: true
    }
  });


 $('#textarea').wysihtml5({
  toolbar: {
  "link": false, 
    "image": false,
  }});
  $(document).ready(function(){

    $("#in,#out").DataTable({
        "lengthChange"  : true,
        "responsive"    : true,
        "processing"    : false,
        "autoWidth"     : false,
        "paging"        : true,
        "info"          : false,
        "ordering"      : false,
        "searching"     : true,
        });
  });

function new_msg(){
    $("#new_msg").modal('show');
}

</script>
<?php } ?>