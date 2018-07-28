<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Verification</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="">Verification</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <section>
                    <div class="heading text-center">
                        <h2 style="text-transform: uppercase; ">
                        WELCOME <?php echo $this->session->userdata('user');; ?>
                        </h2>
                    </div>
                </section>
                <br />
                <section>
                    <div class="row">
                        <div class="col-xs-12">
                            <!--PAGE CONTENT BEGINS-->
                                <br>
                                <div class="active-account">
                                    <div class="alert alert-info" role="alert">
                                      <strong>Pemberitahuan!</strong> periksa E-mail anda untuk pendapatkan kode verifikasi
                                    </div>

                                    <div class="alert alert-dismissible" role="alert" style="display: none;" id="alert-verification">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <span id="alert-span"></span>
                                    </div>
                                    
                                    <form class="form-inline text-center">
                                      <div class="form-group">
                                       <a href="javascript:;" class="btn btn-warning" title="" id="send_code">Kirim Kode Verifikasi</a>
                                      </div>
                                      <div class="form-group">
                                        <label for="verification-input" class="sr-only">Masukan Kode Verfikasi</label>
                                        <input type="text" class="form-control" id="verification-input" placeholder="Ketik Kode Verfikasi">
                                      </div>
                                      <button type="button" class="btn btn-primary" id="do_verify">Verifikasi</button>
                                    </form>
                                </div>


                            <!--PAGE CONTENT ENDS-->
                        </div>
                    </div>
                </section>
        </div>
 
    </div>
</div>







<div id="verification_modal" class="modal fade modal-verification" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Verifikasi E-mail</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin mengirim E-mail verifikasi ke <strong><?php echo $this->session->userdata('email');?></strong> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="sendVerification();">Kirim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css" media="screen">
	a.disabled{
		pointer-events: none;
		cursor: default;
	}
</style>

<script type="text/javascript">
	$("#send_code").click(function(event) {
		$('#verification_modal').modal('toggle');
	});

	$('#do_verify').click(function(event){
		var ver_code = $('#verification-input').val();

		$.ajax({
			url: "<?php echo base_url('verification/do_verification');?>",
			type: "POST",
			data: {code:ver_code},
			success: function(result){
				var data = $.parseJSON(result);
				if(data.result==1){
					$('#do_verify').attr('disabled',"true");
					$('#alert-verification').removeClass('alert-danger')
        			$('#alert-verification').removeClass('alert-warning')
        			$('#alert-verification').addClass('alert-success')
        			$('#alert-verification').show();
        			document.getElementById("alert-span").innerHTML = "<strong>Yaay!</strong> You are now verified, you will be redirect shortly";
        			setTimeout(function(){
        				window.location.replace("<?php echo base_url('home/dashboard');?>");
        			},2000);
				}else{
					$('#do_verify').attr('disabled','true');
					$('#alert-verification').removeClass('alert-success')
        			$('#alert-verification').removeClass('alert-warning')
        			$('#alert-verification').addClass('alert-danger')
        			$('#alert-verification').show();
        			document.getElementById("alert-span").innerHTML = "<strong>Ooops!</strong> Looks like your code is wrong";
        			setTimeout(function(){
        				$('#do_verify').removeAttr('disabled');
        			},2000);
				}
			}
		});
	});

	function sendVerification(){
		$.ajax({
			url: "<?php echo base_url('verification/send_verification');?>", 
			success: function(result){
        		var data = $.parseJSON(result);
        		$('#verification_modal').modal('toggle');
        		if(data.result=='b'){
        			$('#send_code').addClass('disabled');
        			$('#alert-verification').removeClass('alert-danger')
        			$('#alert-verification').removeClass('alert-warning')
        			$('#alert-verification').addClass('alert-success')
        			$('#alert-verification').show();
        			document.getElementById("alert-span").innerHTML = "<strong>Yaay!</strong> Kode Verifikasi Anda Terkirim!";
        			setTimeout(function(){
        				$('#send_code').removeClass('disabled');
        			},5000);
        		}else if(data.result=='a'){
        			$('#send_code').addClass('disabled');
        			$('#alert-verification').removeClass('alert-success')
        			$('#alert-verification').removeClass('alert-danger')
        			$('#alert-verification').addClass('alert-warning')
        			$('#alert-verification').show();
        			document.getElementById("alert-span").innerHTML = "<strong>Ooops!</strong> Kode Verifikasi terakhir Anda masih aktif!";
        			setTimeout(function(){
        				$('#send_code').removeClass('disabled');
        			},3000);
        		}else{
        			$('#send_code').addClass('disabled');
        			$('#alert-verification').removeClass('alert-warning')
        			$('#alert-verification').removeClass('alert-danger')
        			$('#alert-verification').addClass('alert-danger')
        			$('#alert-verification').show();
        			document.getElementById("alert-span").innerHTML = "<strong>Aww SNAP!</strong> Something Wrong happen, pleas try again later";
        			setTimeout(function(){
        				$('#send_code').removeClass('disabled');
        			},3000);
        		}
    		}
    	});
	}
</script>