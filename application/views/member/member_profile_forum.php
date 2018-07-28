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
                    <li><a href="<?php echo base_url();?>member">Home</a></li>
                    <li>My Threads</li>
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
        <h5>My Threads</h5>
        <a href="<?php echo base_url();?>member" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
      </div>

      <div class="col-md-3">
         <div class="panel panel-default sidebar-menu with-icons">
              <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked">
                     <li><a href="<?php echo base_url();?>member/DetailUser/<?php echo $this->session->userdata('idAuth');?>">My Profile</a>
                      </li>
                      <li class="active"><a href="<?php echo base_url();?>member/listforum/<?php echo $this->session->userdata('idAuth');?>">My Thread</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url();?>member/message">Message</a>
                      </li>
                      <li><a href="<?php echo base_url();?>member/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>

      <div class="col-md-9">
        
        <div class="col-md-2 text-center" style="padding-bottom: 15px;">
          <p style="color: grey;">Foto Profile</p>
          <form action="<?php echo base_url();?>member/upFotoPro" method="POST" id="fot" accept-charset="utf-8" enctype="multipart/form-data">
          <img src="<?php echo base_url()?><?php echo $user['foto'];?>" class="img-responsive" alt="profile foto" width="100%" height="150">
            <a href="#" class="profil-foto">Edit</a>
            <input type="text" name="id" value="<?php echo $this->session->userdata('idAuth');?>" hidden placeholder="">
            <input type="file" name="foto" id="foto" class="input-foto" onchange="javascript:this.form.submit()" style="display: none;">
          </form>
        </div>

        <div class="col-md-10">
      			<div style="overflow-x: auto;">
      				<table class="table table-hover " id="tbl">
      					<thead>
      						<tr>
      						<th style="display: none;">no</th>
      						<th>Thread</th>
      						<th>Stat</th>
      						</tr>
      					</thead>
      					<tbody>
      						<?php foreach ($forum as $key => $value) { ?>
      						<tr>
      						<td style="display: none;"><?php echo $value['idf']; ?></td>
      						<td class="">
      						<blockquote style="margin-bottom: 0px;">
      						<a href="<?php echo base_url();?>member/viewForum/<?php echo $value['idf'];?>" title="read more"><h5><?php echo $value['judul_forum'];?> </h5></a>
      						<p> <i> By</i> : <u><?php echo $value['nama'].'</u> | '. date('M d, Y H:i a',strtotime($value['tgl_forum'])); ?></u></p>
      						</blockquote>
      						</td>
      						<td>Replies : <?php echo $replies[$key]['jmlrep']; ?> <br>
                        Views   : <?php echo $viewer[$key]['vForum']; ?>
                  </td>
      						</tr>
      						<?php  } ?>
      					</tbody>
      				</table>
      			</div>
        </div>

      </div>

      </div> <!-- col --> 
</div><!-- row -->
</div>
</section>



<script type="text/javascript">
$(function(){
	$('#tbl').DataTable({
		    "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'desc']],
        "info": true,
        "autoWidth": true
	});	
});	

$(function(){
    $(".profil-foto").on('click', function(e){
        e.preventDefault();
        $(this).parent().find(".input-foto").trigger('click');
    });
});
</script>