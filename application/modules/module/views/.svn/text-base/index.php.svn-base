<div class="easyui-layout" style="width:100%;height:430px;">
    <div data-options="region:'center'">
        <table title="Module List" id="dg" class="easyui-datagrid" style="border-collapse: collapse;height: 428px;" pagination="true" data-options="fitColumns:true,ctrlSelect:true,toolbar:'#tb',rownumbers:true,singleSelect:false,collapsible:true,url:'module/get',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'MODULE_NAME',resizable:false" width="25%">Name</th>
                    <th data-options="field:'MODULE_SLUG',resizable:false" width="15%">Slug</th>
                    <th data-options="field:'MODULE_DESC',align:'center',resizable:false" width="25%">Description</th>
                    <th data-options="field:'MODULE_STATUS_LABEL',align:'center',resizable:false" width="15%">Status</th>
                    <th data-options="field:'MODULE_ENABLED_LABEL',align:'center',resizable:false" width="15%">Enable</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR module -->
<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
    <form id="fm" method="post">
        <div class="fitem">
            <input name="MODULE_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Module Name</label>
            <input name="MODULE_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Module Slug</label>
            <input readonly='true' name="MODULE_SLUG" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Module Description</label>
            <input name="MODULE_DESC" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Module Status</label>
            <select readonly='true' class="easyui-combobox" name="MODULE_STATUS">
                <option value="0">Not Installed</option>
                <option value="1">Installed</option>
            </select>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>

<!-- AKHIR DIALOG FOR module -->

<!-- toolbox module -->
<div id="tb" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_data()' data-acl="edit_module" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='install()' data-acl="install_module" iconCls="icon-add" plain="true"> Install</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='uninstall()' data-acl="uninstall_module" iconCls="icon-add" plain="true"> UnInstall</a>
        <span data-acl="search_module">| Search : <input class="easyui-textbox" id='key_user' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_data()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var pager = $('#dg').datagrid('getPager');
        pager.pagination({
            displayMsg: ''
        });
    });

    function save() {
        $('#fm').form('submit', {
            url: 'module/save',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
            }
        });
    }

    function search_data() {
        $('#dg').datagrid('load',{
            key: $('#key_user').val()
        });
    }

    function install() {
        var row = $('#dg').datagrid('getSelected');
        console.log(row);
        if (row) {
            if(row.MODULE_STATUS == '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to install module '+row.MODULE_NAME+'?', function(r) {
                    if (r) {
                        $.post('module/install/', {'MODULE_SLUG': row.MODULE_SLUG}, function(result) {
                            $('#dg').datagrid('reload');
                        });
                    }
                });    
            } else {
                $.messager.alert('Information','You can not install Module '+row.MODULE_NAME+'! Status was Installed');
            }
        } else {
            $.messager.alert('Information','Please check any module to install');
        }
    }

    function uninstall() {
        var row = $('#dg').datagrid('getSelected');
        console.log(row);
        if (row) {
            if(row.MODULE_STATUS != '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to uninstall module '+row.MODULE_NAME+'?', function(r) {
                    if (r) {
                        $.post('module/uninstall/', {'MODULE_SLUG': row.MODULE_SLUG}, function(result) {
                            $('#dg').datagrid('reload');
                        });
                    }
                });
            } else {
                $.messager.alert('Information','You can not uninstall Module '+row.MODULE_NAME+'! Module Status was Uninstalled');
            }
        } else {
            $.messager.alert('Information','Please check any module to install');
        }
    }

    function edit_data() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            if(row.MODULE_ENABLED != '0') {
                $('#dlg').dialog('open').dialog('setTitle', 'Edit Data');
                $('#fm').form('load', row);
            } else {
                $.messager.alert('Information','Can Not Edit, Please Install First');
            }
        } else {
            $.messager.alert('Information','Please check any module to edit');
        }
    }
</script>