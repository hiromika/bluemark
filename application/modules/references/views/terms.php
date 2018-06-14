<?php //echo $taxonomy['id']; ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
            	<div class="box-body">
                    <dl class="well well-sm">
                        <dt>Taksonomi : <?php echo $taxonomy['name']; ?></dt>
                        <dd><?php echo $taxonomy['description']; ?></dd>
                    </dl>

                    <p class="margin">
                        <a class="btn btn-app" data-toggle="modal" data-target="#addTermModal" data-acl="add_taxonomy_term">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> 
                        <a class="btn btn-app" id="delTrmButton" data-acl="delete_taxonomy_term">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a>                         
                        <a href="/references/taxonomy" class="btn btn-app pull-right">
                            <span class="glyphicon glyphicon-list"></span>
                            Taksonomi
                        </a> 
                    </p>

                    <table id="trmTbls" class="table table-bordered table-hover">
                    	<thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="2%"><ID/th>
                                <th>Nama</th>
                                <th width="10%">Actions</th>
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

<div id="addTermModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Term</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="trm_id" type="hidden" class="form-control" placeholder="" value="">
                    <input name="trm_tx_id" type="hidden" class="form-control" placeholder="" value="<?php echo $taxonomy['id']; ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="trm_label" type="text" class="form-control" placeholder="">
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

<div id="editTermModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Term</h4>
            </div>
            <form id="updateForm" role="form" method="post">
                <div class="modal-body">
                    <input id="trm_id" name="trm_id" type="hidden" class="form-control" placeholder="" value="">
                    <input id="trm_tx_id" name="trm_tx_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="trm_label" name="trm_label" type="text" class="form-control" placeholder="" value="">
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
        var trmTbls = $('#trmTbls').DataTable( {
            'processing': true,
            'serverSide': true,
            'ajax': '/references/get_term_list/' + <?php echo $taxonomy['id']; ?>,
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

        $('#trmTbls tbody').on('click', 'input', function () {
            var sdata = trmTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
        });

        $('#delTrmButton').click( function(){

            var count = trmTbls.rows('.selected').data().length;
            var item = trmTbls.rows('.selected').data();

            if(count > 0){
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item Term', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/references/delete_term/' + did );
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
            url: '/references/save_term',
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
            url: '/references/save_term',
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

    function showTrmUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/references/edit_term',
            data: {trmid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);

                /* render edit form */
                $('#trm_id').val(eda.id);
                $('#trm_tx_id').val(eda.taxonomy_id);
                $('#trm_label').val(eda.label);

                /* toggle edit modal */
                $('#editTermModal').modal('toggle');
            }
        });
    }
</script>