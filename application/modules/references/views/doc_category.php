<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">
                    <p class="margin">
                        <a data-acl="add_doc_cat" class="btn btn-app" data-toggle="modal" data-target="#addModal">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a data-acl="delete_doc_cat" class="btn btn-app" id="delDCButton">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> 
                    </p>
                    <table id="dcTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%">ID</th>
                                <th>Nama</th>
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
                <h4 class="modal-title">Tambah Kategori Dokumen</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="dc_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="dc_name" type="text" class="form-control" placeholder="">
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
                <h4 class="modal-title">Edit Kategori Dokumen</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="dc_id" name="dc_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="dc_name" name="dc_name" type="text" class="form-control" placeholder="" value="">
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
        var dcTbls = $('#dcTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_doc_cat_list',
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

         $('#dcTbls tbody').on('click', 'input', function () {
            var sdata = dcTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        }); 

        $('#delDCButton').click( function(){
            /* get selected row count and its data */
            var count = dcTbls.rows('.selected').data().length;
            var item = dcTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Arsip', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_doc_cat/' + did );
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
            url: '/references/save_doc_cat',
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
            url: '/references/save_doc_cat',
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

    function showDCUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_doc_cat',
            data: {dcid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#dc_id').val(eda.id);
                $('#dc_name').val(eda.name);

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }
        });
    }
</script>