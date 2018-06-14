<div class="content">
	<div class="row">
	<div class="box box-info">
		<div class="box-body">
		<div class="col-md-12">
			<div class="tabbable boxed parentTabs">
				<ul>
				 	<li class=" nav navbar-right"><a class="btn btn-info" href="/finance/index"><span class="ion-arrow-return-left"></span></a></li>
				</ul>
			    <ul class="nav nav-tabs">

			    <?php $nid =1; foreach ($kator as $key => $value) {
			    	?>			   
			        <li class=""><a class="btn-info" href="#set<?php echo $nid; ?>"> <?php echo $value['nama_kategori']; ?> </a></li>
			        <?php $nid++; } ?>
			    </ul>
			</div>
			    <br>
			    <div class="tab-content">
			    <?php $id = 1; foreach ($kator as $key => $value) {
			    ?>
			        <div class="tab-pane fade active in" id="set<?php echo $id ;?>">
					   <table class="table table-hover" id="tb<?php echo $id ;?>" style="background-color: #FFF">
					        <thead>
					            <tr>
					              <th>Tanggal</th>
					              <th>Akun</th>
					              <th>Note</th>
					              <th class="success">Debet</th>
					              <th class="danger">Kredit</th>
					            </tr>
					        </thead>
					          	<tbody>

			          			</tbody>
			        	</table>
			        	<div class="col-md-6">
						<div class="callout callout-info">
							<H6> SALDO TOTAL</H6>
								<table class="table" id="tba<?php echo $id; ?>">
								<thead class="success">
									<th style="width: 250px;">Debet</th>
									<th style="width: 250px;">Kredit</th> 
								</thead>
									<tbody>

									</tbody>					
								</table>
						</div> 
						</div>
						<script type="text/javascript">
			        	$(document).ready(function(){
			        	    $('#tb<?php echo $id;?>').DataTable({
			        	    	"processing":true,
			        	    	"ajax" :  '/finance/kategori/'+"<?php echo $value['kode_kategori'];?>",
			        	    	"columns" : [
			        	    	{"data" : 'tanggal'},
			        	    	{"data" : 'nama_akun'},
			        	    	{"data" : 'note'},
			        	    	{"data" : 'adebet', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
			        	    	{"data" : 'akredit', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )}
			        	    	]
			        	    });

			        	  $('#tba<?php echo $id; ?>').DataTable({

								"processing" : true,
								"paging": false,
			                    "lengthChange": false,
			                    "searching": false,
			                    "info": false,
			                    "autoWidth": false,
								"ajax" : '/finance/saldoKator/'+"<?php echo $value['kode_kategori'];?>",
								"columns" : [
								{"data" : 'totdebet',
								render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )
								},
								{"data" : 'totkredit',
								render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )
								}
								]
							});
			        	});
			    		</script> 
						</div>
					<?php $id++; } 	?>

                </div> <!-- tab content -->
            </div>
        </div>
    </div>
</div>
</div>

</div>
<script type="text/javascript">
$("ul.nav-tabs a,ul.nav-pills a").click(function (e) {
  e.preventDefault();  
    $(this).tab('show');
});

$(document).ready(function(){
    activaTab('aaa');
});

function activaTab(tab){
    $('.nav-tabs a[href="#set1"]').tab('show');
};
</script>
