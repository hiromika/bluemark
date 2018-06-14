
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
			    <?php 
					$noid = 1;
			    	foreach ($akun as $key => $value) {	?>

			    	<li class=""><a class="btn-info" href="#set<?php echo $noid ?>"><?php echo $value['nama_akun']; ?></a></li>

			        <?php
			    	$noid++;
			    			
			    		}
			        ?>
			    </ul>
			</div>

			    <br>
			    <div class="tab-content">
			   
			   <?php 
			   $id=1; 
			   	foreach ($akun as $key => $value) {
			   ?>
			        <div class="tab-pane fade active in" id="set<?php echo $id; ?>">
                        <table class="table table-hover" id="tb<?php echo $id; ?>">
					        <thead>
					            <tr>
					              <th style="display: none;">id</th>
					              <th>Tanggal</th>
					              <th>Keterangan</th>
					              <th class="success">Debet</th>
					              <th class="danger">Kredit</th>
					              <th>Saldo</th>
					              <th>Note</th>

					            </tr>
					          </thead>
					          	<tbody>

					              
			          			</tbody>
			        	</table>   
					</div>  

			        <script type="text/javascript">
			        	$(document).ready(function() {
			        	    $('#tb<?php echo $id;?>').DataTable({
			        	    	"processing":true,
			        	    	"order" :[[0,'desc']],
			        	    	"ajax" :  '/finance/dataAKun/'+"<?php echo $value['kode_akun'];?>",
			        	    	"columns" :[
			        	    	{"data" : 'ida', "visible" : false},
			        	    	{"data" : 'tanggal'},
			        	    	{"data" : 'nama_kategori'},
			        	    	{"data" : 'adebet',render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
			        	    	{"data" : 'akredit',render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
			        	    	{"data" : 'asaldo',render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
			        	    	{"data" : 'note'},
			        	    	]
			        	    });
			        	});
			    		</script> 
			        <?php
			        $id++;
			    	}
			    ?>
                </div> <!-- tab content -->

                
					<div class="box">
						
						<div class="box-body">
						
						<?php $ids=1; foreach ($akun as $key => $value) { ?>
						<div class="col-md-3">
						<div class="callout callout-info">
						<H3><b><?php echo $value['nama_akun']; ?></b></H3>
							<table class="table" id="tbs<?php echo $ids; ?>">
							<thead class="success">
								<th>Akun Total</th>
							</thead>
								<tbody>

								</tbody>					
							</table>

							<script type="text/javascript">
								$(document).ready(function() {
				        	    $('#tbs<?php echo $ids; ?>').DataTable({
				        	    	"processing":true,
				        	    	"paging": false,
				                    "lengthChange": false,
				                    "searching": false,
				                    "info": false,
				                    "autoWidth": false,
				        	    	"ajax" :  '/finance/total_Akun/'+"<?php echo $value['kode_akun'];?>",
				        	    	"columns" :[
				        	    	{"data" : 'saldo_akun',render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )}
				        	    	]

				        	    });
				        	});
							</script>
							</div>
							</div>
							<?php 
								$ids++;
								}
							?>
						</div>
					</div>

            </div>
        </div>
    </div>
</div>
</div>







</div>

<script type="text/javascript">
$(document).ready(function(){
	$("ul.nav-tabs a,ul.nav-pills a").click(function (e) {
	  e.preventDefault();  
	    $(this).tab('show');
	});
})

$(document).ready(function(){
    activaTab('aaa');
});

function activaTab(tab){
    $('.nav-tabs a[href="#set1"]').tab('show');
};

</script>