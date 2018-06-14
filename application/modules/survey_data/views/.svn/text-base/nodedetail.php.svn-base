<div class="col-xs-12">
    
    <div class="box">
        <div class="box-header">
            <?php echo $name; ?>
            <br>
        </div>
        <div class="box-body">
            <form role="form" id="form-upload" method="post" enctype="multipart/form-data">
            <div class="box-group" id="accordion">
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3;">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Area Identitas
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="editid" value="<?php echo @$svdata['id']; ?>">
                                <label>No. Dokumen</label>
                                <input name="nodoc" value="<?php echo @$svdata['document_no']; ?>" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true" >
                            </div>
                            <div class="form-group">
                                <label>Judul Dokumen</label>
                                <input name="titledoc" value="<?php echo @$svdata['document_title']; ?>" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembuatan</label><br>
                                <input name="created_date" value="<?php //echo @$svdata['document_created_date']; ?>" id="created_date" class="form-control" style="width:150px">
                            </div>
                            <div class="form-group">
                                <label>Unit Kerja</label>
                                <select class="form-control" name="doc_unit">
                                    <?php
                                    foreach($units as $kunit => $unit){
                                        if(@$svdata['unit_id'] == $unit['id']){
                                            echo '<option value="'.$unit['id'].'" selected>'.$unit['name'].'</option>';
                                        }else{
                                            echo '<option value="'.$unit['id'].'">'.$unit['name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label>Tipe Media</label><br>
                                <input type="radio" name="media_type" value="1" <?php if(@$svdata['media_type'] == 1){ echo 'checked'; } ?>> 
                                    Audio<br>
                                <input type="radio" name="media_type" value="2" <?php if(@$svdata['media_type'] == 2){ echo 'checked'; } ?>> 
                                    Video<br>
                                <input type="radio" name="media_type" value="3" <?php if(@$svdata['media_type'] == 3){ echo 'checked'; } ?>> 
                                    Document
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3;">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            Area Titik Temu
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Gedung</label>
                                <input name="gedung" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Lantai</label>
                                <input name="lantai" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Ruang</label>
                                <input name="ruang" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Rak</label>
                                <input name="rak" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Box</label>
                                <input name="box" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Klasifikasi Arsip</label>
                                <input value="<?php echo @$svdata['klasifikasi_arsip']; ?>" name="klasifikasi" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3;">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                            Area Deskripsi
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Deskripsi Arsip/Abstrak</label>
                                 <textarea name="deskripsi" class="form-control" rows="4"><?php echo @$svdata['abstrak']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kategori Arsip</label><br>
                                <input type="radio" name="category" value="1" <?php if(@$svdata['category_arsip'] == 1){ echo 'checked'; } ?>> 
                                    Series<br>
                                <input type="radio" name="category" value="2" <?php if(@$svdata['category_arsip'] == 2){ echo 'checked'; } ?>> 
                                    Folder<br>
                                <input type="radio" name="category" value="3" <?php if(@$svdata['category_arsip'] == 3){ echo 'checked'; } ?>> 
                                    Document<br>
                                <input type="radio" name="category" value="4" <?php if(@$svdata['category_arsip'] == 4){ echo 'checked'; } ?>> 
                                    Item
                            </div>
                            <div class="form-group">
                                <label>Kata Kunci</label>
                                <input value="<?php echo @$svdata['kata_kunci']; ?>" name="kunci" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Format</label><br>
                                <input type="radio" name="file_format" value="1" <?php if(@$svdata['format'] == 1){ echo 'checked'; } ?>> 
                                    Fisik<br>
                                <input type="radio" name="file_format" value="2" <?php if(@$svdata['format'] == 2){ echo 'checked'; } ?>> 
                                    Elektronik<br>
                            </div>
                            <div class="form-group">
                                <label>Status</label><br>
                                <input type="radio" name="file_status" value="1" <?php if(@$svdata['status'] == 1){ echo 'checked'; } ?>> 
                                    Aktif<br>
                                <input type="radio" name="file_status" value="2" <?php if(@$svdata['status'] == 2){ echo 'checked'; } ?>> 
                                Inaktif<br>
                                <input type="radio" name="file_status" value="3" <?php if(@$svdata['status'] == 3){ echo 'checked'; } ?>> 
                                    Dinilai Kembali<br>
                                <input type="radio" name="file_status" value="4" <?php if(@$svdata['status'] == 4){ echo 'checked'; } ?>> 
                                    Permanen<br>
                                <input type="radio" name="file_status" value="5" <?php if(@$svdata['status'] == 5){ echo 'checked'; } ?>> 
                                    Musnah<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3;">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                            Area Akses
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Area Akses</label><br>
                                <input type="radio" name="file_akses" value="1" <?php if(@$svdata['area_akses'] == 1){ echo 'checked'; } ?>> 
                                    Rahasia<br>
                                <input type="radio" name="file_akses" value="2" <?php if(@$svdata['area_akses'] == 2){ echo 'checked'; } ?>> 
                                    Biasa<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                            Area Objek Digital
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload Dokumen</label>
                                        <input type="file" name="doc_file">
                                        <p class="help-block">pdf, jpg, jpeg, png <br> Max. 50 MB</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu</label>
                                        <input value="<?php //echo @$svdata['waktu']; ?>" id="waktu" name="waktu" type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true" style="width:150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul id="list-file">
                                        <?php
                                        if($files){
                                            foreach($files as $kfile => $file){
                                                echo '<li id="file-'.$file['id'].'"><span><a href="'.  base_url().'/files/'.$file['name'].'">'.$file['name'].'</a></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="hapusfile('.$file['id'].')">hapus</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn btn-primary pull-left" onclick="upload_file()"><i class="fa fa-save"></i> Upload</div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary" style="border-top: 3px solid #c3c3c3;">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                            Area Identitas Tambahan
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="form-group">
                                <label>No. Ruas</label>
                                <select class="form-control" name="ruas_id">
                                    <?php
                                    foreach($ruass as $kruas => $ruas){
                                        if(@$svdata['ruas_id'] == $ruas['id']){
                                            echo '<option selected value="'.$ruas['id'].'">'.$ruas['name'].'</option>';
                                        }else{
                                            echo '<option value="'.$ruas['id'].'">'.$ruas['name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Ruas</label>
                                <input type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Propinsi</label>
                                <input type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                            <div class="form-group">
                                <label>Tipe Dokumen</label>
                                <input type="text" class="form-control easyui-validatebox" placeholder="" data-options="required:true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <br>
            <div class="btn btn-primary pull-right" onclick="submit_data()"><i class="fa fa-save"></i> Simpan</div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col-xs-12 -->

<script type="text/javascript">
    
    $(function () {
                
        $('#created_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale:{
                format: "YYYY-MM-DD"
            },
            <?php if(@$svdata['document_created_date'] != ''): ?>
                startDate: "<?php echo @$svdata['document_created_date']; ?>"
            <?php endif; ?>
        });

        $('#waktu').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePickerSeconds: true,
            locale:{
                format: "YYYY-MM-DD hh:mm:ss"
            },
            <?php if(@$svdata['waktu'] != ''): ?>
                startDate: "<?php echo @$svdata['waktu']; ?>"
            <?php endif; ?>
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
    
    function submit_data() {
        console.log('submit data...');
        $('#form-upload').form('submit', {
            url: '/survey_data/submit_data/' + <?php echo $nodeid; ?> + '/' + <?php echo $tipedocid ?>,
            onSubmit: function() {
                
            },
            success: function(result) {
                //location.reload();
            }
        });
    }
    
    function upload_file() {
        console.log('submit data...');
        $('#form-upload').form('submit', {
            url: '/survey_data/upload_file/' + <?php echo $aid; ?>,
            onSubmit: function() {
                
            },
            success: function(result) { 
                $('#list-file').append(result);
                //location.reload();
            }
        });
    }
    
    function hapusfile(id) {
        console.log('hapus data...');
        $.ajax({
            type: 'POST',
            url: '/survey_data/hapusfile',
            data: {id: id},
            success: function (result){
                $('#file-'+id).remove();
            }

        });
    }
</script>

<?php //print_r($svData); ?>