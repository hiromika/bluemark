        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>E-Book</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/member">Home</a>
                            </li>
                            <li><a href="/member/ebook/0">E-Book</a></li>
                            <li>View</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">

                    <!-- *** LEFT COLUMN ***
			_________________________________________________________ -->

                    <div class="col-sm-9">
                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to  details</a>
                        </p>

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                                    <img src="<?php echo base_url().$book['image1']?>" alt="" class="img-responsive">
                                </div>

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                        <!--         <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div> -->
                                <!-- /.ribbon -->
                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                        <p class="price">Rp.<?php echo number_format($book['harga'],0,',','.'); ?></p>

                                        <p class="text-center">
                                          
                                                <button type="button" class="btn btn-template-main" data-toggle="modal" data-target="#buy"><i class="fa fa-shopping-cart"></i>Beli</button>
                                           
                                        </p>

                                </div>

                                <div class="row" id="thumbs">
                                    <div class="col-xs-4">
                                        <a href="<?php echo base_url().$book['image1']?>" class="thumb">
                                            <img src="<?php echo base_url().$book['image1']?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                     <?php if (strlen($book['image2'])>10) { ?>
                                    
                                    <div class="col-xs-4">
                                        <a href="<?php echo base_url().$book['image2']?>" class="thumb active">
                                            <img src="<?php echo base_url().$book['image2']?>" alt="" class="img-responsive">
                                        </a>
                                    </div>

                                    <?php } ?>
                                    <?php if (strlen($book['image3'])>10) { ?>
                                    
                                    <div class="col-xs-4">
                                        <a href="<?php echo base_url().$book['image3']?>" class="thumb active">
                                            <img src="<?php echo base_url().$book['image3']?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    
                                    <?php } ?>
                                </div>
                            </div>

                        </div>


                        <div class="box" id="details">
                            <blockquote>
                                </p><h4>Judul</h4>
                                <p><?php echo $book['judul_dok']; ?></p>
                                <h4>Keyword</h4>
                                <ul>
                                    <?php echo $book['keyword']; ?>
                                </ul>
                                <h4>Abstrak</h4>
                                <ul>
                                   <?php echo $book['abstrak']; ?>
                                </ul>   
                            </blockquote>
                        </div>


                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			_________________________________________________________ -->

                    <div class="col-sm-3">

                        <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                <?php foreach ($kat as $key => $value) { ?>
                                    <li>
                                        <a href="/admin/ebook/<?php echo $value['id'];?>"><?php echo $value['nama_kategori']; ?><span class="badge pull-right"><?php echo $value['jml']; ?></span></a>
                                    </li>
                                 <?php } ?>   
                                </ul>

                            </div>
                        </div>
                        <!-- *** MENUS AND FILTERS END *** -->
                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


    
        <!-- Modal -->
        <div id="buy" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <blockquote style="margin-bottom: 0 !important;">
                 
                    <h4 class="modal-title">Beli</h4>.
                  
                </blockquote>
              </div>
              <div class="modal-body">
              <div class="forms">
                <form method="">
                    <input type="text"  name="iddok" hidden value="<?php echo $book['iddok']; ?>" placeholder="">  
                    <input type="text"  name="idu" hidden value="<?php echo $this->session->userdata('idAuth'); ?>" placeholder="">
                    <input type="text" hidden="" name="no_dok" value="<?php echo $book['no_dok']; ?>"> 
                    <input type="text" hidden="" name="harga" value="<?php echo $book['harga']; ?>">
                    <div class="row">
                            
                        <div class="col-md-6">
                            <div class="form-group" style="margin-bottom: 0 !important;">
                                <label for="" style="margin-bottom: 0 !important;">Nama Produk :</label>
                                <strong style="color: #467fbf;"><?php echo $book['judul_dok']; ?></strong>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="margin-bottom: 0 !important;">
                                <label for="" style="margin-bottom: 0 !important;">Total Harga Produk :</label>
                                <strong  style="color: #467fbf;">Rp.<?php echo number_format($book['harga'],0,',','.'); ?></strong>
                            </div>  
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="">Nama Pembeli :</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user['nama'] ?>" placeholder="" required="">   
                    </div>  

                    <div class="form-group">
                        <label for="">E-mail :</label>
                        <input type="text" class="form-control" name="tlp" value="<?php echo $user['email'] ?>" placeholder="" required="">
                        <small class="muted">[Kode Konfirmasi Akan dikirim Lewat E-mail Address ini]</small>   
                    </div>  


                    <div class="form-group">
                        <label for="">No Tlp :</label>
                        <input type="text" class="form-control" name="tlp" value="<?php echo $user['tlp'] ?>" placeholder="" required="">   
                    </div>  

                    <div class="form-group">
                        <label for="">Alamat :</label>
                        <textarea required="" class="form-control" name="alamat"><?php echo $user['alamat'] ?></textarea>
                    </div>

                    <strong>Ketentuan</strong>
                    <ul>
                        <li>Pembayaran dapat dilakukan melalui transfer ke rekening Bank.</li>
                        <li>Konfirmasi pembayaran Anda akan dikirimkan via E-mail, pastikan E-mail yang anda cantumkan aktif. </li>
                        <li>Setelah melakukan pembayaran segera Konfirmasi pembayaran Anda pada menu pembelian.</li>
                    </ul>
              </div>
              <div class="suc" style="display: none;">
              
              	       Hi&nbsp; <?php echo $this->session->userdata('user'); ?><br>
                         <center>Terimakasih telah melakukan pembelian di BMLearning.</center> <br>
                          <table style="text-align : left;" class="table">
                          	<tr>
                          		<th>Id Transaksi</th>
                          		<th>:</th>
                          		<td id="t_id"></td>
                          	</tr>
                          	<tr>
                          		<th>Nama Produk</th>
                          		<th>:</th>
                          		<td><?php echo $book['judul_dok']; ?></td>
                          	</tr>
                          	<tr>
                          		<th>Total Harga</th>
                          		<th>:</th>
                          		<td id="harg"></td>
                          	</tr>
                          </table>
                                                          	
                         <p> Harap segera menyelesaikan transaksi pemberian ke nomor rekening yang telah tersedia sebelum tanggal <b id="exp"></b><br> <center> <strong> Nomor rekening :  
                          	7056589157 <br> Bank Syariah Mandiri a.n PT.BAMA </strong></center> <br></p>
                         <p style="font-size:15px; text-align:left; color:#000; ">Pastikan Nominal yang Anda Kirim sesuai dengan yang tercantum agar mempercepat proses konfirmasi pembayaran. 
                         </p>
                                                            
                       </td>
                   </tr>

              </div>
              </div>
              <div class="modal-footer">
                <div class="forms">
                    <button type="submit" id="_submit" class="btn btn-template-primary btn-flat btn-block" ><i class="fa fa-shopping-cart" data-dismiss="modal"></i>Beli Produk Ini</button>
                </div>
                <div class="suc" style="display: none;">
                     <button class="btn btn-danger pull-right" onclick="reload();" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
                </form>
            </div>

          </div>
        </div>


   <!-- Modal -->
        <div id="info" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal">&times;</button>
                <blockquote style="margin-bottom: 0 !important;">
                    <h4 class="modal-title">Informasi</h4>
                </blockquote>
              </div>
              <div class="modal-body">
                    <center>
                        Silahkan menyelesaikan pembayaran sebelum melakukan download.
                    </center>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger pull-right" type="button" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


