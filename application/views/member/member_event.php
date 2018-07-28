<style type="text/css" media="screen">
.tx{
	position: relative;

}
.txt{
	position: absolute;
	top: 10px;
	left: 10px;
	right: 10px;
	background: rgba(0, 0, 0, 0.1);
	padding: 4px 8px;
	color: #ecf2f8;
	margin: 0;
	font-family: Lucida , cursive;
	border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
</style>   
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Event</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>member">Home</a>
                    </li>
                    <li>Event</li>
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
                    <h5>List Event</h5>
                    <a href="<?php echo base_url();?>member" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
                </div>
  
                                 
            			<table class="table table-hover" id="tbuser">
		            			<thead>
		            				<tr>
		            					<th></th>
		            				</tr>
		            			</thead>
		            			<tbody>

                        		<div class="row portfolio no-space">
		            			<?php 
		            			$no=1;
		            			foreach ($event as $key => $value) { ?>	

		            				<tr>
		            				<td>
		            				<section class="post">
			                            <div class="row">
				                            <div class="col-md-4">
			                                    <div class="image" style="height: 197px;">
			                                        <a href="<?php echo base_url();?>member/DetailEvent/<?php echo $value['id']; ?>">
			                                            <img src="<?php echo base_url(); echo $value['gambar']; ?>" style="width: 100%; height: 100%;" class="img-responsive"  alt="Example blog post alt">
			                                        </a>
			                                    </div>
			                                </div>

			                                <div class="col-md-8">
			                                    <h3><a href="<?php echo base_url();?>member/DetailEvent/<?php echo $value['id']; ?>"><?php echo $value['judul_event']; ?></a></h3>
			                                    <div class="clearfix">
			                                        <p class="date-comments">
			                                            <a href="blog-post.html"><i class="fa fa-calendar-o"></i><?php echo date('M d, Y',strtotime($value['tgl'])); ?></a>
			                                    </div>
			                                 <!--    <p class="intro"><?php echo $value['isi']; ?></p> -->
			                                    <p class="read-more"><a href="<?php echo base_url();?>member/DetailEvent/<?php echo $value['id']; ?>" class="btn btn-template-main pull-right">Continue reading</a>
			                                    </p>
			                                </div>
			                            </div>
			                        </section>	
		            				</td>
		            				</tr>


		            			<?php $no++; }?>
		            			</div>	
		            			</tbody>
		            	</table>
            	
         </div>
    </div> <!-- row -->
</div><!-- container -->
</section>

							

<script type="text/javascript">

$(function(){
	$('#tbuser').DataTable({
		"paging": true,
        "lengthChange": false,
        "searching": false,
        "order": [[0, 'asc']],
        "info": true,
        "autoWidth": true,
        "ordering": false,
       	"iDisplayLength": 5,

	});	
});	
/*
$(".btn[data-target='#edit']").on('click',function(){
  $("#_judul").val($(this).closest('tr').children()[1].textContent);
  $("#_gambar").val($(this).closest('tr').children()[3].textContent);
  $("#textarea").val($(this).closest('tr').children()[2].textContent);
  console.log($(this).closest('tr').children()[4].textContent); 
});*/

$('#textarea').wysihtml5({
	toolbar: {
	"link": false, 
    "image": false,
	}});
</script>