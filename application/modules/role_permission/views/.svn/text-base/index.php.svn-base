<div class="easyui-layout" style="width:100%;height:430px;">
    <div data-options="region:'west',split:true" style="width:400px;">
        <table title="Role List" id="dg_role" class="easyui-datagrid" style="border-collapse:collapse;height:428px;" pagination="true" data-options="fitColumns:true,ctrlSelect:true,toolbar:'#tb_role',rownumbers:true,singleSelect:false,collapsible:true,url:'role_permission/get_role',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'ROLE_NAME',resizable:false" width="80%">Role</th>
                    <th data-options="field:'ROLE_STATUS',resizable:false" width="20%">Status</th>
                </tr>
            </thead>
        </table>
    </div>
    <div data-options="region:'center'">
        <table title="Permission List" id="dg_permission" class="easyui-datagrid" style="height: 428px;" pagination="true" data-options="checkOnSelect:false,selectOnCheck:false,fitColumns:true,ctrlSelect:true,toolbar:'#tb_permission',rownumbers:true,groupField:'MODULE_ID',singleSelect:false,collapsible:true,url:'role_permission/get_permission',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'ck',checkbox:true"></th>
                    <th data-options="field:'PERMISSION_NAME',resizable:false" width="15%">Permission Name</th>
                    <th data-options="field:'PERMISSION_SLUG',resizable:false" width="15%">Permission Slug</th>
                    <th data-options="field:'PERMISSION_DESC',resizable:false" width="25%">Permission Desc</th>
                    <th data-options="field:'MODULE_ID',resizable:false" width="25%">Module ID</th>
                    <th data-options="field:'MODULE_NAME',resizable:false" width="25%">Module Name</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR permission -->
<div id="dlg_permission" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
    <form id="fm" method="post">
        <div class="fitem">
            <input name="PERMISSION_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Permission Name</label>
            <input name="PERMISSION_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Permission Slug</label>
            <input name="PERMISSION_SLUG" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Permission Desc</label>
            <textarea name="PERMISSION_DESC" class="easyui-textarea"></textarea>
        </div>
        <div class="fitem">
            <label>Module</label>
            <input class="easyui-combobox" name="MODULE_ID" id="select_module_id" data-options="valueField:'MODULE_ID',textField:'MODULE_NAME'" />
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_permission()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_permission').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>
<!-- AKHIR DIALOG FOR permission -->

<!-- AWAL ADD DIALOG FOR ROLE -->
<div id="dlg_role" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons-role">
    <form id="fm_role" method="post">
        <div class="fitem">
            <input name="ROLE_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Role Name</label>
            <input name="ROLE_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Status</label>
            <select class="easyui-combobox" name="ROLE_STATUS">
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
        </div>
        <div id="dlg-buttons-role">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUserRole()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_role').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>
<!-- AKHIR DIALOG FOR ROLE -->

<!-- toolbar role -->
<div id="tb_role" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_role()' data-acl="add_role" iconCls="icon-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_role()' data-acl="edit_role" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_role()' data-acl="delete_role" iconCls="icon-remove" plain="true"> Delete</a>
    </div>
</div>

