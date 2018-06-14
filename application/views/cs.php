<script>
    $(function() {
        $('#sidebar').remove();
        $('#breadcrumbs').remove();
        $('.main-content').css({"margin-left":"0px"});
        $('#warranty').switchbutton({
            checked: true,
            onChange: function(checked){
                console.log(checked);
            }
        });
    });
    
    /* Fungsi simpan data */
    function saveData() {
        
        $('#frm_data').form('submit', {
            url: 'repair/save_ro',
            onSubmit: function() {
                return $(this).form('validate');
            },
            success: function(result) {
                var roid = result;
                $.messager.confirm('Confirm', 'Do you want to continue to device check?', function(r) {
                    if (r) {
                        //$('#win_device_check').dialog('open').dialog('setTitle', 'Device Check');
                    }
                });
                $('#frm_data').form('reset');
            }
        });
    }
    
    function newCustomer(c) {
        $('#frm_data').form('reset');
        var inputs = [];
        $('#btn-new-customer').css({display:'none'});
        $('#btn-existing-customer').css({display:'inline-block'});
        $('#customer_name').css({display:'inline-block'});
        $('#customer_id').css({display:'none'});
        $('#id_number').textbox('readonly',false);
        $('#cmb_gender').textbox('readonly',false);
        $('#customer_phone').textbox('readonly',false);
        $('#customer_alt_phone').textbox('readonly',false);
        $('#customer_email').textbox('readonly',false);
        $('#customer_address').textbox('readonly',false);
        $('#province-combo').textbox('readonly',false);
        $('#customer_zipcode').textbox('readonly',false);
        
    }
    
    function existingCustomer(c) {
        $('#frm_data').form('reset');
        var inputs = [];
        $('#btn-new-customer').css({display:'inline-block'});
        $('#btn-existing-customer').css({display:'none'});
        $('#customer_name').css({display:'none'});
        $('#customer_id').css({display:'inline-block'});
        $('#id_number').textbox('readonly',true);
        $('#cmb_gender').textbox('readonly',true);
        $('#customer_phone').textbox('readonly',true);
        $('#customer_alt_phone').textbox('readonly',true);
        $('#customer_email').textbox('readonly',true);
        $('#customer_address').textbox('readonly',true);
        $('#province-combo').textbox('readonly',true);
        $('#customer_zipcode').textbox('readonly',true);
        
    }
    
