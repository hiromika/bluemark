<div class="content">
	<div class="row">
		<dic class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Data Master</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Akun
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">

                    <div class="col-md-6">
                    	<!-- Akun -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Akun</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <form class="form-horizontal" method="POST">
				            <div class="form-group">
								<label class="control-label col-sm-3" for="">Kode Akun :</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="kode_akun" id="" placeholder="Kode AKun">
									</div>
							</div>
				            <div class="form-group">
								<label class="control-label col-sm-3" for="n">Nama Akun :</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="nama_akun" id="" placeholder="Nama Akun">
									</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="komponen">Group :</label>
								<div class="col-sm-7">
								<select class="form-control" name="kode_group" required="">
									<?php
									foreach ($group as $key => $value) {

									echo '<option value="'.$value['kode_group'].'">'.$value['nama_group'].'</option>';
									}
									?>
								</select>
							</div>
							</div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              <button type="button" class="btn btn-primary pull-right" onclick="addAkun()"><i class="fa fa-plus"></i> &nbsp; Submit</button>
				            </div>
				            </form>
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    <div class="col-md-6">
                    	<!-- Akun -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Table Akun</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">

				            <table class="table" id="tb1">
				            	<thead>
				            		<tr>
				            			<th>Kode Akun</th>
				            			<th>Nama Akun</th>
				            			<th>Nama Group</th>
				            			<th>Action</th>
				            			
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>

				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				             
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->

                    </div>
                  </div>
                </div>
                <div class="panel box">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Kategori
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                       <div class="col-md-6">
                    	<!-- Kategori -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Kategori</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
			            	<form class="form-horizontal" method="POST">
			            	<div class="form-group">
							<label class="control-label col-sm-3" for="">Kode Kategori :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="kode_kategori" id="" placeholder="Kode Kategori">
								</div>
							</div>
			            	<div class="form-group">
							<label class="control-label col-sm-3" for="">Nama Kategori :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_kategori" id="" placeholder="Nama Kategori">
								</div>
							</div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              <button type="button" class="btn btn-primary pull-right" onclick="addKator()"><i class="fa fa-plus"></i>&nbsp; Submit</button>
				            </div>
				            </form>
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    <div class="col-md-6">
                    	<!-- Kategori -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Table Kategori</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <table class="table" id="tb2">
				            	<thead>
				            		<tr>
				            			<th>Kode kategori</th>
				            			<th>Nama kategori</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    </div>
                  </div>
                </div>
                 <div class="panel box">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#komponen">
                        Komponen
                      </a>
                    </h4>
                  </div>
                  <div id="komponen" class="panel-collapse collapse">
                    <div class="box-body">
                       <div class="col-md-6">
                    	<!-- Komponen -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Komponen</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <form class="form-horizontal" method="POST">
				            <div class="form-group">
							<label class="control-label col-sm-3" for="">Kode Komponen :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="kode_komponen" id="" placeholder="Kode Kategori">
								</div>
							</div>
			            	<div class="form-group">
							<label class="control-label col-sm-3" for="">Nama Komponen :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_komponen" id="" placeholder="Nama Kategori">
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-3" for="">Nama Kategori :</label>
								<div class="col-sm-7">
									<select class="form-control" name="nama_kategori" required="">
						          		<?php
						                       foreach ($kd_kator as $key => $value) {

						                        echo '<option value="'.$value['kode_kategori'].'">'.$value['nama_kategori'].'</option>';
						                    }
						              	?>
						     		</select>
								</div>
							</div>

				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              <button type="button" class="btn btn-primary pull-right" onclick="addKom()"><i class="fa fa-plus"></i>&nbsp; Submit</button>
				            </div>
				            </form>
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    <div class="col-md-6">
                    	<!-- Komponen -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Table Komponen</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <table class="table" id="tb3">
				            	<thead>
				            		<tr>
				            			<th>Kode Komponen</th>
				            			<th>Nama Komponen</th>
				            			<th>Nama Kategori</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				             
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    </div>
                  </div>
                </div>
                <div class="panel box">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                       Client
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="col-md-6">
                    	<!-- Client -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Client</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <form class="form-horizontal" method="POST">
			            	<div class="form-group">
							<label class="control-label col-sm-3" for="">Nama Client :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_client" id="" placeholder="Nama Client">
								</div>
							</div>

				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              <button type="button" class="btn btn-primary pull-right" onclick="addClient()"><i class="fa fa-plus"></i>&nbsp; Submit</button>
				            </div>
				            </form>
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    <div class="col-md-6">
                    	<!-- Client -->
				          <div class="box box-primary">
				            <div class="box-header">
				              <i class="ion ion-clipboard"></i>
				              <h3 class="box-title">Table Client</h3>
				              <div class="box-tools pull-right">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				            <table class="table" id="tb4">
				            	<thead>
				            		<tr>
				            			<th>Nama client</th>
				            			<th>Action</th>
				            		</tr>
				            	</thead>
				            	<tbody>
				            	
				            	</tbody>
				            </table>
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix no-border">
				              
				            </div>
				          </div>
				          <!-- /.box -->
                    </div><!-- col -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
		</div><!-- col -->
	</div>
