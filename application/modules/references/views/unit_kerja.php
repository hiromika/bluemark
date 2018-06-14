<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">
                    <p class="margin">
                        <a data-acl="add_unit" class="btn btn-app" data-toggle="modal" data-target="#addModal">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a data-acl="delete_unit" class="btn btn-app" id="delUntButton">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> 
                    </p>
                    <table id="untTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%">ID</th>
                                <th width="13%">Kode</th>
                                <th>Nama</th>
                                <th>Parent</th>
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
                <h4 class="modal-title">Tambah Unit Kerja</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="unt_id" type="hidden" class="form-control" placeholder="">
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="unt_initial" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="unt_name" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input name="unt_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
                            data-options="
                                url:'/references/get_form_unt_parent_item',
                                method:'post',
                                valueField: 'id',
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
                <h4 class="modal-title">Edit Unit Kerja</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="unt_id" name="unt_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Kode</label>
                        <input id="unt_initial" name="unt_initial" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="unt_name" name="unt_name" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input id="unt_parent" name="unt_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
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
        
        var untTbls = $('#untTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_unit_list',
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'order': [[2, 'asc']],
            'info': true,
            'autoWidth': false,
            'columnDefs' : [
                    {'targets':[-1], 'orderable':false}, 
                    {'targets':[0], 'orderable':false}, 
                    { 'targets':[1], 'visible':false, 'searchable':false }
                ]
        });

        $('#untTbls tbody').on('click', 'input', function () {
            var sdata = untTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        });

        $('#delUntButton').click( function(){
            /* get selected row count and its data */
            var count = untTbls.rows('.selected').data().length;
            var item = untTbls.rows('.selected').data();

             /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Unit Kerja', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            var did = item[i][1];
                            $.post( '/references/delete_unit/' + did );
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
            url: '/references/save_unit',
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
            url: '/references/save_unit',
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

    function showUntUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_unit',
            data: {untid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#unt_id').val(eda.id);
                $('#unt_initial').val(eda.initial);
                $('#unt_name').val(eda.name);

                $('#unt_parent').combobox({
                    url:'/references/get_form_unt_parent_item',
                    method:'post',
                    queryParams: {untid:eda.id},
                    valueField: 'id',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.parent > 0){ 
                    $('#unt_parent').combobox('select', eda.parent); 
                }

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }

        });
    }
</script>