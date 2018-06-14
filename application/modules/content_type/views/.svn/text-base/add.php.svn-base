<div class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
                    <h3 class="box-title">Data Tree</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <a data-acl="add_content_type" class="btn btn-default btn-disabled margin-bottom" disabled><i class="fa fa-plus"></i> Tambah Tipe</a>

                    <ul id="ctDT3" class="easyui-tree" 
                        data-options="url:'/content_type/get_content_type_treedata',
                        method:'get',
                        lines:true">
                    </ul>
                </div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
                    <h3 class="box-title">Tambah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<form id="addForm" role="form" method="post">
                        <input type="hidden" name="ct_id" value="">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="ct_name" type="text" class="form-control" value="" >
                        </div>
                		<div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="ct_desc" class="form-control" rows="3"></textarea>
                        </div>
                		<div class="form-group">
                            <label>Parent</label><br>
                            <input id="ctParent" name="ct_parent" class="easyui-combobox text" style="width:275px;height:34px;font-size:18px;padding:6px 12px;" 
                                data-options="
                                    url:'/content_type/get_form_ct_parent_item',
                                    method:'post',
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
                				<tr>
                					<td>
                            			<input id="cta_label1" name="cta_label[1][]" type="text" class="form-control" placeholder="" value="" onkeyup="setCTAName(this.value, this.id)">
                					</td>
                                    <td>
                                        <input id="cta_name1" name="cta_name[1][]" type="text" class="form-control" placeholder="" value="" readonly>
                                    </td>
                					<td>
                            			<select id="cta_type1" name="cta_type[1][]" class="form-control" onchange="check4Ref(this.value, this.id)">
			                                <option value="1">Text</option>
			                                <option value="2">Number</option>
			                                <option value="3">Date</option>
			                                <option value="4">Combo</option>
			                                <option value="5">Checkbox</option>
			                                <option value="6">Radio</option>
			                                <option value="999">Node Reference</option>
			                            </select>
                					</td>
                					<td>
                						<input disabled id="cta_ref1" name="cta_ref[1][]" class="easyui-combobox text" style="width:175px;height:34px;font-size:18px;" />
                					</td>
                					<td>
                                        <input id="cta_req1" name="cta_req[1][]" class="easyui-switchbutton" data-options="onText:'Ya',offText:'Tidak'" checked>
                                    </td>
                                    <td>
                						<input id="cta_sit1" name="cta_sit[1][]" class="easyui-switchbutton" data-options="onText:'Ya',offText:'Tidak'" title="Show this attribute on list table" checked>
                					</td>
                                    <td></td>
                				</tr>
                			</tbody>
                		</table>

                		<hr>
                        <a data-acl="manage_content_type_attr" class="btn btn-default" id="addAField"><i class="fa fa-th"></i> Tambah Field</a>
                		<button type="button" onclick="saveData()" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                	</form>
                </div>
			</div>
		</div>
	</div>
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

        var x = 1; 
        $(addBtn).click(function(e){ 
            e.preventDefault();
            x++; 
            $(wrapper).append('<tr><td><input id="cta_label'+x+'" name="cta_label['+x+'][]" type="text" class="form-control" placeholder="" value="" onkeyup="setCTAName(this.value, this.id)"></td><td><input id="cta_name'+x+'" name="cta_name['+x+'][]" type="text" class="form-control" placeholder="" value="" readonly></td><td><select id="cta_type'+x+'" name="cta_type['+x+'][]" class="form-control" onchange="check4Ref(this.value, this.id)"><option value="1">Text</option><option value="2">Number</option><option value="3">Date</option><option value="4">Combo</option><option value="5">Checkbox</option><option value="6">Radio</option><option value="999">Node Reference</option></select></td><td><input id="cta_ref'+x+'" name="cta_ref['+x+'][]" class="easyui-combobox text" style="width:175px;height:34px;font-size:18px;" disabled /></td><td><input id="cta_req'+x+'" name="cta_req['+x+'][]"></td><td><input id="cta_sit'+x+'" name="cta_sit['+x+'][]"></td><td><a href="#" id="rmvField"><i class="fa fa-close"></a></td></tr>');

            $('#cta_ref' + x).combobox();

            $('#cta_req' + x).switchbutton({
                checked: true,
                onText: 'Ya',
                offText: 'Tidak'
            });

            $('#cta_sit' + x).switchbutton({
                checked: true,
                onText: 'Ya',
                offText: 'Tidak'
            });
        });

        $(wrapper).on("click","#rmvField", function(e){ 
            console.log('Row removal');
            e.preventDefault(); $(this).closest('tr').remove(); x--;
        });

    }); /* end of jquery on ready */

    function setCTAName(txt, id){
        var id = id.slice(9);
        txt = txt.replace(/ /g, '_').toLowerCase();
        $('#cta_name'+id).val(txt);
    }

    function check4Ref(val, id){
        val = parseInt(val);
        var id = id.slice(8);
        if(val == 999 || val == 4 || val == 5 || val == 6){
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

    function saveData(){
       $('#addForm').form('submit', {
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

</script>