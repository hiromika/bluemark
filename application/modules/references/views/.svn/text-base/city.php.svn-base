<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">

                	<p class="margin">
	                    <a data-acl="add_city" class="btn btn-app" data-toggle="modal" data-target="#addModal">
	                        <span class="glyphicon glyphicon-plus"></span>
	                        Tambah
	                    </a> 
	                    <a data-acl="delete_city" class="btn btn-app" id="delCTButton">
	                        <span class="glyphicon glyphicon-trash"></span>
	                        Hapus
	                    </a> 
	                </p>
	                <table id="ctTbls" class="table table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <th width="2%"></th>
	                            <th width="2%">ID</th>
	                            <th>Kode Kota/Kab</th>
	                            <th>Nama Kota/Kab</th>
	                            <th>Provinsi</th>
	                            <th width="15%">Actions</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kota/Kab.</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="ct_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Kode Kota/Kab</label>
                        <input name="ct_code" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nama Kota/Kab</label>
                        <input name="ct_name" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label><br>
                        <input name="ct_province" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
                            data-options="
                                url:'/references/get_form_ct_province_item',
                                method:'post',
                                valueField: 'code',
                                textField: 'name',
                                multiple:false,
                                panelHeight:'auto'
                            " />
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Provinsi</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="ct_id" name="ct_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Kode Kota/Kab</label>
                        <input id="ct_code" name="ct_code" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Nama Kota/Kab</label>
                        <input id="ct_name" name="ct_name" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label><br>
                        <input id="ct_province" name="ct_province" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
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
		var ctTbls = $('#ctTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_city_list',
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

        $('#ctTbls tbody').on('click', 'input', function () {
            var sdata = ctTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        }); 

        $('#delCTButton').click( function(){
            /* get selected row count and its data */
            var count = ctTbls.rows('.selected').data().length;
            var item = ctTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Provinsi', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_city/' + did );
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
            url: '/references/save_city',
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
            url: '/references/save_city',
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

	function showCTUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_city',
            data: {ctid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#ct_id').val(eda.id);
                $('#ct_code').val(eda.code);
                $('#ct_name').val(eda.name);

                $('#ct_province').combobox({
                    url:'/references/get_form_ct_province_item',
                    method:'post',
                    valueField: 'code',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.province_id > 0){ 
                    $('#ct_province').combobox('select',eda.province_id); 
                }

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }
        });
    }
</script>