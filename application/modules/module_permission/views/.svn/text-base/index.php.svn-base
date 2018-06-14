<div class="easyuirow">
    <div class=".col-xs-12">
        <table id="dg_permission" class="easyui-datagrid" border="false" pagination="false" data-options="
        checkOnSelect:false,
        selectOnCheck:false,
        ctrlSelect:true,
        toolbar:'#tb_permission',
        rownumbers:true,
        singleSelect:true,
        fixColumnSize:true,
        collapsible:true,
        url:'module_permission/get_permission',
        method:'get',
        view:groupview,
        groupField:'MODULE_NAME',
        groupFormatter:function(value,rows){
            return value + ' - ' + rows.length + ' Permission(s)';
        }">
            <thead>
            <tr style="border-collapse: collapse">
                <th data-options="field:'PERMISSION_NAME',resizable:true" style="width:25%">Name</th>
                <th data-options="field:'PERMISSION_SLUG',resizable:true" style="width:15%">Slug</th>
                <?php if($role) { $width = (50 / count($role)); foreach($role as $keys => $value) { ?>
                    <th role-id='<?php echo $value['ROLE_ID']; ?>' data-options="  field:'<?php echo $value['ROLE_ID']; ?>',
                                        resizable:true,
                                        formatter:formatCheck" align="center" style="width:<?php echo $width; ?>%"><?php echo strtoupper($value['ROLE_NAME']); ?></th>
                <?php } } ?>
                <th data-options="field:'PERMISSION_ID',formatter:formatEdit" align="center" width="10%">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<!-- ADD DIALOG FOR permission -->
<div id="dlg_permission" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons-permission">
    <form id="fm_permission" method="post">
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
        <div id="dlg-buttons-permission">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_permission()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_permission').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>
<!-- AKHIR DIALOG FOR permission -->

<!-- toolbox permission -->
<div id="tb_permission" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_permission()' data-acl="add_permission" iconCls="icon-add" plain="true"> Add</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_permission()' data-acl="edit_permission" iconCls="icon-edit" plain="true"> Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_permission()' data-acl="delete_permission" iconCls="icon-remove" plain="true"> Delete</a>
    
        <span data-acl="search_permission">
            | Search : <input class="easyui-textbox" id='key_permission' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_permission()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>