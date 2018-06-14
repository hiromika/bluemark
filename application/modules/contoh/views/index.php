<div class="project-wrapper">
    <table border=false id="grid_project" class="easyui-datagrid" style="border-collapse: collapse; height:700px" pagination="true"       
           data-options="ctrlSelect:true,
           fitColumns:true,
           rownumbers:true,
           toolbar:'#tool_project',
           singleSelect:false,
           collapsible:true,
           url:'project/getData',
           method:'get'">
        <thead>
            <tr style="border-collapse: collapse">
                <th data-options="field:'ID_PROYEK',checkbox:true"></th>
                <th data-options="field:'NAMA_PROYEK',resizable:false" width="20%"><b>NAMA</b></th>
                <th data-options="field:'NAMA_KONSULTAN_PENGAWAS',resizable:false" width="20%"><b>PENGAWAS</b></th>
                <th data-options="field:'NAMA_KONTRAKTOR',resizable:false" width="20%"><b>KONTRAKTOR</b></th>
                <th data-options="field:'NAMA_PPK',resizable:false" width="20%"><b>PPK</b></th>
                <th data-options="field:'GRAPH',formatter:graphFormat,resizable:false" width="10%"><b>GRAFIK</b></th>
                <th data-options="field:'PROGRESS',resizable:false" width="10%"><b>PROGRESS</b></th>
            </tr>
        </thead>
    </table>
</div>

<!-- toolbox project -->
<div id="tool_project" style="padding:5px;height:auto">
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='add_project()' data-acl="add_project" iconCls="icon-add" plain="true"> Tambah</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='edit_project()' data-acl="edit_project" iconCls="icon-edit" plain="true"> Ubah</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick='delete_project()' data-acl="delete_project" iconCls="icon-remove" plain="true"> Hapus</a>
        <span data-acl="search_user">
            | Search : <input class="easyui-textbox" id='key_user' style="width:110px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick='search_user()' iconCls="icon-search">Search</a>
        </span>
    </div>
</div>
<!-- end toolbox project -->

<!-- window proyek -->
<div id="window_project" class="easyui-dialog" style="width:400px;height:350px;padding:10px 20px" closed="true" buttons="#window-project-buttons">
    <form id="frm_project" method="post">
        <div class="fitem">
            <input name="ID_PROYEK" type="hidden">
        </div>
        <div class="fitem">
            <label>Nama Proyek</label>
            <input name="NAMA_PROYEK" class="easyui-validatebox textbox">
        </div>
        <div class="fitem">
            <label>Nama Konsultan Pengawas</label>
            <input name="NAMA_KONSULTAN_PENGAWAS" class="easyui-validatebox textbox">
        </div>
        <div class="fitem">
            <label>Nama Kontraktor</label>
            <input name="NAMA_KONTRAKTOR" class="easyui-validatebox textbox">
        </div>
        <div class="fitem">
            <label>Nama PPK</label>
            <input name="NAMA_PPK" class="easyui-validatebox textbox">
        </div>
        <div id="window-project-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveProject()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#window_project').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </form>
</div>
<!-- end window proyek -->

<script type="text/javascript">

    $(document).ready(function() {

        var pager = $('#grid_project').datagrid('getPager');
        pager.pagination({
            displayMsg: ''
        });
    });
    
    /* Fungsi tambah proyek */
    function add_project() {
        
        $('#window_project').dialog({
            modal: true,
            title:'Tambah Proyek'
        });
        
        $('#frm_project').form('clear');
        
        $('#window_project').dialog('open');
    }
    
    /* Fungsi simpan data */
    function saveProject() {
        
        $('#frm_project').form('submit', {
            url: 'project/save',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                $('#window_project').dialog('close');
                $('#grid_project').datagrid('reload');
            }
        });
    }
    
    /* Fungsi ubah proyek */
    function edit_project() {
        $('#frm_project').form('clear');
        var row = $('#grid_project').datagrid('getSelected');
        if (row) {
            $('#window_project').dialog('open').dialog('setTitle', 'Ubah Proyek');
            $('#frm_project').form('load', row);
        } else {
            alert('Please check any data to edit');
        }
    }
    
    /* Fungsi hapus proyek */
    function delete_project() {
        var row = $('#grid_project').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to delete this data?', function(r) {
                if (r) {
                    $.post('project/delete/' + row.ID_PROYEK, {}, function(result) {
                        $('#grid_project').datagrid('reload');
                    });
                }
            });
        } else {
            alert('Please check any data to delete');
        }
    }

</script>