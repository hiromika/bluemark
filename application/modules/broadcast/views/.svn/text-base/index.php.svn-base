<div class="row-fluid">
  <div class="span6">
    <div class="broadcast-wrapper">
      <table border=false id="grid_broadcast" class="easyui-datagrid" style="border-collapse: collapse; height:420px" pagination="true"       
               data-options="ctrlSelect:true,
               fitColumns:true,
               singleSelect:false,
               nowrap: false,
               onClickRow: viewDetail,
               collapsible:true,
               url:'/broadcast/getData',
               method:'get'">
            <thead>
                <tr style="border-collapse: collapse">
                    <th data-options="field:'BCAST_DATE',resizable:false" width="20%" valign="top"><b>TANGGAL</b></th>
                    <th data-options="field:'BCAST_USER',resizable:false" width="15%" valign="top"><b>OLEH</b></th>
                    <th data-options="field:'BCAST_SUBJECT',resizable:false" width="50%"><b>SUBJECT</b></th>
                    <th data-options="field:'BCAST_STAT',resizable:false, formatter:bcastStat" width="15%"><b>STATUS</b></th>
                    <th data-options="field:'BCAST_TO',hidden:true"><b>TO</b></th>
                    <th data-options="field:'BCAST_MODULE',hidden:true"><b>MODULE</b></th>
                    <th data-options="field:'BCAST_STATUS_MESSAGE',hidden:true"><b>STAT MSG</b></th>
                    <th data-options="field:'BCAST_CONTENT',hidden:true"><b>CONTENT</b></th>
                </tr>
            </thead>
        </table>
    </div>
  </div>
  <div class="span6">
    <div id="emailDetail" class="well" style="color: #6f6f6f">
      <div id="emailPre">Klik baris spesifik pada List Email untuk melihat Detail</div>
      <div id="emailMeta"></div>
      <div id="emailTitle"></div>
      <div id="emailContent" style="margin-bottom: 21px;"></div>
    </div>
  </div>
</div>
