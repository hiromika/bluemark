<div class="row" style="margin-left:5px">
    <div class=".col-xs-12">
        <table id="dg_module" class="easyui-datagrid" style="border-collapse: collapse; height: 750px" pageSize="20" pagination="true" fitColumns="true" border="false" data-options="ctrlSelect:true,toolbar:'#tb',rownumbers:true,singleSelect:false,collapsible:true,url:'module_navigation/get_module',method:'get'">
            <thead>
            <tr style="border-collapse: collapse">
                <th data-options="field:'MODULE_NAME',resizable:false" width="20%">Name</th>
                <th data-options="field:'MODULE_SLUG',resizable:false" width="15%">Slug</th>
                <th data-options="field:'MODULE_DESC',align:'center',resizable:false" width="45%">Description</th>
                <th data-options="field:'MODULE_STATUS_LABEL',align:'center',resizable:false" width="10%">Status</th>
                <th data-options="field:'MODULE_ENABLED_LABEL',align:'center',resizable:false" width="10%">Enabled</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR module -->
<div id="dlg_module" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
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
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_module').dialog('close')" style="width:90px">Cancel</a>
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
        
        <span data-acl="search_module">
            | Search : <input class="easyui-textbox" id='key_user' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_data()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var pager = $('#dg_module').datagrid('getPager');
        pager.pagination({
            displayMsg: ''
        });

        var dg_module = $('#dg_module').datagrid({
            onClickRow: function(index, row) {

            }
        });

        $('#key_user').textbox({
            inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
                keyup:function(e){
                    if(e.keyCode == 13){
                        search_data();
                    }
                }
            })
        });

        $('#key_navigation').textbox({
            inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
                keyup:function(e){
                    if(e.keyCode == 13){
                        search_navigation();
                    }
                }
            })
        });
    });

    function reload_select_module() {
        $('#select_module_id').combobox('reload','module_navigation/get_select_module');
    }

    function reload_select_navigation_parent() {
        $('#select_navigation_parent_id').combobox('reload','module_navigation/get_select_navigation_parent');
    }
    
    function add_navigation() {
        $('#fm_nav').form('clear');
        reload_select_module();
        reload_select_navigation_parent();
        $('#dlg_nav').dialog('open').dialog('setTitle', 'Add Data Navigation');
    }

    function edit_navigation() {
        var row = $('#dg_navigation').datagrid('getSelected');
        if (row) {
            $('#dlg_nav').dialog('open').dialog('setTitle', 'Edit Navigation');
            reload_select_module();
            $('#fm_nav').form('load', row);
        } else {
            alert('Please check any navigation to edit');
        }
    }

    function delete_navigation() {
        var row = $('#dg_navigation').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete navigation '+row.NAVIGATION_NAME+'?', function(r) {
                if (r) {
                    $.post('module_navigation/delete_navigation_item/', {'navigation_id': row.NAVIGATION_ID}, function(result) {
                        $('#dg_navigation').datagrid('reload');
                    });
                }
            });
        } else {
            $.messager.alert('Information','Please select any navigation');
        }
    }

    function save_navigation() {
        $('#fm_nav').form('submit', {
            url: 'module_navigation/save_navigation',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg_nav').dialog('close');
                $('#dg_navigation').datagrid('reload');
            }
        });
    }

    function save() {
        $('#fm').form('submit', {
            url: 'module_navigation/save_module',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg_module').dialog('close');
                $('#dg_module').datagrid('reload');
            }
        });
    }

    function search_data() {
        $('#dg_module').datagrid('load',{
            key: $('#key_user').val()
        });
    }

    function search_navigation() {
        $('#dg_navigation').datagrid('load',{
            key: $('#key_navigation').val()
        });
    }

    function install() {
        var row = $('#dg_module').datagrid('getSelected');
        if (row) {
            if(row.MODULE_STATUS == '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to install module '+row.MODULE_NAME+'?', function(r) {
                    if (r) {
                        $.post('module/install/', {'MODULE_SLUG': row.MODULE_SLUG}, function(result) {
                            $('#dg_module').datagrid('reload');
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
        var row = $('#dg_module').datagrid('getSelected');
        if (row) {
            if(row.MODULE_STATUS != '0') {
                $.messager.confirm('Confirm', 'Are you sure you want to uninstall module '+row.MODULE_NAME+'?', function(r) {
                    if (r) {
                        $.post('module/uninstall/', {'MODULE_SLUG': row.MODULE_SLUG}, function(result) {
                            $('#dg_module').datagrid('reload');
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
        var row = $('#dg_module').datagrid('getSelected');
        if (row) {
            if(row.MODULE_ENABLED != '0') {
                $('#fm').form('load', row);
                $('#dlg_module').dialog('open').dialog('setTitle', 'Edit Data');
            } else {
                $.messager.alert('Information','Can Not Edit, Please Install First');
            }
        } else {
            $.messager.alert('Information','Please check any module to edit');
        }
    }
</script>