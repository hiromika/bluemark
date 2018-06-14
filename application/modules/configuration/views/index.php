<div class="easyui-layout" style="width:100%;height:100%;">
    <div data-options="border:false,region:'west',split:true" style="width:100%;">
        <table id="dg_config" class="easyui-datagrid" style="border-collapse: collapse;height: 100%;" pagination="true" data-options="border:false,fitColumns:true,ctrlSelect:true,toolbar:'#tb_config',rownumbers:true,singleSelect:false,collapsible:true,url:'configuration/get_configuration',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'CONFIG_NAME',resizable:false" width="25%">Name</th>
                    <th data-options="field:'CONFIG_SLUG',resizable:false" width="15%">Slug</th>
                    <th data-options="field:'CONFIG_VALUE',align:'center',resizable:false" width="25%">Value</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR module -->
<div id="dlg_config" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
    <form id="fm_config" method="post">
        <div class="fitem">
            <input name="CONFIG_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Config Name</label>
            <input name="CONFIG_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Config Slug</label>
            <input name="CONFIG_SLUG" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Config Value</label>
            <input name="CONFIG_VALUE" class="easyui-textbox">
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_config()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_config').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>

<!-- AKHIR DIALOG FOR module -->

<!-- toolbox module -->
<div id="tb_config" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_config()' data-acl="add_config" iconCls="icon-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_config()' data-acl="edit_config" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_config()' data-acl="delete_config" iconCls="icon-remove" plain="true"> Delete</a>
        
        <span data-acl="search_config">
            | Search : <input class="easyui-textbox" id='key_user' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_config()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var pager = $('#dg_config').datagrid('getPager');
        pager.pagination({
            displayMsg: ''
        });

        $(window).resize(function(){
            $('.easyui-layout').layout('resize'); 
            $('#dg_config').datagrid('resize');
        });

        $('#key_user').textbox({
            inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
                keyup:function(e){
                    if(e.keyCode == 13){
                        search_config();
                    }
                }
            })
        });
    });
    
    function search_config() { 
        $('#dg_config').datagrid('load', {
            key: $('#key_user').val()
        });
    }

    function add_config() {
        $('#fm_config').form('clear');
        $('#dlg_config').dialog('open').dialog('setTitle', 'Add Data Configuration');
    }

    function edit_config() {
        var row = $('#dg_config').datagrid('getSelected');
        if (row) {
            $('#dlg_config').dialog('open').dialog('setTitle', 'Edit Data Configuration');
            $('#fm_config').form('load', row);
        } else {
            alert('Please check any configuration to edit');
        }
    }

    function delete_config() {
        var row = $('#dg_config').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete config '+row.CONFIG_NAME+'?', function(r) {
                if (r) {
                    $.post('configuration/delete_configuration/', {'config_id': row.CONFIG_ID}, function(result) {
                        $('#dg_config').datagrid('reload');
                    });
                }
            });
        } else {
            $.messager.alert('Information','Please select any configuration');
        }
    }

    function save_config() {
        $('#fm_config').form('submit', {
            url: 'configuration/save_configuration',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg_config').dialog('close');
                $('#dg_config').datagrid('reload');
            }
        });
    }
</script>