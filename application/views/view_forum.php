<style type="text/css" media="screen">

</style>   
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
     <a href="<?php echo base_url();?>dashboard/forum" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
    </div>
	  	<div class="box" style="margin-bottom: 10px;">
	  	<blockquote>
	  	<h4><?php echo $forum['judul_forum'];?></h4>
	  	<p> <i> By</i> : <a class="btn btn-link" style="padding-left: 0px; padding-right: 0px;" ><?php echo $forum['nama'].'</a> | '. date('M d, Y H:i a',strtotime($forum['tgl_forum'])); ?></p>
	  	</blockquote>
	  		<?php 
	  			echo $forum['isi_forum'];
	  		?><br>
	  		<?php if (!$forum['file']) {
	  			
	  		}else{ ?>
	  		<div class="text-center">
	  		<a class="btn btn-template-main" href="" data-toggle="modal" data-target="#login-modal" title="Download lampiran">Download</a>
	  		</div>
	  		<?	} ?>

	  	<div class="box-footer" style="padding: 10px;">	
	  	<p class="reply pull-right" style="margin-bottom: 0px;"><a href="#" data-toggle="modal" data-target="#login-modal" ><i class="fa fa-reply"></i>Reply</a></p>
	  	</div>
	  	</div>
<table id="tbl" style="border: none; width: 100% !important; ">
	<thead>
		<tr style="display: none;">
			<th ></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding-right: 0px; padding-left: 0px;">
				<table class="table table-bordered" >
			  		<thead>
			  			<tr style="display: none;"><th colspan="2">tgl</th><th></th></tr>
			  		</thead>
			  		<tbody>
			  		<?php foreach ($komen as $key => $value) { ?>
			  			<tr class="info">
			  				<td colspan="2" style="padding: 5px; padding-left: 10px;">
			  				<time datetime="<?php echo $value['tgl_komen']; ?>"><?php echo date('M d, Y H:i a',strtotime($value['tgl_komen'])); ?></time>
			  				</td>
			  				<td style="display: none;"></td>
			  			</tr>
			  			<tr>
			  				<td width="15%">
			  				<img class="img-responsive"  src="<?php echo base_url().$value['foto']; ?>" alt="">
			  				<p class="text-center"><a href="" title=""><?php echo $value['nama']; ?></a></p> 
			  				</td>
			  				<td><?php echo $value['komen']; ?></td>
			  			</tr>
			  			<tr>
			  				<td colspan="2" style="padding: 5px; background: #f7f7f7;"><p style="margin-bottom: 0px;" class="reply pull-right" >

			  				<a href="#" style="" data-toggle="modal" data-target="#login-modal"><i class="fa fa-reply"></i> Reply</a></p>
			  				</td>
			  				<td style="display: none;"></td>
			  			</tr>
			  		<?php } ?>
			  		</tbody>
			  	</table>
			</td>
		</tr>
	</tbody>
</table>

	  	<div id="dynamic" style="margin-top: 15px;"></div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">

$(function(){
	$('#tbl').DataTable({
		"paging": true,
        "lengthChange": false,
        "searching": false,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true,
        "ordering": false,
	});	
});	

var doAction = (function(){
    $('#dynamic').html('');
    $("#dynamic").append(
    	"<form action='<?php echo base_url();?>/admin/inkomen/<?php echo $idf; ?>' method='POST'><input type='text' name='id_user' value='<?php echo $this->session->userdata('idAuth');?>'hidden> <input type='text' name='id_forum' value='<?php echo $idf;?>' hidden><div class='form-group row'><div class='col-xs-12'><div class='form-group'><span class='input-group'></span><textarea class='form-control' name='isi' id='textarea' placeholder=' Enter text ...' style=' height: 200px; '></textarea></div></form><button type='submit' class='btn btn-template-main pull-right'><i class='fa fa-comment-o'></i> Post comment</button>"
    	);
	$('#textarea').wysihtml5({
	toolbar: {
	"link": false, 
    "image": false,
	}});
});



</script>


