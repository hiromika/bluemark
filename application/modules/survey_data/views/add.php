<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">                            
                <div class="box-body">
                    <ul id="tree-data-survey" class="easyui-tree" data-options="url:'/survey_data/get_tree_node',method:'get',animate:true,lines:true"></ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-9" id="list-survey-data">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class=""><a href="#dokumen" data-toggle="tab" aria-expanded="false">Dokumen</a></li>
                        <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Detail</a></li>
                        <li class="pull-left header"><?php echo $name; ?></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="detail">
                            <form role="form">
                                <?php foreach($detail as $key => $value) { ?>
                                    <div class="form-group">
                                        <label><?php echo $value['label']; ?></label>
                                    <?php
                                        switch ($value['type']) {
                                        case 1: //textfield
                                            echo '<input type="text" class="form-control" placeholder="" value="'.$value["value"].'">';
                                            break;
                                        case 2: //numberfield
                                            echo '<input type="text" class="form-control" placeholder="" value="'.$value["value"].'">';
                                            break;
                                        case 3: //datefield
                                            echo '<input type="text" class="form-control" placeholder="" value="'.$value["value"].'">';
                                            break;
                                        case 4: //combo
                                            echo    '<br><input id="'.$value['name'].'" name="'.$value['name'].'" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                                    data-options="
                                                        url:\'/survey_data/get_data_combo_taxonomy\',
                                                        method:\'post\',
                                                        queryParams: {id:"'.$value['taxonomy_id'].'"},
                                                        valueField: \'id\',
                                                        textField: \'name\',
                                                        multiple: false,
                                                        panelHeight: \'auto\'
                                                    " />';
                                            break;
                                        case 5: //checkbox
                                            echo    '<br><input id="'.$value['name'].'" name="'.$value['name'].'" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                                    data-options="
                                                        url:\'/survey_data/get_data_combo_taxonomy\',
                                                        method:\'post\',
                                                        queryParams: {id:"'.$value['taxonomy_id'].'"},
                                                        valueField: \'id\',
                                                        textField: \'name\',
                                                        multiple: false,
                                                        panelHeight: \'auto\'
                                                    " />';
                                            break;
                                        case 6: //radio
                                            echo    '<br><input id="'.$value['name'].'" name="'.$value['name'].'" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                                    data-options="
                                                        url:\'/survey_data/get_data_combo_taxonomy\',
                                                        method:\'post\',
                                                        queryParams: {id:"'.$value['taxonomy_id'].'"},
                                                        valueField: \'id\',
                                                        textField: \'name\',
                                                        multiple: false,
                                                        panelHeight: \'auto\'
                                                    " />';
                                            break;
                                        case 999: //taxonomy
                                            echo    '<br><input id="'.$value['name'].'" name="'.$value['name'].'" class="easyui-combobox text" style="width:100%;height:34px;font-size:18px;padding:6px 12px;" 
                                                    data-options="
                                                        url:\'/survey_data/get_data_combo_taxonomy\',
                                                        method:\'post\',
                                                        queryParams: {id:'.$value['taxonomy_id'].'},
                                                        valueField: \'id\',
                                                        textField: \'name\',
                                                        multiple: false,
                                                        panelHeight: \'auto\'
                                                    " />';
                                            break;
                                        }
                                    ?>    
                                    </div>
                                <?php } ?>
                                <hr>
                                <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan data Ruas');"><i class="fa fa-trash"></i> Hapus</button>
                                <a href="/survey_data" class="btn btn-default pull-right">Halaman List</a>
                            </form>
                        </div>

                        <div class="tab-pane" id="dokumen">
                            <p class="margin">
                                <a class="btn btn-app" href="/survey_data/add_ruas_file">
                                    <span class="fa fa-upload"></span>
                                    Upload
                                </a>
                            </p>

                            <div class="nav-tabs-custom">
                                <ul class="nav nav-pills">
                                    <?php
                                        foreach ($doctype as $dkey => $dvalue) {
                                            if($dkey == 0) { $active = 'active'; } else { $active = ''; }
                                            echo '<li class="'.$active.'"><a href="#doc_'.$dvalue['id'].'" data-toggle="tab" aria-expanded="false">'.$dvalue['name'].'</a></li>';
                                        }
                                    ?>

                                </ul>
                                <div class="tab-content">
                                    <?php
                                        foreach ($doctype as $dkey2 => $dvalue2) {
                                            if($dkey2 == 0) { $active = 'active'; } else { $active = ''; }
                                            echo '<div class="tab-pane '.$active.'" id="doc_'.$dvalue2['id'].'">
                                                <table id="tbldoc_'.$dvalue2['id'].'" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Nama Dokumen</th>
                                                            <th>Unit Kerja</th>
                                                            <th>Arsip</th>
                                                            <th width="18%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>id</td>
                                                            <td>SR112315</td>
                                                            <td>lorem-ipsum.jpg</td>
                                                            <td>Tata Usaha</td>
                                                            <td>Cabinet 1, Rack 2, Box 1</td>
                                                            <td>
                                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                                    <a class="btn btn-default">Detail</a>
                                                                    <a class="btn btn-danger" onclick="confirm(\'Konfirmasi penghapusan file\')">Delete</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
    
    function viewSurveyData(contenttype){
        $.ajax({
            url: "/survey_data/nodedetail/" + contenttype,
            context: $('#list-survey-data')
        }).done(function(data) {
            $(this).html(data);
        });
    }
    
    <?php
    /*
    foreach ($doctype as $dkey3 => $dvalue3) { ?>
        var doc_<?php echo $dvalue3['id'];?> = $('#tbldoc_<?php echo $dvalue3['id'];?>').DataTable( {
            'ajax': '/survey_data/get_doc_list/' + <?php echo $nodeid; ?> + '/' + <?php echo $dvalue3['id']; ?>,
            'serverside': true,
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'order': [[2, 'asc']],
            'info': true,
            'autoWidth': false
        });
    
    <?php } */?>

    <?php foreach($detail as $key => $value) { ?>
        <?php
            switch ($value['type']) {
                case 4: //combo
                    echo    "$('#".$value["name"]."').combobox('select',".$value["value"].");";
                    break;
                case 999: //taxonomy
                    echo    "$('#".$value["name"]."').combobox();";
                    break;
            }
        ?>    
    <?php } ?>

    $(function () {
        $('#tree-data-survey').tree();
        $('#tree-data-survey').tree({
            onLoadSuccess: function(){
                var find = $('#tree-data-survey').tree('find','<?php echo $id; ?>');console.log(find);
                $('#tree-data-survey').tree('select',find.target);
                var selected = $('#tree-data-survey').tree('getSelected');
                
            },
            onSelect: function(node){
                if(node.type === 'node'){
                    viewSurveyData(node.dbid);
                } else if(node.type === 'ct'){
                    viewCtData(node.dbid);
                }
            }
        });
        
    }); /* end of jquery on ready */
</script>