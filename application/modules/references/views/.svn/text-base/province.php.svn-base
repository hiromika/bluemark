<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">

	            	<p class="margin">
	                    <a data-acl="add_province" class="btn btn-app" data-toggle="modal" data-target="#addModal">
	                        <span class="glyphicon glyphicon-plus"></span>
	                        Tambah
	                    </a> 
	                    <a data-acl="edit_province" class="btn btn-app" id="delPVButton">
	                        <span class="glyphicon glyphicon-trash"></span>
	                        Hapus
	                    </a> 
	                </p>
	                <table id="pvTbls" class="table table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <th width="2%"></th>
	                            <th width="2%">ID</th>
	                            <th>Kode</th>
	                            <th>Nama</th>
	                            <th>Kota</th>
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
                <h4 class="modal-title">Tambah Provinsi</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="pv_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="pv_code" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="pv_name" type="text" class="form-control" placeholder="">
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
                    <input id="pv_id" name="pv_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Kode</label>
                        <input id="pv_code" name="pv_code" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="pv_name" name="pv_name" type="text" class="form-control" placeholder="" value="">
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
		var pvTbls = $('#pvTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_province_list',
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

        $('#pvTbls tbody').on('click', 'input', function () {
            var sdata = pvTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        }); 

        $('#delPVButton').click( function(){
            /* get selected row count and its data */
            var count = pvTbls.rows('.selected').data().length;
            var item = pvTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Provinsi', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_province/' + did );
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
            url: '/references/save_province',
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
            url: '/references/save_province',
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

	function showPVUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_province',
            data: {pvid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#pv_id').val(eda.id);
                $('#pv_code').val(eda.code);
                $('#pv_name').val(eda.name);

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }
        });
    }
</script>