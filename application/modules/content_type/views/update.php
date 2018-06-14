<div class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
                    <h3 class="box-title">Data Tree</h3>
                </div>
                <div class="box-body">
                	<a data-acl="add_content_type" href="/content_type/add" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i> Tambah Tipe</a>
                    
                    <ul id="ctDT3" class="easyui-tree" 
                        data-options="url:'/content_type/get_content_type_treedata',
                        method:'get',
                        lines:true">
                    </ul>
                </div>
			</div>
		</div><!-- /.col-md-3 -->

		<div class="col-md-9">
			<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail</h3>
                </div>
                <form id="updateForm" role="form" method="post">
                    <div class="box-body">
                        <input type="hidden" name="ct_id" value="<?php echo $dt['ct_id'] ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="ct_name" type="text" class="form-control" value="<?php echo $dt['ct_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="ct_desc" class="form-control" rows="3"><?php echo $dt['ct_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Parent</label><br>
                            <input id="ctParent" name="ct_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                data-options="
                                    url:'/content_type/get_form_ct_parent_item',
                                    method:'post',
                                    queryParams: {ctid:<?php echo $dt['ct_id']; ?>, slct:<?php echo $dt['ct_parent']; ?>},
                                    valueField: 'id',
                                    textField: 'name',
                                    multiple: false,
                                    panelHeight: 'auto'
                                " />
                        </div>

                        <hr>
                        <h4>Attribut</h4>
                        <table id="attrTbl" class="table">
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>System name</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Required</th>
                                    <th title="Show in table">Table</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $marker = 1;
                            foreach ($dt['attributes'] as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="attributes[cta_id][<?php echo $value['cta_id']; ?>][]" type="text" class="form-control" value="<?php echo $value['cta_id']; ?>">
                                        <input id="cta_label<?php echo $value['cta_id']; ?>" name="attributes[cta_label][<?php echo $value['cta_id']; ?>][]" type="text" class="form-control" value="<?php echo $value['cta_label']; ?>" onkeyup="setCTAName(this.value, this.id)">
                                    </td>
                                    <td>
                                        <input id="cta_name<?php echo $value['cta_id']; ?>" name="attributes[cta_name][<?php echo $value['cta_id']; ?>][]" type="text" class="form-control" value="<?php echo $value['cta_name']; ?>" readonly>
                                    </td>
                                    <td>
                                        <select id="cta_type<?php echo $value['cta_id']; ?>" name="attributes[cta_type][<?php echo $value['cta_id']; ?>][]" class="form-control" onchange="check4Ref(this.value, this.id)">
                                            <option value="1" <?php echo $ch1 = ($value['cta_type'] == 1) ? 'selected' : ''; ?>>Text</option>
                                            <option value="2" <?php echo $ch2 = ($value['cta_type'] == 2) ? 'selected' : ''; ?>>Number</option>
                                            <option value="3" <?php echo $ch3 = ($value['cta_type'] == 3) ? 'selected' : ''; ?>>Date</option>
                                            <option value="4" <?php echo $ch4 = ($value['cta_type'] == 4) ? 'selected' : ''; ?>>Combo</option>
                                            <option value="5" <?php echo $ch5 = ($value['cta_type'] == 5) ? 'selected' : ''; ?>>Checkbox</option>
                                            <option value="6" <?php echo $ch6 = ($value['cta_type'] == 6) ? 'selected' : ''; ?>>Radio</option>
                                            <option value="999" <?php echo $ch999 = ($value['cta_type'] == 999) ? 'selected' : ''; ?>>Node Reference</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php $selected = ''; ?>
                                        <input id="cta_ref<?php echo $value['cta_id']; ?>" name="attributes[cta_ref][<?php echo $value['cta_id']; ?>][]" class="easyui-combobox text" style="width:175px;height:34px;font-size:18px;" 
                                            data-options="
                                                method:'post',
                                                <?php if($value['cta_type'] == 999): 
                                                    $selected = $value['cta_cref']; ?>
                                                    url:'/content_type/get_form_ct_parent_item',
                                                <?php elseif ($value['cta_type'] == 4 || $value['cta_type'] == 5 || $value['cta_type'] == 6) : 
                                                    $selected = $value['cta_txid']; ?>
                                                    url:'/content_type/get_form_tx_parent_item',
                                                <?php endif; ?>
                                                valueField: 'id',
                                                textField: 'name',
                                                multiple:false,
                                                panelHeight:'auto',
                                                onLoadSuccess: function(){
                                                    if(<?php echo $value['cta_type']; ?> == 999 || <?php echo $value['cta_type']; ?> == 4 || <?php echo $value['cta_type']; ?> == 5 || <?php echo $value['cta_type']; ?> == 6){
                                                        $(this).combobox('enable');
                                                        $(this).combobox('select','<?php echo $selected; ?>');
                                                    }
                                                }
                                                " 
                                                <?php echo $state = ($value['cta_type'] == 999 || $value['cta_type'] == 4 || $value['cta_type'] == 5 || $value['cta_type'] == 6) ? '' : 'disabled'; ?>
                                                />                        
                                    </td>
                                    <td>
                                        <input id="cta_req<?php echo $value['cta_id']; ?>" name="attributes[cta_req][<?php echo $value['cta_id']; ?>][]" class="easyui-switchbutton" data-options="onText:'Ya',offText:'Tidak'" 
                                        <?php echo $ch7 = ($value['cta_req'] == 1) ? 'checked' : ''; ?>>
                                    </td>
                                    <td>
                                        <input id="cta_sit<?php echo $value['cta_id']; ?>" name="attributes[cta_sit][<?php echo $value['cta_id']; ?>][]" class="easyui-switchbutton" data-options="onText:'Ya',offText:'Tidak'" title="Show this attribute on list table" 
                                        <?php echo $ch7 = ($value['cta_sit'] == 1) ? 'checked' : ''; ?>>
                                    </td>
                                    <td>
                                        <?php if($marker > 1): ?>
                                        <a data-acl="manage_content_type_attr" href="#" id="<?php echo $value['cta_id'] ?>" class="rmvField"><i class="fa fa-close"></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php $marker++;
                            endforeach; ?>
                            </tbody>
                        </table>

                        <hr>
                        <a data-acl="manage_content_type_attr" class="btn btn-default" id="addAField"><i class="fa fa-th"></i> Tambah Field</a>
                        <a data-acl="delete_content_type" onclick="deleteCT()" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</a>
                        <a data-acl="edit_content_type" onclick="saveData()" class="btn btn-primary pull-right" style="margin-right:5px;"><i class="fa fa-save"></i> Simpan</a>
                    </div>
                </form>
            </div>
		</div><!-- /.col-md-9 -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
    $(function () {
        $('#ctDT3').tree({
            formatter:function(node){
                return '<a href="/content_type/update/'+node.id+'">'+node.text+'</a>';
            }
        });

        var wrapper = $('#attrTbl tbody'); 
        var addBtn = $('#addAField'); 

        var x = 0; 
        $(addBtn).click(function(e){ 
            e.preventDefault();
            x++; 
            $(wrapper).append('<tr><td><input id="cta_nw_label'+x+'" name="attributes[cta_label][nw]['+x+'][]" type="text" class="form-control" placeholder="" value="" onkeyup="setCTAName2(this.value, this.id)"></td><td><input id="cta_nw_name'+x+'" name="attributes[cta_name][nw]['+x+'][]" type="text" class="form-control" placeholder="" value="" readonly></td><td><select id="cta_nw_type'+x+'" name="attributes[cta_type][nw]['+x+'][]" class="form-control" onchange="check4Ref2(this.value, this.id)"><option value="1">Text</option><option value="2">Number</option><option value="3">Date</option><option value="4">Combo</option><option value="5">Checkbox</option><option value="6">Radio</option><option value="999">Node Reference</option></select></td><td><input id="cta_nw_ref'+x+'" name="attributes[cta_ref][nw]['+x+'][]" class="easyui-combobox text" style="width:175px;height:34px;font-size:18px;" disabled /></td><td><input id="cta_nw_req'+x+'" name="attributes[cta_req][nw]['+x+'][]"></td><td><input id="cta_nw_sit'+x+'" name="attributes[cta_sit][nw]['+x+'][]"></td><td><a href="#" id="rmvNewField"><i class="fa fa-close"></a></td></tr>');

            $('#cta_nw_ref' + x).combobox();

            $('#cta_nw_req' + x).switchbutton({
                checked: true,
                onText: 'Ya',
                offText: 'Tidak'
            });

            $('#cta_nw_sit' + x).switchbutton({
                checked: true,
                onText: 'Ya',
                offText: 'Tidak'
            });
        });

        $(wrapper).on("click",".rmvField", function(e){ 
            e.preventDefault(); //$(this).closest('tr').remove(); x--;
            var daid = $(this).attr('id');

            $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan attribut', function(r){
                    if(r){
                        $.post( '/content_type/delete_attribute/' + daid, function(result){
                            if(result == 1451){
                                $.messager.alert('Delete Result','Penghapusan attribut gagal, terdapat konten terkait','error');
                            }else if(result == 0){
                                location.reload();
                            }else{
                                $.messager.alert('Delete Result','Penghapusan attribut gagal, hubungi Administrator','error');
                            }
                        });
                    }
                });

        });

        $(wrapper).on("click","#rmvNewField", function(e){ 
            console.log('Row removal');
            e.preventDefault(); $(this).closest('tr').remove(); x--;
        });

        $('#ctParent').combobox('select',<?php echo $dt['ct_parent']; ?>);
    }); /* end of jquery on ready */
    
    function setCTAName(txt, id){
        var id = id.slice(9);
        txt = txt.replace(/ /g, '_').toLowerCase();
        $('#cta_name'+id).val(txt);
    }

    function setCTAName2(txt, id){
        var id = id.slice(12);
        txt = txt.replace(/ /g, '_').toLowerCase();
        $('#cta_nw_name'+id).val(txt);
    }

    function check4Ref(val, id){
        val = parseInt(val);
        var id = id.slice(8);
        if(val === 999 || val === 4 || val === 5 || val === 6){
            switch(val){
                case 999:
                    $('#cta_ref'+id).combobox({
                        url:'/content_type/get_form_ct_parent_item',
                        method:'post',
                        valueField: 'id',
                        textField: 'name',
                        multiple: false,
                        panelHeight: 'auto'
                    });
                    break;
                default:
                    $('#cta_ref'+id).combobox({
                        url:'/content_type/get_form_tx_parent_item',
                        method:'post',
                        valueField: 'id',
                        textField: 'name',
                        multiple: false,
                        panelHeight: 'auto'
                    });
            }

            $('#cta_ref'+id).combobox('enable');
        }else{
            $('#cta_ref'+id).combobox('select','');
            $('#cta_ref'+id).combobox('disable');
        }
    }

    function check4Ref2(val, id){
        val = parseInt(val);
        var id = id.slice(11);
        if(val === 999 || val === 4 || val === 5 || val === 6){
            switch(val){
                case 999:
                    $('#cta_nw_ref'+id).combobox({
                        url:'/content_type/get_form_ct_parent_item',
                        method:'post',
                        valueField: 'id',
                        textField: 'name',
                        multiple: false,
                        panelHeight: 'auto'
                    });
                    break;
                default:
                    $('#cta_nw_ref'+id).combobox({
                        url:'/content_type/get_form_tx_parent_item',
                        method:'post',
                        valueField: 'id',
                        textField: 'name',
                        multiple: false,
                        panelHeight: 'auto'
                    });
            }

            $('#cta_nw_ref'+id).combobox('enable');
        }else{
            $('#cta_nw_ref'+id).combobox('select','');
            $('#cta_nw_ref'+id).combobox('disable');
        }
    }

    function saveData(){
       $('#updateForm').form('submit', {
            url: '/content_type/save',
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

    function deleteCT(){
        var did = <?php echo $dt['ct_id']; ?>;

        $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan tipe konten', function(r){
            if(r){
                $.post( '/content_type/delete_content_type/' + did, function(result){
                    if(result == 1451){
                        $.messager.alert('Delete Result','Penghapusan tipe konten gagal, terdapat konten terkait','error');
                    }else if(result == 0){
                        window.location = '/content_type';
                    }else{
                        $.messager.alert('Delete Result','Penghapusan tipe konten gagal, hubungi Administrator','error');
                    }
                });
            }
        });
    }
</script>