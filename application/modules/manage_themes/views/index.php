<div class="easyui-layout" style="width:100%;height:430px;">
    <div data-options="region:'center'">
        <table title="Theme List" id="dg" class="easyui-datagrid" style="border-collapse: collapse;height: 428px;" pagination="true" data-options="fitColumns:true,ctrlSelect:true,toolbar:'#tb',rownumbers:true,singleSelect:false,collapsible:true,url:'manage_themes/get',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'THEME_NAME',resizable:false" width="25%">Name</th>
                    <th data-options="field:'THEME_SLUG',resizable:false" width="15%">Slug</th>
                    <th data-options="field:'THEME_AUTHOR',align:'center',resizable:false" width="25%">Author</th>
                    <th data-options="field:'THEME_STATUS_LABEL',align:'center',resizable:false" width="15%">Status</th>
                    <th data-options="field:'THEME_ACTIVE_LABEL',align:'center',resizable:false" width="15%">Active</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR Theme -->
<div id="dlg" class="easyui-dialog" style="width:400px;height:320px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
    <form id="fm" method="post">
        <div class="fitem">
            <input name="THEME_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Theme Name</label>
            <input name="THEME_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Theme Slug</label>
            <input readonly='true' name="THEME_SLUG" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Theme Author</label>
            <input name="THEME_AUTHOR" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Theme Status</label>
            <select readonly='true' class="easyui-combobox" name="THEME_STATUS">
                <option value="0">Not Installed</option>
                <option value="1">Installed</option>
            </select>
        </div>
        <div class="fitem">
            <label>Theme Active</label>
            <select readonly='true' class="easyui-combobox" name="THEME_ACTIVE">
                <option value="0">Not Active</option>
                <option value="1">Active</option>
            </select>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>

<!-- AKHIR DIALOG FOR Theme -->

<!-- toolbox Theme -->
<div id="tb" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_data()' data-acl="edit_theme" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='install()' data-acl="install_theme" iconCls="icon-add" plain="true"> Install</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='uninstall()' data-acl="uninstall_theme" iconCls="icon-add" plain="true"> UnInstall</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='set_active()' data-acl="set_active" iconCls="icon-ok" plain="true"> Set Active</a>
        <span data-acl="search_theme">| Search : <input class="easyui-textbox" id='key_user' style="width:110px">
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
            url: 'manage_themes/save',
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
        if (row) {
            if(row.THEME_STATUS == '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to install theme '+row.THEME_NAME+'?', function(r) {
                    if (r) {
                        $.post('manage_themes/install/', {'THEME_SLUG': row.THEME_SLUG}, function(result) {
                            var data = JSON.parse(result);
                            if(data.status) {
                                $('#dg').datagrid('reload');
                            }

                            $.messager.alert('Information',data.msg);
                        });
                    }
                });    
            } else {
                $.messager.alert('Information','You can not install theme '+row.THEME_NAME+'! Status was Installed');
            }
        } else {
            $.messager.alert('Information','Please check any theme to install');
        }
    }

    function set_active() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            if(row.THEME_STATUS != '0') {
                if(row.THEME_ACTIVE == '0') {
                    $.messager.confirm('Confirm', 'Are you sure you want to activated theme '+row.THEME_NAME+'?', function(r) {
                        if (r) {
                            $.post('manage_themes/set_active/', {'THEME_ID': row.THEME_ID}, function(result) {
                                $('#dg').datagrid('reload');
                            });
                        }
                    });    
                } else {
                    $.messager.alert('Information','You can not activated theme '+row.THEME_NAME+'! Status was actived');
                }
            } else {
                $.messager.alert('Information','You can not actived theme '+row.THEME_NAME+'! Install theme first');
            }
        } else {
            $.messager.alert('Information','Please check any theme to activated');
        }
    }

    function uninstall() {
        var row = $('#dg').datagrid('getSelected');
        console.log(row);
        if (row) {
            if(row.THEME_STATUS != '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to uninstall Theme '+row.THEME_NAME+'?', function(r) {
                    if (r) {
                        $.post('manage_themes/uninstall/', {'THEME_SLUG': row.THEME_SLUG}, function(result) {
                            $('#dg').datagrid('reload');
                        });
                    }
                });
            } else {
                $.messager.alert('Information','You can not uninstall Theme '+row.THEME_NAME+'! Theme Status was Uninstalled');
            }
        } else {
            $.messager.alert('Information','Please check any Theme to install');
        }
    }

    function edit_data() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            if(row.THEME_STATUS != '0') {
                $('#dlg').dialog('open').dialog('setTitle', 'Edit Data');
                $('#fm').form('load', row);
            } else {
                $.messager.alert('Information','Can Not Edit, Please Install First');
            }
        } else {
            $.messager.alert('Information','Please check any Theme to edit');
        }
    }
</script>