   <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Forum</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>dashboard">Home</a>
                    </li>
                    <li>Forum</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section>
<div class="container">
  <div class="row">        
    <div class="col-md-12">

    <div class="heading">
        <h5>List Forum</h5>
        <a href="<?php echo base_url();?>dashboard" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
    </div>
 	<a href="" style="" class="btn btn-template-main " title="new forum" data-toggle="modal" data-target="#login-modal">New Thread</a>
      <div style="overflow-x: auto;">

        <table class="table table-hover" id="tbl">
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
              <a href="<?php echo base_url();?>dashboard/viewForum/<?php echo $value['idf'];?>" title="read more"><h5><?php echo $value['judul_forum'];?> </h5></a>
                <p> <i> By</i> : <u><?php echo $value['nama'].'</u> | '. date('M d, Y H:i a',strtotime($value['tgl_forum'])); ?></p>
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
        "autoWidth": true,
        "ordering": false,
	});	
});	

// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>