</div>

<!-- modal edit akun -->
<div class="modal fade" id="edit_akun">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Akun</h4>
            </div>
            <form id="update_akun" method="POST" accept-charset="utf-8">
            	<div class="modal-body">
            		<input type="hidden" name="id_akun" value="" placeholder="">
            		<div class="form-group">
            			<label for="">Kode Akun</label>
            			<input type="text" class="form-control" name="kd_akun" value="" placeholder="">
            		</div>
            		<div class="form-group">
            			<label for="">Nama Akun</label>
            			<input type="text" class="form-control" name="nm_akun" value="" placeholder="">
            		</div>
            		<div class="form-group">
            			<label for="">Nama Group</label>
            			<select class="form-control" required="" name="kd_group">
									<?php
									foreach ($group as $key => $value) {

									echo '<option value="'.$value['kode_group'].'">'.$value['nama_group'].'</option>';
									}
									?>
						</select>
            		</div>
            	</div>
            	<div class="modal-footer">
            		<button type="button" class="btn btn-primary" onclick="edit_akun()"><i class="fa fa-floppy-o"></i> &nbsp; Submit</button>
            		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            	</div>
            </form>
		</div>
	</div>	
</div>


<!-- modal edit Kategori -->
<div class="modal fade" id="edit_kator">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <form id="update_kategori" method="POST" accept-charset="utf-8">
            	<div class="modal-body">
            		<input type="hidden" name="id_kategori" value="" placeholder="">
            		<div class="form-group">
            			<label for="">Kode kategori</label>
            			<input type="text" class="form-control" name="kd_kategori" value="" placeholder="">
            		</div>
            		<div class="form-group">
            			<label for="">Nama kategori</label>
            			<input type="text" class="form-control" name="nm_kategori" value="" placeholder="">
            		</div>
            	</div>
            	<div class="modal-footer">
            		<button type="button" class="btn btn-primary" onclick="edit_kator()"><i class="fa fa-floppy-o"></i> &nbsp; Submit</button>
            		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            	</div>
            </form>
		</div>
	</div>	
</div>

<!-- modal edit Komponen -->
<div class="modal fade" id="edit_kom">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit komponen</h4>
            </div>
            <form id="update_komponen" method="POST" accept-charset="utf-8">
            	<div class="modal-body">
            		<input type="hidden" name="id_komponen" value="" placeholder="">
            		<div class="form-group">
            			<label for="">Kode komponen</label>
            			<input type="text" class="form-control" name="kd_komponen" value="" placeholder="">
            		</div>
            		<div class="form-group">
            			<label for="">Nama komponen</label>
            			<input type="text" class="form-control" name="nm_komponen" value="" placeholder="">
            		</div>
            		<div class="form-group">
            			<label for="">Nama Group</label>
            			<select class="form-control" required="" name="kd_kategori">
									<?php
				                       foreach ($kd_kator as $key => $value) {

				                        echo '<option value="'.$value['kode_kategori'].'">'.$value['nama_kategori'].'</option>';
				                    		}
						              ?>
						</select>
            		</div>
            	</div>
            	<div class="modal-footer">
            		<button type="button" class="btn btn-primary" onclick="edit_kom()"><i class="fa fa-floppy-o"></i> &nbsp; Submit</button>
            		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            	</div>
            </form>
		</div>
	</div>	
