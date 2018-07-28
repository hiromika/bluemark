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
                            <li>E-Book</li>
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

                        <div class="row products">

                        <?php foreach ($book as $key => $value) { ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="/member/ebookView/<?php echo $value['iddok'] ?>">
                                            <img src="<?php echo base_url().$value['image1']; ?>" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <!-- /.image -->
                                    <div class="text">
                                        <h3 style="margin-bottom: 0 !important;"><a href="/member/ebookView/<?php echo $value['iddok'] ?>"><?php echo $value['judul_dok'] ?></a></h3>

                                        <p><a href="/member/ebookView/<?php echo $value['iddok'] ?>" class="btn btn-sm btn-template-main">View detail</a></p>
                                       
                                        <p class="price">Rp.<?php echo number_format($value['harga'],0,',','.'); ?></p>
                                    
                                    </div>
                                    <!-- /.text -->

                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <!-- /.ribbon -->

                                   <!--  <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div> -->
                                    <!-- /.ribbon -->
                                </div>
                                <!-- /.product -->
                            </div>
                        <?php } ?>

                            <!-- /.col-md-4 -->
                        </div>
                        <!-- /.products -->

                        <div class="row">

                            <div class="col-md-12 banner">
                                <a href="#">
                                    <img src="img/banner2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>

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
                                        <a href="/member/ebook/<?php echo $value['id'];?>"><?php echo $value['nama_kategori'];?><span class="badge pull-right"><?php echo $value['jml']; ?></span></a>
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