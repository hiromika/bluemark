        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>E-Book</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/dashboard">Home</a>
                            </li>
                            <li><a href="/dashboard/ebook/0">E-Book</a></li>
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
                                            <button type="button" class="btn btn-template-main" data-toggle="modal" data-target="#login-modal" ><i class="fa fa-shopping-cart"></i>Beli</button>
                                           <!--  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                            </button> -->
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
                                        <a href="/dashboard/ebook/<?php echo $value['id'];?>"><?php echo $value['nama_kategori']; ?><span class="badge pull-right"><?php echo $value['jml']; ?></span></a>
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
                    <h4 class="modal-title">Beli</h4>
                </blockquote>
              </div>
              <div class="modal-body">
                <form action="#" method="POST" accept-charset="utf-8">
                    <input type="text"  name="iddok" hidden value="<?php echo $book['id']; ?>" placeholder="">
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
                                <strong style="color: #467fbf;">Rp.<?php echo number_format($book['harga'],0,',','.'); ?></strong>
                            </div>  
                        </div>
                    </div>

                    
                    <hr>

                    <div class="form-group">
                        <label for="">Nama Pembeli :</label>
                        <input type="text" class="form-control" name="name" value="" placeholder="Nama Pembeli">   
                    </div>  

                    <div class="form-group">
                        <label for="">E-mail :</label>
                        <input type="text" class="form-control" name="tlp" value="" placeholder="E-mail">
                        <small class="muted">[Kode Konfirmasi Akan dikirim Lewat E-mail Address ini]</small>   
                    </div>  


                    <div class="form-group">
                        <label for="">No Tlp :</label>
                        <input type="text" class="form-control" name="tlp" value="" placeholder="No Tlp">   
                    </div>  

                    <div class="form-group">
                        <label for="">Alamat :</label>
                        <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                    </div>

                    <strong>Ketentuan Pembayaran</strong>
                    <ul>
                        <li>Pembayaran dapat dilakukan melalui transfer ke rekening Bank </li>
                    </ul>
                </form>
              </div>
              <div class="modal-footer">
                <button  href=""  type="submit" class="btn btn-template-primary btn-flat btn-block"><i class="fa fa-shopping-cart"></i>Beli Produk Ini</button>
              </div>
            </div>

          </div>
        </div>