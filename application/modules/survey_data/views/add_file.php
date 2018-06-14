<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <ul id="tree-data-survey" class="easyui-tree" data-options="url:'/survey_data/get_tree_node',method:'get',animate:true,lines:true"></ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box">
            	<div class="box-header">
                    <h3 class="box-title">Tambah File</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form role="form" id="form-upload" method="post" enctype="multipart/form-data">
                        <input name="node" type="hidden" class="form-control" placeholder="" value="<?php echo $nodeid; ?>">
                        <div class="form-group">
                            <label>Tipe Dokumen</label>
                            <select class="form-control" name="doc_type_id">
                                <?php
                                foreach($doc_type as $type => $doc){
                                    echo '<option value="'.$doc['id'].'">'.$doc['name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control" placeholder="" name="doc_no">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Halaman</label>
                            <input type="text" class="form-control" placeholder="" name="page_total">
                        </div>
                        <div class="form-group">
                            <label>Arsip</label>
                            <select class="form-control" name="archive_id">
                                <?php
                                foreach($racks as $rkey => $ars){
                                    echo '<option value="'.$ars['id'].'">'.$ars['code'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="doc_file">
                            <p class="help-block">Ext. pdf, jpg, jpeg, png <br> Max. 50 MB</p>
                        </div>
                        <hr>
                        <div class="btn btn-primary" onclick="submit_upload()"><i class="fa fa-save"></i> Simpan</div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function submit_upload() {
        console.log('submit upload...');
        $('#form-upload').form('submit', {
            url: '/survey_data/upload_file',
            onSubmit: function() {
                
            },
            success: function(result) {
                location.reload();
            }
        });
    }
    
    function viewSurveyData(contenttype){
        $.ajax({
            url: "/survey_data/nodedetail/" + contenttype,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
        });
    }
    
    function viewCtData(contenttype,parent){
        $.ajax({
            url: "/survey_data/nodelist/" + contenttype + '/' + parent,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
            
        });
    }
    
    $(function () {
        $('#tree-data-survey').tree({
            onSelect: function(node){
                if(node.type === 'node'){
                    viewSurveyData(node.dbid);
                } else if(node.type === 'ct'){
                    viewCtData(node.dbid,node.parent);
                }
            }
        });
    });
</script>