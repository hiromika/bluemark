<div class="col-xs-12">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="display:block;clear:both;margin-bottom:0;"><?php echo $name; ?></h3>
            <?php echo $tipedoc; ?>
        </div>
        <div class="box-body">
            <p class="margin">
                <a data-acl="add_city" class="btn btn-app" onclick="addItem(<?php echo $nid; ?>,<?php echo $tipedocid; ?>)">
                    <span class="glyphicon glyphicon-plus"></span>
                    Tambah
                </a> 
                <a data-acl="delete_city" class="btn btn-app" id="delAIButton">
                    <span class="glyphicon glyphicon-trash"></span>
                    Hapus
                </a> 
            </p>

            <table id="aiTbls" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="2%"></th>
                        <th width="2%"></th>
                        <th>No Dokumen</th>
                        <th>Judul Dokumen</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Unit Kerja</th>
                        <th>Tipe Media</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>                            
                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col-xs-12 -->

<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="parent" type="hidden" class="form-control" placeholder="" value="<?php echo $parent; ?>">
                    <input name="content_type_id" type="hidden" class="form-control" placeholder="" value="<?php echo $content_type_id; ?>">
                    <?php
                    foreach($columns as $ckeys => $cvalue){
                        //var_dump($cvalue['type']);
                        echo '<div class="form-group">';
                        echo '<label>'.$cvalue['label'].'</label>';
                        echo '<br>';
                        switch ($cvalue['type']) {
                            case 1: //textfield
                                echo '<input type="text" class="form-control" placeholder="" name="'.$cvalue['name'].'">';
                                break;
                            case 2: //numberfield
                                echo '<input type="text" class="form-control" placeholder="" name="'.$cvalue['name'].'">';
                                break;
                            case 3: //datefield
                                echo '<input type="text" class="form-control" placeholder="" name="'.$cvalue['name'].'">';
                                break;
                            case 4: //combo
                                echo    '<input id="'.$cvalue['name'].'" name="'.$cvalue['name'].'" class="easyui-combobox" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                        data-options="
                                            url:\'/survey_data/get_data_combo_taxonomy\',
                                            method:\'post\',
                                            queryParams: {id:"'.$cvalue['taxonomy_id'].'"},
                                            valueField: \'id\',
                                            textField: \'name\',
                                            multiple: false,
                                            panelHeight: \'auto\'
                                        " />';
                                break;
                            case 5: //checkbox
                                echo    '<input id="'.$cvalue['name'].'" name="'.$cvalue['name'].'" class="easyui-combobox" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                        data-options="
                                            url:\'/survey_data/get_data_combo_taxonomy\',
                                            method:\'post\',
                                            queryParams: {id:"'.$cvalue['taxonomy_id'].'"},
                                            valueField: \'id\',
                                            textField: \'name\',
                                            multiple: false,
                                            panelHeight: \'auto\'
                                        " />';
                                break;
                            case 6: //radio
                                echo    '<input id="'.$cvalue['name'].'" name="'.$cvalue['name'].'" class="easyui-combobox" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                        data-options="
                                            url:\'/survey_data/get_data_combo_taxonomy\',
                                            method:\'post\',
                                            queryParams: {id:"'.$cvalue['taxonomy_id'].'"},
                                            valueField: \'id\',
                                            textField: \'name\',
                                            multiple: false,
                                            panelHeight: \'auto\'
                                        " />';
                                break;
                            case 999: //node ref
                                /*
                                echo    '<select id="'.$cvalue['name'].'" name="'.$cvalue['name'].'" class="easyui-combobox" style="width:100%;height:34px;font-size:18px;padding:6px 12px;" 
                                        data-options="
                                            url:\'/survey_data/get_data_combo_content\',
                                            method:\'post\',
                                            queryParams: {id:'.$cvalue['content_reference'].'},
                                            valueField: \'id\',
                                            textField: \'name\',
                                            multiple: false,
                                            panelHeight: \'auto\'
                                        " />';
                                */
                                echo '<select class="easyui-combobox" name="state" style="width:100%;height:34px;font-size:18px;padding:6px 12px;">';
                                    foreach($cvalue['combo_data'] as $cdata => $cval){                                        
                                        echo '<option value="'.$cval['id'].'">'.$cval['name'].'</option>';
                                    }
                                    //<option value="WY">Wyoming</option>
                                echo '</select>';
                                break;
                            }
                        echo '</div>';
                    }
                    ?>
                    
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

        var aiTbls = $('#aiTbls').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '/survey_data/get_area_identity_list/' + <?php echo $nid; ?> + '/' + <?php echo $tipedocid; ?>,
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

        $('#aiTbls tbody').on('click', 'input', function () {
            var sdata = aiTbls.row( $(this).parents('tr') ).data();

            $(this).parents('tr').toggleClass('selected');
            /* console.log(aiTbls.row( this ).data()); */
        }); 

        $('#delAIButton').click( function(){
            /* console.log(aiTbls.rows('.selected').data()); */
            var term = [];

            /* get selected row count and its data */
            var count = aiTbls.rows('.selected').data().length;
            var item = aiTbls.rows('.selected').data();

            /* perform deletion */
            if(count > 0){ /* if has selected count >= 1 */
                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' item', function(r){
                    if(r){
                        for (var i = 0; i <= count - 1; i++) {
                            console.log(item[i][1]); /* [1] second column on row containing ID */
                            var did = item[i][1];
                            $.post( '/survey_data/delete_area_detail/' + did );
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
            url: '/survey_data/save_survey_data',
            onSubmit: function() {
                
            },
            success: function(result) {
                location.reload();
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
    
    function showAIUpdateModal(id){
        $.ajax({
            type: 'POST',
            url: '/survey/get_area_detail',
            data: {aid: id},
            success: function (result){
                var eda = jQuery.parseJSON(result);
                
                
                /* toggle edit modal */
                $('#editModal').modal('toggle');
            }

        });
    }
    $(function () {
        setTimeout(function(){
            <?php foreach($columns as $columnkey => $columnvalue) { ?>
        <?php
            switch ($columnvalue['type']) {
                case 4: //combo
                    echo    "$('#".$columnvalue["name"]."').combobox();";
                    break;
                case 5: //combo
                    echo    "$('#".$columnvalue["name"]."').combobox();";
                    break;
                case 6: //combo
                    echo    "$('#".$columnvalue["name"]."').combobox();";
                    break;
                case 999: //taxonomy
                    echo    "$('#".$columnvalue["name"]."').combobox();";
                    break;
            }
        ?>    
    <?php } ?>
        },1000);
    
    });
    
    function getDetail(id){
        $.ajax({
            url: "/survey_data/nodeedit/" + id,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
        });
    }
    
    function addItem(nid,docid){
        $.ajax({
            url: "/survey_data/add" + "/" + nid + "/" + docid,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
        });
    }
    
</script>