</div>

<!-- modal edit Client -->
<div class="modal fade" id="edit_Client">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Client</h4>
            </div>
            <form id="update_client" method="POST" accept-charset="utf-8">
            	<div class="modal-body">
            		<input type="hidden" name="id_client" value="" placeholder="">
            		<div class="form-group">
            			<label for="">Nama Client</label>
            			<input type="text" class="form-control" name="nm_client" value="" placeholder="">
            		</div>
            	</div>
            	<div class="modal-footer">
            		<button type="button" class="btn btn-primary" onclick="edit_Client()"><i class="fa fa-floppy-o"></i> &nbsp; Submit</button>
            		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            	</div>
            </form>
		</div>
	</div>	
</div>

<script type="text/javascript">
var akun
var kator 
var kom
var client
	$(document).ready(function(){
	akun = $('#tb1').DataTable({
		"processing": true,
		"ajax":'/finance/m_akun',
		"columns":[
		{'data' : 'kode_akun'},
		{'data' : 'nama_akun'},
		{'data' : 'nama_group'}
		],
		"columnDefs" : [{
			"targets" : [3],
			"data" 	 :'id_akun',
			"render" : function(data,type,full,meta){
                    var chAkn = "<a href='javascript:void(0)' class='btn btn-sm btn-success' id='ch_Akn"+data+"' onclick='change_akun("+data+")'><span class='glyphicon glyphicon-edit'></span></a> ";
                    var delAkn = "<a href='javascript:void(0)' class='btn btn-sm btn-danger' id='del_Akn"+data+"' onclick='del_akun("+data+")'><span class='glyphicon glyphicon-trash'></span></a>";
                    return "<center>"+chAkn+delAkn+"</center>"
            }
		}]

	});
	kator = $('#tb2').DataTable({
		"processing": true,
		"ajax":'/finance/m_kator',
		"columns":[
		{'data' : 'kode_kategori'},
		{'data' : 'nama_kategori'}
		],
		"columnDefs" : [{
			"targets" : [2],
			"data" 	 :'id',
			"render" : function(data,type,full,meta){
                    var chKate = "<a href='javascript:void(0)' class='btn btn-sm btn-success' id='ch_kate"+data+"' onclick='change_kate("+data+")'><span class='glyphicon glyphicon-edit'></span></a> ";
                    var delKate = "<a href='javascript:void(0)' class='btn btn-sm btn-danger' id='del_kate"+data+"' onclick='del_kate("+data+")'><span class='glyphicon glyphicon-trash'></span></a>";
                    return "<center>"+chKate+delKate+"</center>"
            }
		}]
	});
	kom = $('#tb3').DataTable({
		"processing": true,
		"ajax":'/finance/m_kom',
		"columns":[
		{'data' : 'kode_komponen'},
		{'data' : 'nama_komponen'},
		{'data' : 'nama_kategori'}
		],
		"columnDefs" : [{
			"targets" : [3],
			"data" 	 :'id_komponen',
			"render" : function(data,type,full,meta){
                    var chKom = "<a href='javascript:void(0)' class='btn btn-sm btn-success' id='ch_Kom"+data+"' onclick='change_kom("+data+")'><span class='glyphicon glyphicon-edit'></span></a> ";
                    var delKom = "<a href='javascript:void(0)' class='btn btn-sm btn-danger' id='del_Kom"+data+"' onclick='del_kom("+data+")'><span class='glyphicon glyphicon-trash'></span></a>";
                    return "<center>"+chKom+delKom+"</center>"
            }
		}]
	});
	client = $('#tb4').DataTable({
		"processing": true,
		"ajax":'/finance/m_client',
		"columns":[
		{'data' : 'nama_client'}
		],
		"columnDefs" : [{
			"targets" : [1],
			"data" 	 :'id',
			"render" : function(data,type,full,meta){
                    var chclient = "<a href='javascript:void(0)' class='btn btn-sm btn-success' id='ch_cl"+data+"' onclick='change_Client("+data+")'><span class='glyphicon glyphicon-edit'></span></a> ";
                    var delclient = "<a href='javascript:void(0)' class='btn btn-sm btn-danger' id='del_cl"+data+"' onclick='del_Client("+data+")'><span class='glyphicon glyphicon-trash'></span></a>";
                    return "<center>"+chclient+delclient+"</center>"
            }
		}]
	});
	});










