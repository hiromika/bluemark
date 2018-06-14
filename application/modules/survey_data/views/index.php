<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">                            
                <div class="box-body">
                    <p class="margin">
                        <button class="btn btn-default" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus"></span> Tambah Dokumen</button>
                                           </p>
                    <ul id="tree-data-survey" class="easyui-tree" data-options="url:'/survey_data/get_tree_node',method:'get',animate:true,lines:true"></ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-9" id="list-survey-data">
            <div class="box">
                <div class="box-body">
                    <div>
                        <p class="text-center" style="padding:20px 25px;">Pilih salah satu konten pada panel bagian kiri untuk dapat melakukan <br> proses manajemen konten.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header red-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Dokumen</h4>
            </div>
            <form id="addForm" role="form" method="post">
                <div class="modal-body">
                    <input name="n_id" type="hidden" class="form-control" placeholder="" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="n_attr_value" type="text" class="form-control" placeholder="">
                    </div>                                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="saveNode()"><i class="fa fa-floppy-o"></i> &nbsp; Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    
    function viewSurveyData(nodeid){
        $.ajax({
            url: "/survey_data/nodedetail/" + nodeid,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
        });
    }
    
    function viewCtData(contenttype,node,doctype){
        
        $.ajax({
            url: "/survey_data/nodelist/" + contenttype + "/" + node + "/" + doctype,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
            
        });
    }
    
    function addContent() {
        var selected = $('#tree-data-survey').tree('getSelected');
        if(selected.type === 'ct'){
            var selid = selected.id;
            var parent = selected.parent;
            window.location = '/survey_data/add/' + selid + '/' + parent;
        }
    }

    function saveNode(){
        $('#addForm').form('submit', {
            url: '/survey_data/save_node',
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


    $(function () {
        $('#tree-data-survey').tree({
            onSelect: function(node){
                if(node.type === 'dt'){
                    viewCtData(node.ctid,node.parent,node.id);
                } else{
                    $('#list-survey-data').html('<div class="box"><div class="box-body"><div><p class="text-center" style="padding:20px 25px;">Pilih salah satu konten pada panel bagian kiri untuk dapat melakukan <br> proses manajemen konten.</p></div></div></div>');
                }
            }
        });
    }); /* end of jquery on ready */
</script>