</script>
<form id="frm_data" method="post">
<div class="row-fluid">
    <div class="span12" style="text-align: center; font-weight: bold; font-size: 2em; color:#848484; margin-bottom: 15px;">REPAIR ORDER</div>
    <div>
    <div class="span6">
        <legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;">Customer Information</legend>
        <div class="fitem">
            <input name="CUSTOMER_ID" type="hidden">
        </div>
        <div class="fitem" style="display:none;" id="customer_name">
            <div style="font-weight: bold;">Name</div>
            <div><input name="CUSTOMER_NAME" class="easyui-textbox" style="width:400px;height:30px;padding:10px;" data-options="prompt:''"></div>
        </div>
        <div class="fitem" style="display:inline-block;" id="customer_id">
            <div style="font-weight: bold;">Name</div>
            <input class="easyui-combobox" name="CUSTOMER_ID" style="width:400px;height:30px;padding:10px;" data-options="
                valueField: 'CUSTOMER_ID',
                textField: 'CUSTOMER_NAME',
                url: 'repair/get_data_combo_customer',
                panelMaxHeight:300,
                onSelect: function(rec){
                    $('#frm_data').form('load','/repair/loadCustomer/'+rec.CUSTOMER_ID);
                }
            ">
            
        </div>
        <div style="display:inline-block;margin-left:5px;">
            <a id="btn-new-customer" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" onclick="newCustomer()" style="width:132px;margin-left:5px;background: #62A8D1;border-radius: 3px;color: #fff;font-weight: bold;border: 1px solid #438EB9;">New Customer</a>
            <a id="btn-existing-customer" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="existingCustomer()" style="width:132px;margin-left:5px;background: #62A8D1;border-radius: 3px;color: #fff;font-weight: bold;border: 1px solid #438EB9;display: none;">Cancel</a>
        </div>
        <div class="fitem" style="display:inline-block;">
            <div style="font-weight: bold;">ID Card Number</div>
            <div><input id="id_number" name="CUSTOMER_ID_NUMBER" class="easyui-textbox" style="width:300px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
        </div>
        <div class="fitem" style="display:inline-block;margin-left:5px;">
            <div style="font-weight: bold;">Gender</div>
            <select id="cmb_gender" class="easyui-combobox" name="CUSTOMER_GENDER" style="width:100px;height:30px;padding:10px;" data-options="readonly:true">
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
        <legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;">Contact Numbers</legend>
        <div>
            <div class="fitem" style="display:inline-block">
                <div style="font-weight: bold;">Phone</div>
                <div><input id="customer_phone" name="CUSTOMER_PHONE" class="easyui-textbox" style="width:150px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
            </div>
            <div class="fitem" style="display:inline-block;margin-left:5px;">
                <div style="font-weight: bold;">Alternative Phone</div>
                <div><input id="customer_alt_phone" name="CUSTOMER_ALT_PHONE" class="easyui-textbox" style="width:150px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
            </div>
            <div class="fitem" style="display:inline-block;margin-left:5px;">
                <div style="font-weight: bold;">Email</div>
                <div><input id="customer_email" name="CUSTOMER_EMAIL" class="easyui-textbox" style="width:300px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
            </div>
        </div>
        <legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;">Address</legend>
        <div class="fitem">
            <div style="font-weight: bold;">Street</div>
            <div><input id="customer_address" name="CUSTOMER_ADDRESS" class="easyui-textbox" style="width:400px;height:50px;padding:10px;" data-options="multiline:true,readonly:true"></div>
        </div>
        <div class="fitem" style="display:inline-block">
            <div style="font-weight: bold;">Province</div>
            <input id="province-combo" class="easyui-combobox" name="PROVINCE_ID" style="width:300px;height:30px;padding:10px;" data-options="
                valueField: 'PROVINCE_ID',
                textField: 'PROVINCE_NAME',
                url: 'repair/get_data_combo_province',
                panelMaxHeight:300,
                readonly:true
            ">
        </div>
        <div class="fitem" style="display:inline-block;margin-left:5px;">
            <div style="font-weight: bold;">Zip Code</div>
            <div><input id="customer_zipcode" name="CUSTOMER_ZIPCODE" class="easyui-textbox" style="width:100px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
        </div>
        
    </div>
    <div class="span6">
        <legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;">Repair Order Details</legend>
        <div class="fitem" style="display:inline-block">
            <div style="font-weight: bold;">IMEI</div>
            <div><input id="customer_imei" name="REPAIR_ORDER_IMEI" class="easyui-textbox" style="width:300px;height:30px;padding:10px;" data-options="prompt:''"></div>
        </div>
        <div style="display:inline-block;margin-left:5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" onclick="newCustomer()" style="margin-left:5px;background: #62A8D1;border-radius: 3px;color: #fff;font-weight: bold;border: 1px solid #438EB9;">Barcode Scan</a>
        </div>
        <div class="fitem" style="display:inline-block">
            <div style="font-weight: bold;">Handset Model</div>
            <input id="handset-combo" class="easyui-combobox" name="MODEL_ID" style="width:405px;height:30px;padding:10px;" data-options="
                valueField: 'MODEL_ID',
                textField: 'MODEL_NAME',
                url: 'repair/get_data_combo_model',
                panelMaxHeight:300,
                onSelect: function(rec){
                    $('#frm_data').form('load','/repair/loadModel/'+rec.MODEL_ID);
                }
            ">
        </div>
        <div class="fitem" style="display:inline-block;margin-left:5px;">
            <div style="font-weight: bold;">Warranty</div>
            <div>
                <input name="REPAIR_ORDER_WARRANTY" type="hidden" value="0">
                <input id="warranty" class="easyui-switchbutton" data-options="onText:'Yes',offText:'No'" value="1" style="width:75px" name="REPAIR_ORDER_WARRANTY">
            </div>
        </div>
        <div>
            <div class="fitem" style="display:inline-block">
                <div style="font-weight: bold;">Brand</div>
                <div><input id="brand_name" name="BRAND_NAME" class="easyui-textbox" style="width:200px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
            </div>
            <div class="fitem" style="display:inline-block;margin-left:5px;">
                <div style="font-weight: bold;">Vendor</div>
                <div><input id="vendor_name" name="VENDOR_NAME" class="easyui-textbox" style="width:300px;height:30px;padding:10px;" data-options="prompt:'',readonly:true"></div>
            </div>
        </div>
        <div>
            <div class="fitem" style="display:inline-block">
                <div style="font-weight: bold;">MEID/ESN</div>
                <div><input id="ro_meid" name="REPAIR_ORDER_MEID" class="easyui-textbox" style="width:200px;height:30px;padding:10px;" data-options="prompt:''"></div>
            </div>
            <div class="fitem" style="display:inline-block;margin-left:5px;">
                <div style="font-weight: bold;">PIN</div>
                <div><input id="ro_pin" name="REPAIR_ORDER_PIN" class="easyui-textbox" style="width:200px;height:30px;padding:10px;" data-options="prompt:''"></div>
            </div>
        </div>
        <div>
            <div class="fitem" style="display:inline-block">
                <div style="font-weight: bold;">Color</div>
                <div><input id="ro_color" name="REPAIR_ORDER_COLOR" class="easyui-textbox" style="width:200px;height:30px;padding:10px;" data-options="prompt:''"></div>
            </div>
            <div class="fitem" style="display:inline-block;margin-left:5px;">
                <div style="font-weight: bold;">Serial Number</div>
                <div><input id="ro_serial" name="REPAIR_ORDER_SERIAL" class="easyui-textbox" style="width:200px;height:30px;padding:10px;" data-options="prompt:''"></div>
            </div>
        </div>
        <div class="fitem">
            <div style="font-weight: bold;">Remark</div>
            <div><input id="ro_remark" name="REPAIR_ORDER_REMARK" class="easyui-textbox" style="width:500px;height:70px;padding:10px;" data-options="multiline:true,readonly:false"></div>
        </div>
        <legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;">Accessory Included</legend>
        <div>
        <div style="display:inline-block; width: 150px;">
            <div class="checkbox">
                <input name="INCLUDE_BATTERY" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_BATTERY">Battery</label>
            </div>
            <div class="checkbox">
                <input name="INCLUDE_CHARGER" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_CHARGER">Charger</label>
            </div>
        </div>
        <div style="display:inline-block; width: 150px;">
            <div class="checkbox">
                <input name="INCLUDE_MEMORY" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_MEMORY">Memory Card</label>
            </div>
            <div class="checkbox">
                <input name="INCLUDE_SIM" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_SIM">Sim Card</label>
            </div>
        </div>    
        <div style="display:inline-block; margin-left:5px; width: 150px;">
            <div class="checkbox">
                <input name="INCLUDE_HEADSET" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_HEADSET">Headset</label>
            </div>
            <div class="checkbox">
                <input name="INCLUDE_HEAD_CHARGER" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_HEAD_CHARGER">Head Charger</label>
            </div>
        </div>
        <div style="display:inline-block; margin-left:5px; width: 150px;">
            <div class="checkbox">
                <input name="INCLUDE_GUARANTEE" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_GUARANTEE">Guarantee</label>
            </div>
            <div class="checkbox">
                <input name="INCLUDE_DATA_CABLE" type="hidden" value="0">
                <label><input type="checkbox" value="1" name="INCLUDE_DATA_CABLE">Data Cable</label>
            </div>
        </div>    
        </div>
    </div>
    </div>