function addAkun(){
	$.ajax({
		url: '/finance/saveAkun',
		type: 'POST',
		data:{
			kode_akun: $('input[name=kode_akun]').val(),
			nama_akun: $('input[name=nama_akun]').val(),
			kode_group:$('select[name=kode_group]').val()
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	            $('input[name=kode_akun]').val('');
	            $('input[name=nama_akun]').val('');
	            $('select[select=kode_group]').val('');  
	            akun.ajax.reload();
	            }
	      }
	});
	}

function change_akun(kode){
	$("#edit_akun").modal("show");
	var row = $("#ch_Akn"+kode).closest('tr');
	var data = $("#tb1").dataTable().fnGetData(row);

	$("[name=id_akun").val(kode);
	$("[name=kd_akun").val(data['kode_akun']);
	$("[name=nm_akun").val(data['nama_akun']);
	$("[name=kd_group").val(data['kode_group']);

	}

function edit_akun(){
	$.ajax({
		url: 'finance/updateAkun',
		type: 'POST',
		data:{
			id_akun: $('input[name=id_akun]').val(),
			kode_akun: $('input[name=kd_akun]').val(),
			nama_akun: $('input[name=nm_akun]').val(),
			kode_group: $('select[name=kd_group]').val()
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_akun').val('');
				$('[name=kd_akun').val('');
				$('[name=nm_akun').val('');
				$('[name=kd_group').val('');
				$("#edit_akun").modal('hide');
	            akun.ajax.reload();
	            }
	      }
	});
}	

function del_akun($id){
	if (confirm("Are you sure?")) {
	$.ajax({
		url: 'finance/deleteAkun',
		type: 'POST',
		data:{
			id_akun : $id
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_akun').val('');
				$('[name=kd_akun').val('');
				$('[name=nm_akun').val('');
				$('[name=kd_group').val('');
	            akun.ajax.reload();
	            }
	      }
	});
	}

}








function addKator(){
	$.ajax({
		url: '/finance/saveKator',
		type: 'POST',
		data:{
			kode_kategori: $('input[name=kode_kategori]').val(),
			nama_kategori: $('input[name=nama_kategori]').val(),
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	            $('input[name=kode_kategori]').val('');
	            $('input[name=nama_kategori]').val('');
	            kator.ajax.reload();
	            }
	      }
	});
}

function change_kate(kode){
	$("#edit_kator").modal("show");
	var row = $("#ch_kate"+kode).closest('tr');
	var data = $("#tb2").dataTable().fnGetData(row);

	$("[name=id_kategori").val(kode);
	$("[name=kd_kategori").val(data['kode_kategori']);
	$("[name=nm_kategori").val(data['nama_kategori']);
}

function edit_kator(){
	$.ajax({
		url: 'finance/updateKator',
		type: 'POST',
		data:{
			id: $('input[name=id_kategori]').val(),
			kode_kategori: $('input[name=kd_kategori]').val(),
			nama_kategori: $('input[name=nm_kategori]').val(),
		},
		success: function(data){
				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_kategori').val('');
				$('[name=kd_kategori').val('');
				$('[name=nm_kategori').val('');
				$("#edit_kator").modal('hide');
	            kator.ajax.reload();
	            }
	      }
	});
}	

