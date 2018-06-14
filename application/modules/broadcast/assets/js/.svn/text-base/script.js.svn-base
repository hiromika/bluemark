/* Grid column formatter for graph */
function bcastStat(val,row){
	var frmt = '<span style="color:red">Failed</span>';
	if(row.BCAST_STATUS == 1){
		frmt = '<span style="color:green">Success</span>';
	}
	return frmt;
}

function viewDetail(index, row){
	$('#emailPre').html('');

	var statusView = (row.BCAST_STATUS == 1) ? 'Success' : 'Failed';
	var emailMeta = '<div class="row-fluid clearfix" style="margin-bottom: 21px"><div class="span6">' +
					'<small> Dikirim pada : ' + row.BCAST_DATE + '</small><br>' +
					'<small> Oleh : ' + row.BCAST_USER + '</small><br>' +
					'<small> Module : ' + row.BCAST_MODULE + '</small></div>' +
					'<div class="span6">' +
					'<small> Email to : ' + row.BCAST_TO + '</small><br>' +
					'<small> Status : ' + statusView + '</small><br>' +
					'<small> Message : ' + row.BCAST_STATUS_MESSAGE + '</small>' +
					'</div></div>';


	$('#emailMeta').html(emailMeta);
	$('#emailTitle').html('<div class="page-header"><h4>' + row.BCAST_SUBJECT + '</h4></div>');
	$('#emailContent').html(row.BCAST_CONTENT);
}