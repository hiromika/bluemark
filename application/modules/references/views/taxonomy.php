<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">
                    <p class="margin">
                        <a class="btn btn-app" data-toggle="modal" data-target="#addModal" data-acl="add_taxonomy">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a class="btn btn-app" id="delTxButton" data-acl="delete_taxonomy">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> 
                    </p>
                    <table id="txTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%">id</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Parent</th>
                                <th width="5%">Term</th>
                                <th width="15%">Aksi</th>
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
                <h4 class="modal-title">Tambah Taksonomi</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="tx_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="tx_name" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="tx_desc" class="form-control" rows="3" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input name="tx_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" 
                            data-options="
                                url:'/references/get_form_tx_parent_item',
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
                <h4 class="modal-title">Edit Taksonomi</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="tx_id" name="tx_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="tx_name" name="tx_name" type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="tx_desc" name="tx_desc" class="form-control" rows="3" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Parent</label><br>
                        <input id="tx_parent" name="tx_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;" />
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
        var txTbls = $('#txTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_taxonomy_list',
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

        $('#txTbls tbody').on('click', 'input', function () {
            var sdata = txTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
            /* console.log(txTbls.row( this ).data()); */
        }); 

        $('#delTxButton').click( function(){
            /* console.log(txTbls.rows('.selected').data()); */
            var term = [];

            /* get selected row count and its data */
            var count = txTbls.rows('.selected').data().length;
            var item = txTbls.rows('.selected').data();

            /* check to prevent deletion for taxonomy which has any terms */
            for (var h = 0; h <= count - 1; h++) {
                term[h] = parseInt(item[h][5]); /* [5] fifth column on row containing Parent ID */
            };

            var chTerm = term.filter(function(count){ return (count > 0) });
            var hasTerm = (chTerm == '') ? 0 : 1;

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                if(hasTerm == 0){ /* if each item has no term */
                    $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Taksonomi', function(r){
                        if(r){
                            for (var i = 0; i <= count - 1; i++) {
                                console.log(item[i][1]); /* [1] second column on row containing ID */
                                var did = item[i][1];
                                $.post( '/references/delete_taxonomy/' + did );
                            };
                            location.reload(); 
                        }
                    });            
                }else{
                    $.messager.alert('Delete Confirmation','Taxonomy tidak dapat dihapus, salah satu item terpilih memiliki Term','error');                
                }
            }else{
                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk penghapusan','warning');                
            } 

        });
    }); /* end of jquery on ready */

    function saveData(){
        $('#addForm').form('submit', {
            url: '/references/save_taxonomy',
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
            url: '/references/save_taxonomy',
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
    
    function showTxUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_taxonomy',
            data: {tid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);
                
                /* render edit form */
                $('#tx_id').val(eda.id);
                $('#tx_name').val(eda.name);
                $('#tx_desc').val(eda.description);

                $('#tx_parent').combobox({
                    url:'/references/get_form_tx_parent_item',
                    method:'post',
                    queryParams: {tid:eda.id},
                    valueField: 'id',
                    textField: 'name',
                    multiple: false,
                    panelHeight: 'auto'
                });

                if(eda.parent > 0){ 
                    $('#tx_parent').combobox('select',eda.parent); 
                }

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }

        });
    }
</script>