</div>
</form>
<br>
<legend style="color:#D15B47;font-size:.9em;line-height: 30px;margin: 0;font-weight: bold;"></legend>
<div id="window-buttons" style="margin:15px; auto; text-align: center">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveData()" style="margin-right:5px;height: 35px;width: 148px;background: rgb(98, 168, 209);color: #fff;font-weight: bold;border: 1px solid rgb(24, 111, 162);">Save Repair Order</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="" style="margin-left:5px;height: 35px;width: 148px;background: rgb(209, 98, 98);color: #fff;font-weight: bold;border: 1px solid rgb(162, 24, 24);">Cancel</a>
</div>

<!-- window device check -->
<div id="win_device_check" class="easyui-dialog" style="background:#FCFCFC;width:800px;max-height:550px;padding:10px 20px" closed="true" buttons="#win-device-check-buttons" data-options="modal:true">
    <form id="frm_device_check" method="post">
        <div class="row-fluid">
            <div class="fitem">
                <input name="REPAIR_ORDER_ID" type="hidden">
            </div>
            
            <?php if($visual) {
                foreach($visual as $keys => $values) {
                    ?>
                        <div class="span2" style="padding-top:4px; text-align: right;">
                            <div class="fitem">
                                <div style="font-weight: bold;"><?php echo $values['VISUAL_CHECK_NAME']; ?></div>
                            </div>
                        </div>
                        <div class="span1" style="width:75px">
                            <div>
                                <input name="VISUAL_CHECK_<?php echo $values['VISUAL_CHECK_CODE']; ?>" type="hidden" value="2">
                                <input id="visual_check_<?php echo $values['VISUAL_CHECK_CODE']; ?>" class="easyui-switchbutton" data-options="onText:'OK',offText:'Broken'" value="1" style="width:75px" name="VISUAL_CHECK_<?php echo $values['VISUAL_CHECK_CODE']; ?>" checked>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="fitem">
                                <div><input id="visual_check_<?php echo $values['VISUAL_CHECK_CODE']; ?>_remark" name="VISUAL_CHECK_<?php echo $values['VISUAL_CHECK_CODE']; ?>_REMARK" class="easyui-textbox" style="width:450px;height:26px;padding:2px 5px;" data-options="readonly:true"></div>
                            </div>
                        </div>
                        <div style="clear: both"></div>
                    <?php
                }
            } ?>
            
        </div>
        <div id="win-device-check-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveData()" style="width:90px">Simpan</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#frm_window').dialog('close')" style="width:90px">Batal</a>
        </div>
    </form>
</div>
<!-- end window device check -->