<!-- toolbox permission -->
<div id="tb_permission" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_permission()' data-acl="add_permission" iconCls="iconn-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_permission()' data-acl="edit_permission" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_permission()' data-acl="delete_permission" iconCls="icon-remove" plain="true"> Delete</a>
        <span data-acl="search_permission">
            | Search : <input class="easyui-textbox" id='key_permission' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_permission()' iconCls="icon-search">Search</a>
        </span>
        <select class="easyui-combobox" id="filter_module" panelHeight="auto" style="width:200px">
            <option value="">All</option>
            <?php foreach($data_module as $item): ?>
                <option value="<?php echo $item['MODULE_ID']; ?>"><?php echo $item['MODULE_NAME']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var dg_role = $('#dg_role').datagrid({
            onClickRow: function(index, row) {
                var role_id = row.ROLE_ID;
                $('#dg_permission').datagrid('clearChecked');

                $.post(
                    'role_permission/get_data_permission/', 
                    {'role_id':role_id}, 
                    function(result) {
                        var oResult = JSON.parse(result);
                        var data_dg_permission = $('#dg_permission').datagrid('getData');
                        for(var i=0; i<data_dg_permission.rows.length; i++) {
                            for( var j=0; j<oResult.length; j++ ) {
                                if( data_dg_permission.rows[i].PERMISSION_ID == oResult[j].PERMISSION_ID ) {
                                    $('#dg_permission').datagrid('checkRow',i);
                                    continue;
                                }
                            }
                        }
                    }
                );
            }
        });

        $('#dg_permission').datagrid({
            onBeforeCheck: function(index, row) {
                var row_role = $('#dg_role').datagrid('getSelected');
                var permission_id = row.PERMISSION_ID;

                if(row_role) {
                    /* proses add permission to role */
                    var role_id = row_role.ROLE_ID;
                    $.post(
                        'role_permission/checked_role_permission/', 
                        {'role_id':role_id, 'permission_id':permission_id}, 
                        function(result) {
                            var oResult = JSON.parse(result);
                            if(oResult.status) {
                                $.messager.alert('Information','Role "'+row_role.ROLE_NAME+'" has been granted to access permission "'+row.PERMISSION_NAME+'"');
                            }
                        }
                    );
                } else {

                }
            },
            onBeforeUncheck: function(index, row) {
                var row_role = $('#dg_role').datagrid('getSelected');
                var permission_id = row.PERMISSION_ID;

                if(row_role) {
                    /* proses remove permission to role */
                    var role_id = row_role.ROLE_ID;
                    $.post(
                        'role_permission/unchecked_role_permission/', 
                        {'role_id':role_id, 'permission_id':permission_id}, 
                        function(result) {
                            var oResult = JSON.parse(result);
                            if(oResult.status) {
                                $.messager.alert('Information','Role "'+row_role.ROLE_NAME+'" has been granted to access permission "'+row.PERMISSION_NAME+'"');
                            }
                        }
                    );
                } else {

                }
            }
        });

        $('#key_permission').textbox({
            inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
                keyup:function(e){
                    if(e.keyCode == 13){
                        search_permission();
                    }
                }
            })
        });

        $('#filter_module').combobox({
            onSelect: function(e){
                $('#dg_permission').datagrid('load',{
                    module_id: e.value
                });
            }
        });
    });

    function save_permission() {
        $('#fm').form('submit', {
            url: 'role_permission/save_permission',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg_permission').dialog('close');
                $('#dg_permission').datagrid('reload');
            }
        });
    }

    function saveUserRole() {
        $('#fm_role').form('submit', {
            url: 'user/save_role',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg_role').dialog('close');
                $('#dg_role').datagrid('reload');
            }
        });
    }

    function search_permission() {
        $('#dg_permission').datagrid('load',{
            key: $('#key_permission').val()
        });
    }

    function reload_select_module() {
        $('#select_module_id').combobox('reload','role_permission/get_select_module');
    }

    function add_permission() {
        $('#dlg_permission').dialog({
            modal: true
        });
        $('#fm').form('clear');
        reload_select_module();
        $('#dlg_permission').dialog('open');
    }

    function edit_permission() {
        var row = $('#dg_permission').datagrid('getSelected');
        if (row) {
            $('#dlg_permission').dialog('open').dialog('setTitle', 'Edit Permission');
            reload_select_module();
            $('#fm').form('load', row);
        } else {
            alert('Please check any permission to edit');
        }
    }

    function delete_permission() {
        var row = $('#dg_permission').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete this data?', function(r) {
                if (r) {
                    $.post('role_permission/delete_permission/' + row.PERMISSION_ID, {}, function(result) {
                        $('#dg_permission').datagrid('reload');
                    });
                }
            });
        } else {
            alert('Please check any permission to delete');
        }
    }

    function add_role() {
        $('#dlg_role').dialog({modal: true});
        $('#fm_role').form('clear');
        $('#dlg_role').dialog('open');
    }

    function edit_role() {
        var row = $('#dg_role').datagrid('getSelected');
        if (row) {
            $('#dlg_role').dialog('open').dialog('setTitle', 'Edit Role');
            $('#fm_role').form('load', row);
        } else {
            alert('Please check any role to edit');
        }
    }

    function delete_role() {
        var row = $('#dg_role').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete this role?', function(r) {
                if (r) {
                    $.post('role_permission/delete_role/' + row.ROLE_ID, {}, function(result) {
                        $('#dg_role').datagrid('reload');
                    });
                }
            });
        } else {
            alert('Please check any role to delete');
        }
    }
</script>