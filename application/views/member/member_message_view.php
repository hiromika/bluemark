

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Message User</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>member">Home</a>
                    </li>
                    <li>Message User</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<?php if($this->session->flashdata('alert')){ ?>
<div class="container">
<div class="row">
      <div class="col-md-12" style="padding: 10px;">
        <div class="alert <?php echo $this->session->flashdata('alert');?> alert-dismissible" style="margin-bottom: 0">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <?php echo $this->session->flashdata('alert-msg'); ?>
        </div>
      </div>
</div>
</div>
 <?php } ?>  
<section>
<div class="container">
    <div class="row">               
    <div class="col-md-12">
      <div class="heading">
        <h5>Message</h5>
        <a href="<?php echo base_url();?>member/message" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
      </div>

      <div class="col-md-3">
         <div class="panel panel-default sidebar-menu with-icons">
              <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked">
                     <li ><a href="<?php echo base_url();?>member/DetailUser/<?php echo $this->session->userdata('idAuth');?>">My Profile</a>
                      </li>
                      <li class=""><a href="<?php echo base_url();?>member/listforum/<?php echo $this->session->userdata('idAuth');?>">My Thread</a>
                      </li>
                      <li class="active">
                          <a href="<?php echo base_url();?>member/message">Message</a>
                      </li>
                      <li><a href="<?php echo base_url();?>member/changePass/<?php echo $this->session->userdata('idAuth');?>">Change Password</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>

    <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                        	<?php foreach ($msg as $key => $value) {  ?>

                            <tr>
                                <td rowspan="2" width="9%"><img style="height: 7%;" src="<?php echo base_url().$value['fotos']?>" class="img img-responsive" alt=""></td>
                                <th style="padding-bottom: 0 !important"><?php echo $value['namas']?></th>

                                <td rowspan="2" align="right"><?php echo date('d-m-Y',strtotime($value['tgl_msg'])); ?></td>
                            </tr>
                            <tr>
                               
                                <td colspan="3" style="padding-top: 0 !important; border-top: 0 !important;">To:<?php echo $value['namar']; ?></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><?php echo $value['msg'];  ?></td>
                            </tr>
                        	<?php } ?>
                            <tr>
                                <td  colspan="3">
                                <div id="dynamic">
                                    
                                   <textarea name="" class="form-control" placeholder="Click here to Reply" onfocus="doAction();"></textarea>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
              
    </div>
  </div>
  </div>
</section>
  


<script type="text/javascript">
function doAction(){
    $('#dynamic').html('');
    $("#dynamic").append(
        "<form action='<?php echo base_url();?>member/send_msg_rep' method='POST'><input type='text' name='id_user' value='<?php echo $this->session->userdata('idAuth');?>'hidden><input type='text' name='id_user_to' value='<?php echo $user['id_user'];?>'hidden><input type='text' name='idm' value='<?php echo $idm;?>' hidden><div class='form-group row'><div class='col-xs-12'><div class='form-group'><span class='input-group'></span><textarea class='form-control' name='msg' id='textarea' placeholder=' Enter text ...' style=' height: 200px; '></textarea></div></form><button type='submit' class='btn btn-template-main pull-right'><i class='fa fa-comment-o'></i>Send</button>"
        );
    $('#textarea').wysihtml5({
    toolbar: {
    "link": false, 
    "image": false,
    }});
    $('#textarea').focus();
};

</script>