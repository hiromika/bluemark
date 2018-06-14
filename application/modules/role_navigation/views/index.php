<div class="easyuirow">
    <div class=".col-xs-12">
        <table id="dg_permission" class="easyui-treegrid" idField="id" treeField="text" rownumbers="true" url="role_navigation/get_navigation" border="false" pagination="false">
            <thead>
            <tr style="border-collapse: collapse">
                <th data-options="field:'text'" style="width:25%">Name</th>
                <?php if($role) { $width = (65 / count($role)); foreach($role as $keys => $value) { ?>
                    <th role-id='<?php echo $value['ROLE_ID']; ?>' data-options="  field:'<?php echo $value['ROLE_ID']; ?>',
                                        resizable:true,
                                        formatter:formatCheck" align="center" style="width:<?php echo $width; ?>%"><?php echo strtoupper($value['ROLE_NAME']); ?></th>
                <?php } } ?>
                <th data-options="field:'id',formatter:formatEdit" align="center" width="10%">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<!-- DIALOG FOR NAVIGATION -->
<div id="dlg_nav" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons-nav">
    <form id="fm_nav" method="post">
        <div class="fitem">
            <input name="NAVIGATION_ID" type="hidden">
        </div>
        <div class="fitem">
            <label>Navigation Name</label>
            <input name="NAVIGATION_NAME" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Navigation Class/CSS</label>
            <input name="NAVIGATION_CLS" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Navigation Link</label>
            <input name="NAVIGATION_LINK" class="easyui-textbox">
        </div>
        <div class="fitem">
            <label>Module</label>
            <select class="easyui-combobox" name="MODULE_ID">
                <?php for( $i=0; $i<count($data_module); $i++ ): ?>
                    <option value='<?php echo $data_module[$i]["MODULE_ID"]; ?>'><?php echo $data_module[$i]["MODULE_NAME"]; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="fitem">
            <label>Navigation Parent</label>
            <select class="easyui-combobox" name="NAVIGATION_PARENT">
                <option value=''></option>
                <?php for( $i=0; $i<count($data_nav_parent); $i++ ): ?>
                    <option value='<?php echo $data_nav_parent[$i]["NAVIGATION_ID"]; ?>'><?php echo $data_nav_parent[$i]["NAVIGATION_NAME"]; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div id="dlg-buttons-nav">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_navigation()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_nav').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>