<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">
                    <p class="margin">
                        <a data-acl="add_doc_type" class="btn btn-app" data-toggle="modal" data-target="#addModal">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a data-acl="delete_doc_type" class="btn btn-app" id="delDTButton">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> 
                    </p>
                    <table id="dtyTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%">ID</th>
                                <th>Nama</th>
                                <th>Parent</th>
                                <th>Unit</th>
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
                <h4 class="modal-title">Tambah Tipe Dokumen</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="dty_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="dty_name" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input name="dty_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
                            data-options="
                                url:'/references/get_form_dty_parent_item',
                                method:'post',
                                valueField: 'id',
                                textField: 'name',
                                multiple:false,
                                panelHeight:'auto'
                            " />
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Unit Kerja</label><br>
                        <input name="dty_unit" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
                            data-options="
                                url:'/references/get_form_dty_unit',
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
                <h4 class="modal-title">Edit Tipe Dokumen</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="dty_id" name="dty_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="dty_name" name="dty_name"  type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input id="dty_parent" name="dty_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Unit Kerja</label><br>
                        <input id="dty_unit" name="dty_unit" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
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
        var dtyTbls = $('#dtyTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_doc_type_list',
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

        $('#dtyTbls tbody').on('click', 'input', function () {
            var sdata = dtyTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        });

        $('#delDTButton').click( function(){

            var count = dtyTbls.rows('.selected').data().length;
            var item = dtyTbls.rows('.selected').data();

            if(count > 0){
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Tipe Dokumen', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_doc_type/' + did );
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
            url: '/references/save_doc_type',
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
            url: '/references/save_doc_type',
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
    
    function showDTUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_doc_type',
            data: {dtyid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);
                
                /* render edit form */
                $('#dty_id').val(eda.id);
                $('#dty_name').val(eda.name);

                $('#dty_parent').combobox({
                    url:'/references/get_form_dty_parent_item',
                    method:'post',
                    queryParams: {dtyid:eda.id},
                    valueField: 'id',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.parent > 0){ 
                    $('#dty_parent').combobox('select',eda.parent); 
                }

                $('#dty_unit').combobox({
                    url:'/references/get_form_dty_unit',
                    method:'post',
                    valueField: 'id',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.unit_id > 0){ 
                    $('#dty_unit').combobox('select',eda.unit_id); 
                }

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }

        });
    }
</script>