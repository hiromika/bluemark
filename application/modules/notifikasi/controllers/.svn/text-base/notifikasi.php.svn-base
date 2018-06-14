<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author adiputra | tuts.adiputra@gmail.com
 */
class Notifikasi extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('m_notifikasi','_notifikasi');       
        $this->layout->addScript('/assets/'.strtolower(__CLASS__).'/js/script.js');
    }

    public function install() {

        $status = true;
        $msg = 'Successfull';
        
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        
        $status = true;
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        return array("status"=>$status,"msg"=>$msg);
    }

    public function index(){

    	$data = $this->_notifikasi->getAll();
    	$this->load->view('list', $data);
    }

    public function refresh(){

    	$data = $this->_notifikasi->getAll();
    	
    	$unread = 0;
    	foreach ($data['data'] as $itemC) {
    		if($itemC['NOTIF_STATUS'] == 0){ $unread++; }
    	} ?>
		
		<a data-toggle="dropdown" class="dropdown-toggle" href="#">
			<i class="icon-bell-alt"></i>
			
			<?php if($unread >= 1): ?>
			<span class="badge badge-important"><?php echo $unread; ?></span>
			<?php endif; ?>
		</a>

		<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
			<li class="nav-header">
				<i class="icon-bell-alt"></i>
				<?php echo $unread; ?> Notifikasi belum dibaca
			</li>
			
			<?php if(count($data['data']) >= 1): ?>
		
				<?php foreach ($data['data'] as $item) {
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

    	<?php
    }

    public function setasread(){

    	$nid = $this->input->post('nid');

    	if($nid){
    		$this->_notifikasi->updateByID($nid, array('NOTIF_STATUS'=>'1'));
    	}
    }

} //end of class