function del_kate($id){
	if (confirm("Are you sure?")) {
	$.ajax({
		url: 'finance/deleteKator',
		type: 'POST',
		data:{
			id : $id
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_kategori').val('');
				$('[name=kd_kategori').val('');
				$('[name=nm_kategori').val('');
	            kator.ajax.reload();
	            }
	      }
	});
	}

}











function addKom(){
	$.ajax({
		url: '/finance/saveKom',
		type: 'POST',
		data:{
			kode_komponen: $('input[name=kode_komponen]').val(),
			nama_komponen: $('input[name=nama_komponen]').val(),
			kode_kategori_kmp: $('select[name=nama_kategori]').val(),
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	            $('input[name=kode_komponen]').val('');
	            $('input[name=nama_komponen]').val('');
	            $('select[name=nama_kategori]').val('');
	            kom.ajax.reload();
	            }
	      }
	});
	}

function change_kom(kode){
	$("#edit_kom").modal("show");
	var row = $("#ch_Kom"+kode).closest('tr');
	var data = $("#tb3").dataTable().fnGetData(row);

	$("[name=id_komponen").val(kode);
	$("[name=kd_komponen").val(data['kode_komponen']);
	$("[name=nm_komponen").val(data['nama_komponen']);
	$("[name=kd_kategori").val(data['kode_kategori_kmp']);
}

function edit_kom(){
	$.ajax({
		url: 'finance/updateKom',
		type: 'POST',
		data:{
			id: $('input[name=id_komponen]').val(),
			kode_komponen: $('input[name=kd_komponen]').val(),
			nama_komponen: $('input[name=nm_komponen]').val(),
			kode_kategori_kmp: $('select[name=kd_kategori]').val(),
		},
		success: function(data){
				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_komponen').val('');
				$('[name=kd_komponen').val('');
				$('[name=nm_komponen').val('');
				$("[name=kd_kategori").val('');
				$("#edit_kom").modal('hide');
	            kom.ajax.reload();
	            }
	      }
	});
}	

function del_kom($id){
	if (confirm("Are you sure?")) {
	$.ajax({
		url: 'finance/deleteKom',
		type: 'POST',
		data:{
			id : $id
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_komponen').val('');
				$('[name=kd_komponen').val('');
				$('[name=nm_komponen').val('');
	            kom.ajax.reload();
	            }
	      }
	});
	}

}






function addClient(){
	$.ajax({
		url: '/finance/saveClient',
		type: 'POST',
		data:{
			nama_client: $('input[name=nama_client]').val(),
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	            $('input[name=nama_client]').val('');
	            client.ajax.reload();
	            }
	      }
	});
	}

function change_Client(kode){
	$("#edit_Client").modal("show");
	var row = $("#ch_cl"+kode).closest('tr');
	var data = $("#tb4").dataTable().fnGetData(row);

	$("[name=id_client").val(kode);
	$("[name=nm_client").val(data['nama_client']);
}


function edit_Client(){
	$.ajax({
		url: 'finance/updateClient',
		type: 'POST',
		data:{
			id: $('input[name=id_client]').val(),
			nama_client: $('input[name=nm_client]').val(),

		},
		success: function(data){
				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_client').val('');
				$('[name=nm_client').val('');
				$("#edit_Client").modal('hide');
	            client.ajax.reload();
	            }
	      }
	});
}	


function del_Client($id){
	if (confirm("Are you sure?")) {
	$.ajax({
		url: 'finance/deleteClient',
		type: 'POST',
		data:{
			id : $id
		},
		success: function(data){

				var dataArr = $.parseJSON(data);
	            if(!dataArr['success']){

	        	}else{
	           	$('[nmae=id_client').val('');
				$('[name=nm_client').val('');
	            client.ajax.reload();
	            }
	      }
	});
	}
}


</script>