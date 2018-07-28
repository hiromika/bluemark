<?php 
$level = $this->session->userdata('level');
if ($level > 1) { ?>
    <div id="content">
            <div class="container">

                <div class="col-sm-6 col-sm-offset-3" id="error-page">

                    <div class="box">

                        <p class="text-center">
                            <a href="index.html">
                                <img src="<?php echo base_url();?>assets/img/bm_logo.png" alt="e">
                            </a>
                        </p>

                        <h3>We are sorry - this page is not here anymore</h3>
                        <h4 class="text-muted">Error 404 - Page not found</h4>

                        <p class="buttons"><a href="<?php echo base_url();?>member" class="btn btn-template-main"><i class="fa fa-home"></i> Go to Homepage</a>
                        </p>
                    </div>

                </div>
                <!-- /.col-sm-6 -->
            </div>
            <!-- /.container -->
        </div>
<?php }elseif ($level = 1) {
?>
 <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Info</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin">Home</a>
                    </li>
                    <li>Info</li>
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
        <h5>Info</h5>
        <a href="<?php echo base_url();?>admin" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-arrow-left"></span></a>
    </div>

    <form action="cariInfo" method="POST" class="form form-horizontal" accept-charset="utf-8">
      <div class="form-group">
      <label>Tanggal Awal</label>
        <input type="date" class="form-control" name="tgl_a" placeholder="Tanggal Awal" required="">
      </div>
      <div class="form-group">
      <label>Tanggal Akhir</label>
        <input type="date" class="form-control" name="tgl_b" placeholder="Tanggal Akhir" required="">
      </div>
      <button type="submit" class="btn btn-info">Cari</button>
    </form>

    <div class="row">
    <div class="col-md-6">

       <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border heading">
              <h5>Jumlah Yang Mendaftar Kelas </h5>
            </div>
            <div class="box-body chart-responsive">

              <div class="chart" id="revenue-chart" style="height: 300px;"></div>

            </div>
            <!-- /.box-body -->
          </div>


  <!--   <table class="table">
      <caption>Jumlah Yang Mendaftar Kelas </caption>
      <thead>
        <tr>
          <th>Bulan</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      foreach ($info as $key => $value) { ?>

        <tr>
          <td><?php echo date('M',strtotime($value['date'])); ?></td>
          <td><?php echo $value['jumlah']; ?></td>
        </tr>
        <?php 
            }
        ?>

      </tbody>
    </table> -->
    </div> 

    <div class="col-md-6">
      <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border heading">
              <h5>Jumlah Yang Mendaftar Kelas Dan Hadir </h5>
            </div>
            <div class="box-body chart-responsive">

              <div class="chart" id="revenue-chartT" style="height: 300px;"></div>

            </div>
            <!-- /.box-body -->
          </div>

  <!--   <table class="table">
      <caption>Jumlah Yang Mendaftar Kelas Dan Hadir </caption>
      <thead>
        <tr>
          <th>Bulan</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      foreach ($infoT as $key => $value) { ?>

        <tr>
          <td><?php echo date('M',strtotime($value['date'])); ?></td>
          <td><?php echo $value['jumlah']; ?></td>
        </tr>
        <?php 
            }
        ?>

      </tbody>
    </table> -->
    </div>
    </div>

  </div>
</div>
<?php print_r($dat); ?>
</section>
        


<script type="text/javascript">

$(function(){
	$('#tbl').DataTable({
		    "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, 'desc']],
        "info": true,
        "autoWidth": true,
        "ordering": false,
	});	
});	


$(document).ready(function(){
    var tgla = <?php echo $dat['tgl_a'];?>;
  var tglb = <?php echo $dat['tgl_b'];?>;
  $.ajax({
      url: "<?php echo base_url('admin/getCariInfo');?>",
      type: "POST",
      dataType: "JSON",
      data:{tgla=tgla,tglb=tglb},
      timeout:3000,
      success : function (response) {
      // var data = $.parseJSON(response);
      // console.log(data);
      // console.log(data); alert(JSON.stringify(data));
      Morris.Area({
        element: 'revenue-chart',
        data: response,
        hideHover: 'auto',
        lineColors: ['#a0d0e0', '#3c8dbc'],
        resize: true,
        parseTime: false,
        xkey: ['date'],
              ykeys: ['jumlah'],
              labels: ["Daftar"]
      });
    },
    error : function (xmlHttpRequest, textStatus, errorThrown) {
         alert("Error " + errorThrown);
         if(textStatus==='timeout')
             alert("request timed out");
    } 
  });

});

$(document).ready(function(){
  var tgla = <?php echo $dat['tgl_a'];?>;
  var tglb = <?php echo $dat['tgl_b'];?>;
  $.ajax({
      url: "<?php echo base_url('admin/getCariInfoT');?>",
      type: "POST",
      dataType: "JSON",
      data:{tgla=tgla,tglb=tglb},
      timeout:3000,
      success : function (response) {
      // var data = $.parseJSON(response);
      // console.log(data);
      // console.log(data); alert(JSON.stringify(data));
      Morris.Area({
        element: 'revenue-chartT',
        data: response,
        hideHover: 'auto',
        lineColors: ['#a0d0e0', '#3c8dbc'],
        resize: true,
        parseTime: false,
        xkey: ['date'],
              ykeys: ['jumlah'],
              labels: ["Hadir"]
      });
    },
    error : function (xmlHttpRequest, textStatus, errorThrown) {
         alert("Error " + errorThrown);
         if(textStatus==='timeout')
             alert("request timed out");
    } 
  });

});

// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);  
// });
</script>

<?php } ?>
