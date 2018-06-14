<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body">
                    <p class="margin">
                        <a data-acl="add_archive" class="btn btn-app" data-toggle="modal" data-target="#addModal">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a data-acl="delete_archive" class="btn btn-app" id="delACButton">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> 
                    </p>
                    <table id="acTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%">ID</th>
                                <th>Kode</th>
                                <th>Nama Gedung</th>
                                <th>Alamat</th>
                                <th>Lantai</th>
                                <th>Ruang</th>
                                <th>Rak/Kabinet</th>
                                <th>Box</th>
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
                <h4 class="modal-title">Tambah Lokasi Arsip</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input name="ac_id" type="hidden" class="form-control" placeholder="" value="">
                            <div class="form-group">
                                <label>Kode Arsip</label>
                                <input name="ac_code" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Nama Gedung</label>
                                <input name="ac_building_name" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Alamat Gedung</label>
                                <textarea name="ac_building_address" class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lantai</label>
                                <input name="ac_floor" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Ruang</label>
                                <input name="ac_room" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>No. Rak</label>
                                <input name="ac_rack" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>No. Box</label>
                                <input name="ac_box" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="ac_desc" class="form-control" rows="3" placeholder=""></textarea>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Lokasi Arsip</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="ac_id" name="ac_id" type="hidden" class="form-control" placeholder="" value="">
                            <div class="form-group">
                                <label>Kode Arsip</label>
                                <input id="ac_code" name="ac_code" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Nama Gedung</label>
                                <input id="ac_building_name" name="ac_building_name" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Alamat Gedung</label>
                                <textarea id="ac_building_address" name="ac_building_address" class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lantai</label>
                                <input id="ac_floor" name="ac_floor" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Ruang</label>
                                <input id="ac_room" name="ac_room" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>No. Rak</label>
                                <input id="ac_rack" name="ac_rack" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>No. Box</label>
                                <input id="ac_box" name="ac_box" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="ac_desc" name="ac_desc" class="form-control" rows="3" placeholder=""></textarea>
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
        var acTbls = $('#acTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_archive_list',
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

        $('#acTbls tbody').on('click', 'input', function () {
            var sdata = acTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        }); 

        $('#delACButton').click( function(){
            /* get selected row count and its data */
            var count = acTbls.rows('.selected').data().length;
            var item = acTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Arsip', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_archive/' + did );
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
            url: '/references/save_archive',
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
            url: '/references/save_archive',
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

    function showACUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_archive',
            data: {acid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#ac_id').val(eda.id);
                $('#ac_code').val(eda.code);
                $('#ac_building_name').val(eda.building_name);
                $('#ac_building_address').val(eda.building_address);
                $('#ac_floor').val(eda.floor);
                $('#ac_room').val(eda.cabinet);
                $('#ac_rack').val(eda.rack);
                $('#ac_box').val(eda.box);
                $('#ac_desc').val(eda.description);

                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }
        });
    }
</script>