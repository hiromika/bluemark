$(function(){
    $('#dg_permission').datagrid();
    
    $('#key_permission').textbox({
        inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
            keyup:function(e){
                if(e.keyCode === 13){
                    search_permission();
                }
            }
        })
    });

    $('#key_user').textbox({
        inputEvents: $.extend({},$.fn.textbox.defaults.inputEvents,{
            keyup:function(e){
                if(e.keyCode === 13){
                    search_module();
                }
            }
        })
    });
});

function formatCheck(v) {
    var obj = jQuery.parseJSON(v);
    if(obj.value > 0){
        var c = '<input type="checkbox" checked="true" disabled role_id="'+obj.role+'" permission_id="'+obj.permission+'">'; 
    } else {
        var c = '<input type="checkbox" disabled role_id="'+obj.role+'" permission_id="'+obj.permission+'">';
    }
    
    return c;
}

function enableRow(v) {
    var tr = $('#'+v).closest('tr');
    $(tr).find('input').each (function(i,a) {
        $(a).attr('disabled',false);
    });
    $('#'+v).html('<a onclick="disableRow(' + v + ')" href="javascript:void(0)">Save</a>');
}

function disableRow(v) {
    var tr = $('#'+v).closest('tr');
    var output = [];
    $(tr).find('input').each (function(i,a) {
        var role = a.getAttribute('role_id');
        var permission = a.getAttribute('permission_id');
        var value = a.getAttribute('checked');
        output.push({"role_id":role,"permission_id":permission,"value":value});
        $(a).attr('disabled',true);
    });
    $.ajax({
        type: "POST",
        url: window.location.href + '/save_permission',
        data: {
            data:JSON.stringify(output)
        },
        success: function(response){
            alert(response);
        },
        dataType: 'html'
    });

    $(tr).find('input').each (function(i,a) {
        $(a).attr('disabled',true);
    });
    
    $('#'+v).html('<a href="javascript:void(0)" onclick="enableRow(' + v + ')">Edit</a>');
}

function formatEdit(v,r) {
    var e = '<span id="' + v + '"><a href="javascript:void(0)" onclick="enableRow(' + v + ')">Edit</a></span>';
    
    return e;
}

var editIndex = undefined;

function accept(){

    $('#dg_permission').edatagrid('saveRow');
}

function cancelrow(){
    $('#dg_permission').datagrid('cancelEdit');
}

function save_permission() {
    $('#fm_permission').form('submit', {
        url: 'module_permission/save_permission',
        onSubmit: function() {
            return $(this).form('validate');
        },
        success: function(result) {
            $('#dlg_permission').dialog('close');
            $('#dg_permission').datagrid('reload');
            $('#dg_module').datagrid('reload');
        }
    });
}

function search_permission() {
    $('#dg_permission').datagrid('load',{
        key: $('#key_permission').val()
    });
}

function reload_select_module() {
    $('#select_module_id').combobox('reload','module_navigation/get_select_module');
}

function add_permission() {
    $('#dlg_permission').dialog({
        modal: true
    });
    $('#fm_permission').form('clear');
    reload_select_module();
    $('#dlg_permission').dialog('open');
}

function edit_permission() {
    var row = $('#dg_permission').datagrid('getSelected');
    if (row) {
        $('#dlg_permission').dialog('open').dialog('setTitle', 'Edit Permission');
        reload_select_module();
        $('#fm_permission').form('load', row);
    } else {
        alert('Please check any permission to edit');
    }
}

function delete_permission() {
    var row = $('#dg_permission').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Are you sure you want to delete this data?', function(r) {
            if (r) {
                $.post('module_permission/delete_permission/' + row.PERMISSION_ID, {}, function(result) {
                    $('#dg_permission').datagrid('reload');
                });
            }
        });
    } else {
        alert('Please check any permission to delete');
    }
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

function save_module() {
    $('#fm_module').form('submit', {
        url: 'module_permission/save_module',
        onSubmit: function() {
            return $(this).form('validate');
        },
        success: function(result) {
            $('#dlg_module').dialog('close');
            $('#dg_module').datagrid('reload');
        }
    });
}

function add_module() {
    $('#dlg_module').dialog({modal: true});
    $('#fm_module').form('clear');
    $('#dlg_module').dialog('open');
}

function edit_module() {
    var row = $('#dg_module').datagrid('getSelected');
    if (row) {
        $('#dlg_module').dialog('open').dialog('setTitle', 'Edit Module');
        $('#fm_module').form('load', row);
    } else {
        alert('Please check any module to edit');
    }
}