<script type="text/javascript">
    
$(document).ready(function($){

    var iddok   = $("input[name=iddok]");
    var idu     = $("input[name=idu]");
    var tlp     = $("input[name=tlp]");
    var alamat  = $("textarea[name=alamat]");
    var harga   = $("input[name=harga]");
    var no_dok  = $("input[name=no_dok]");
    var base_url= "<?php echo base_url();?>";

    $("#_submit").click(function(e){
    $('#_submit').attr("disabled", true);   
    e.preventDefault();
    $.ajax({
        type    : "POST",
        url     : base_url+"admin/buy",
        data    : {
            'iddok' : iddok.val(),
            'idu'   : idu.val(),
            'tlp'   : tlp.val(),
            'alamat': alamat.val(),
            'harga' : harga.val(),
            'no_dok': no_dok.val(),
        },
        success: function(result){
                var obj = $.parseJSON(result);
                // console.log(obj);
                // console.log(obj); alert(JSON.stringify(obj));
                if(obj['result'] == true){
                   $(".forms").hide();
                   $(".suc").show();
                   $("#t_id").text(obj['id_tran']);
                   $("#harg").html('Rp.'+Number(obj['harga']).toLocaleString('bali'));
                   $("#exp").text(obj['exp']);
                   $(".suc").focus();

                }else{
                  
                }
            },
        });
    });
});

function reload(){
    location.reload();
}


</script>
