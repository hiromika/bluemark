<div class="easyui-layout" style="width:100%;height:430px;">
    <div data-options="region:'west',split:true,border:false" style="width:400px;border-right:1px solid #ccc">
        <table title="Role List" id="dg_role" class="easyui-datagrid" style="border-collapse: collapse;height: 428px;" pagination="true" data-options="border:false,fitColumns:true,ctrlSelect:true,toolbar:'#tb_role',rownumbers:true,singleSelect:false,collapsible:true,url:'user/getRole',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'ROLE_NAME',resizable:false" width="78%">Role</th>
                    <th data-options="field:'ROLE_STATUS',resizable:false" width="20%">Status</th>
                </tr>
            </thead>
        </table>
    </div>
    <div data-options="border:false,region:'center'" style="border-left: 1px solid #ccc">
        <table title="User List" id="dg" class="easyui-datagrid" style="border-collapse: collapse;height: 428px;" pagination="true" data-options="border:false,fitColumns:true,ctrlSelect:true,toolbar:'#tb',rownumbers:true,singleSelect:false,collapsible:true,url:'user/get',method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'USER_LOGIN',resizable:false" width="15%">Login</th>
                    <th data-options="field:'USER_FULLNAME',resizable:false" width="54%">Full Name</th>
                    <th data-options="field:'ROLE_NAME',align:'right',resizable:false" width="15%">Role</th>
                    <th data-options="field:'USER_STATUS',align:'right',resizable:false" width="15%">Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR USER -->
<div id="dlg" class="easyui-dialog" style="width:400px;height:370px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
    <form id="fm" method="post">
        <div class="fitem">
            <input name="USER_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>User Login</label>
            <input name="USER_LOGIN" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>User Password</label>
            <input name="USER_PWD" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Role</label>
            <select class="easyui-combobox" name="ROLE_ID">
                <?php foreach($data_role as $item): ?>
                    <option value="<?php echo $item['ROLE_ID']; ?>"><?php echo $item['ROLE_NAME']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="fitem">
            <label>Fullname</label>
            <input name="USER_FULLNAME" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Status</label>
            <select class="easyui-combobox" name="USER_STATUS">
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>

<!-- AKHIR DIALOG FOR USER -->

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

<!-- toolbox user -->
<div id="tb" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_user()' data-acl="add_user" iconCls="icon-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_user()' data-acl="edit_user" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_user()' data-acl="delete_user" iconCls="icon-remove" plain="true"> Delete</a>
        <span data-acl="search_user">
            | Search : <input class="easyui-textbox" id='key_user' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_user()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>

<!-- toolbar role -->
<div id="tb_role" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_role()' data-acl="add_role" iconCls="icon-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_role()' data-acl="edit_role" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_role()' data-acl="delete_role" iconCls="icon-remove" plain="true"> Delete</a>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var pager = $('#dg_role').datagrid('getPager');
        pager.pagination({
            displayMsg: ''
        });

        $('#key_user').textbox({
            inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
                keyup:function(e){
                    if(e.keyCode == 13){
                        search_user();
                    }
                }
            })
        });
    });

    function saveUser() {
        $('#fm').form('submit', {
            url: 'user/save',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
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

    function search_user() {
        $('#dg').datagrid('load',{
            key: $('#key_user').val()
        });
    }

    function add_user() {
        $('#dlg').dialog({
            modal: true,
            title:'Add User'
        });
        $('#fm').form('clear');
        $('#dlg').dialog('open');
    }

    function edit_user() {
        $('#fm').form('clear');
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('setTitle', 'Edit User');
            $('#fm').form('load', row);
        } else {
            alert('Please check any user to edit');
        }
    }

    function delete_user() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete this user?', function(r) {
                if (r) {
                    $.post('user/delete/' + row.USER_ID, {}, function(result) {
                        $('#dg').datagrid('reload');
                    });
                }
            });
        } else {
            alert('Please check any user to delete');
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
            $.messager.confirm('Confirm', 'Are you sure you want to delete this user?', function(r) {
                if (r) {
                    $.post('user/delete_role/' + row.ROLE_ID, {}, function(result) {
                        $('#dg_role').datagrid('reload');
                    });
                }
            });
        } else {
            alert('Please check any role to delete');
        }
    }
</script>