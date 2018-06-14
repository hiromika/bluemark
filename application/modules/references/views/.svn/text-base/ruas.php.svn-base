<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">

                	<p class="margin">
	                    <a data-acl="add_ruas" class="btn btn-app" data-toggle="modal" data-target="#addModal">
	                        <span class="glyphicon glyphicon-plus"></span>
	                        Tambah
	                    </a> 
	                    <a data-acl="delete_ruas" class="btn btn-app" id="delRSButton">
	                        <span class="glyphicon glyphicon-trash"></span>
	                        Hapus
	                    </a> 
	                </p>

	                <table id="rsTbls" class="table table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <th width="2%"></th>
	                            <th width="2%">ID</th>
	                            <th>Link ID</th>
	                            <th>Provinsi</th>
	                            <th>Kode Ruas</th>
	                            <th>Kode Keterangan</th>
	                            <th>Nama Ruas</th>
	                            <th>Panjang Ruas (Km)</th>
	                            <th width="5%">Actions</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        
	                    </tbody>
	                </table>

	            </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-xs-12 -->
	</div><!-- /.row -->
</div><!-- /.content -->

<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Ruas</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                	<div class="row">
                		<div class="col-md-6">
                			<input name="rs_id" type="hidden" class="form-control" placeholder="" value="">
		                    <div class="form-group">
		                        <label>Link ID</label>
		                        <input name="rs_link_id" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Provinsi</label><br>
		                        <input name="rs_province" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
		                            data-options="
		                                url:'/references/get_form_rs_province_item',
		                                method:'post',
		                                valueField: 'id',
		                                textField: 'name',
		                                multiple:false,
		                                panelHeight:'auto'
		                            " />
		                    </div>
		                    <div class="form-group">
		                        <label>Kode Ruas</label>
		                        <input name="rs_code" type="text" class="form-control" placeholder="">
		                    </div>                    
		                    <div class="form-group">
		                        <label>Kode Keterangan</label>
		                        <input name="rs_desc_code" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Nama Ruas</label>
		                        <input name="rs_name" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Panjang Ruas</label>
								<div class="input-group">
		                        	<input name="rs_length" type="text" class="form-control" placeholder="">
									<div class="input-group-addon">Kilometer</div>
								</div>
		                    </div>
                		</div>
                		<div class="col-md-6">
                			<div class="form-group">
		                        <label>STA Awal</label>
		                        <input name="rs_sta_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>STA Akhir</label>
		                        <input name="rs_sta_end" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Koordinat Awal</label>
		                        <input name="rs_coor_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Koordinat Akhir</label>
		                        <input name="rs_coor_end" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Titik Ref Awal</label>
		                        <input name="rs_ref_point_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Titik Ref Akhir</label>
		                        <input name="rs_ref_point_end" type="text" class="form-control" placeholder="">
		                    </div>
                		</div>
                	</div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="saveData()"><i class="fa fa-floppy-o"></i> &nbsp; Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Ruas</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                	<div class="row">
                		<div class="col-md-6">
                			<input id="rs_id" name="rs_id" type="hidden" class="form-control" placeholder="" value="">
		                    <div class="form-group">
		                        <label>Link ID</label>
		                        <input id="rs_link_id" name="rs_link_id" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Provinsi</label><br>
		                        <input id="rs_province" name="rs_province" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
		                    </div>
		                    <div class="form-group">
		                        <label>Kode Ruas</label>
		                        <input id="rs_code" name="rs_code" type="text" class="form-control" placeholder="">
		                    </div>                    
		                    <div class="form-group">
		                        <label>Kode Keterangan</label>
		                        <input id="rs_desc_code" name="rs_desc_code" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Nama Ruas</label>
		                        <input id="rs_name" name="rs_name" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Panjang Ruas</label>
		                        <div class="input-group">
		                        	<input id="rs_length" name="rs_length" type="text" class="form-control" placeholder="">
									<div class="input-group-addon">Kilometer</div>
								</div>
		                    </div>
                		</div>
                		<div class="col-md-6">
                			<div class="form-group">
		                        <label>STA Awal</label>
		                        <input id="rs_sta_start" name="rs_sta_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>STA Akhir</label>
		                        <input id="rs_sta_end" name="rs_sta_end" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Koordinat Awal</label>
		                        <input id="rs_coor_start" name="rs_coor_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Koordinat Akhir</label>
		                        <input id="rs_coor_end" name="rs_coor_end" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Titik Ref Awal</label>
		                        <input id="rs_ref_point_start" name="rs_ref_point_start" type="text" class="form-control" placeholder="">
		                    </div>
		                    <div class="form-group">
		                        <label>Titik Ref Akhir</label>
		                        <input id="rs_ref_point_end" name="rs_ref_point_end" type="text" class="form-control" placeholder="">
		                    </div>
                		</div>
                	</div>
                	
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="updateData()"><i class="fa fa-floppy-o"></i> &nbsp; Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$(function () {
		var rsTbls = $('#rsTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_ruas_list',
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'order': [[2, 'asc']],
            'info': true,
            'autoWidth': false,
            'columnDefs' : [
                    { 'targets':[-1], 'orderable':false },
                    { 'targets':[0], 'orderable':false },
                    { 'targets':[1], 'visible':false, 'searchable':false }
                ] 
        });

        $('#rsTbls tbody').on('click', 'input', function () {
            var sdata = rsTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        }); 

        $('#delRSButton').click( function(){
            /* get selected row count and its data */
            var count = rsTbls.rows('.selected').data().length;
            var item = rsTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Provinsi', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_ruas/' + did );
                        };
                        location.reload(); 
                    }
                });
            }else{
                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk penghapusan','warning');                
            }
        });
    }); /* end of jquery on ready */

    function saveData(){
        $('#addForm').form('submit', {
            url: '/references/save_ruas',
            onSubmit: function() {
                
            },
            success: function(result) {
                var win = $.messager.progress({
                    title:'Please wait',
                    msg:'Saving data...'
                });
                setTimeout(function(){
                    location.reload();
                },3000);
            }
        });
    }

    function updateData(){
        $('#updateForm').form('submit', {
            url: '/references/save_ruas',
            onSubmit: function() {
                
            },
            success: function(result) {
                var win = $.messager.progress({
                    title:'Please wait',
                    msg:'Updating data...'
                });
                setTimeout(function(){
                    location.reload();
                },3000);
            }
        });
    }

    function showRSUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_ruas',
            data: {rsid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#rs_id').val(eda.id);
                $('#rs_link_id').val(eda.link_id);
                $('#rs_code').val(eda.ruas_code);
                $('#rs_desc_code').val(eda.description_code);
                $('#rs_name').val(eda.name);
                $('#rs_length').val(eda.length);
                $('#rs_sta_start').val(eda.sta_start);
                $('#rs_sta_end').val(eda.sta_end);
                $('#rs_coor_start').val(eda.coor_start);
                $('#rs_coor_end').val(eda.coor_end);
                $('#rs_ref_point_start').val(eda.ref_point_start);
                $('#rs_ref_point_end').val(eda.ref_point_end);

                $('#rs_province').combobox({
                    url:'/references/get_form_rs_province_item',
                    method:'post',
                    valueField: 'id',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.province_id > 0){ 
                    $('#rs_province').combobox('select',eda.province_id); 
                }

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }
        });
    }
</script>