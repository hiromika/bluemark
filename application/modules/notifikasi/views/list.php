<?php $total = 0; $i = 0;
foreach ($data as $value) {
	if($data[$i]['NOTIF_STATUS'] == 0){ $total++; }
	$i++;
}
?>

<script type="text/javascript">
	setInterval(function(){
		$.ajax({ url: '/notifikasi/refresh' }).done(function(data) {
  			$( '#notifList' ).html(data);
		});
	
	}, 30000);
	function notifDetail(id){
		$.post('/notifikasi/setasread', {nid:id});
		$.ajax({ url: '/notifikasi/refresh' }).done(function(data) {
  			$( '#notifList' ).html(data);
		});

		var ntime = document.getElementById('time' + id), ntitle = document.getElementById('title' + id), notif = document.getElementById('msg' + id);
		$('#nModalTitle').html('<i class="icon-bell-alt pull-right" style="color:#E4A64F;"></i> ' + ntitle.innerHTML);
		$('#nModalTime').html('<i class="icon-time"></i> Today, ' + ntime.innerHTML);
		$('#nMsg').html(notif.innerHTML);
		$('#nModal').modal('show');
		
	}
</script>

<style type="text/css">
	.dropdown-navbar>li:last-child>a{
		color: #555;
   		text-align: left; 
   		font-size: inherit; 
	}
	.dropdown-navbar>li:last-child>a:hover{
		color: #555;
	}
</style>

<li id="notifList" class="purple">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<i class="icon-bell-alt icon-animated-bell"></i>
		
		<?php if($total >= 1): ?>
		<span class="badge badge-important"><?php echo $total; ?></span>
		<?php endif; ?>
	</a>

	<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
		<li class="nav-header">
			<i class="icon-bell-alt"></i>
			<?php echo $total; ?> Unread Notification
		</li>
		
		<?php if(count($data) >= 1): ?>
		
			<?php foreach ($data as $item) {
				echo '<li><a href="javascript:void(0)" id="'.$item['NOTIF_ID'].'" onclick="notifDetail(this.id)">';
				if($item['NOTIF_STATUS'] == 1){ echo '<i class="icon-check pull-right" title="Sudah dibaca"></i> '; } ?>

				<span class="msg-body">
					<span class="msg-time">
	                    <i class="icon-time"></i>
	                    <span id="time<?php echo $item['NOTIF_ID']; ?>"><?php echo $item['NOTIF_TIME']; ?></span>
	                </span>

	                <span class="msg-title">
	                    <span id="title<?php echo $item['NOTIF_ID']; ?>" class="blue"><?php echo $item['NOTIF_TITLE']; ?></span><br>
	                    <p id="msg<?php echo $item['NOTIF_ID']; ?>" style="display:none;">
	                    	<?php echo $item['NOTIF_MESSAGE']; ?>
	                    </p>	                    	
	                    <?php echo substr($item['NOTIF_MESSAGE'], 0, 36); ?> ...
	                </span>	                
	            </span>
			<?php echo '</a></li>';
			} ?>

		<?php else: ?>
			<li><a><span class="msg-body"><em>Tidak ada notifikasi baru</em></span></a></li>
		<?php endif; ?>
		
	</ul>
</li>

<div id="nModal" class="modal hide fade" tabindex="-1" role="dialog" style="color: #555;">
	<div class="modal-content">
		<div class="modal-header">
			<h4 id="nModalTitle" class="modal-title">Modal header</h4>
		</div>
		<div id="nModalBody" class="modal-body">
			<span id="nModalTime" style="color: #ccc;">00:00:00</span>
			<p id="nMsg">One fine body…</p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>