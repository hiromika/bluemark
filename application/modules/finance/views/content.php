<style type="text/css">
.small-box .icon{
    font-size: 60px;
  }
.small-box:hover .icon{font-size:65px}
</style>
<div class="content">
<div class="row">
        <div class="col-md-2 col-md-offset-1 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Income</h4>
            </div>
            <div class="icon">
              <i class="ion ion-plus-round"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#income">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Expense</h4>
            </div>
            <div class="icon">
              <i class="ion ion-minus-round"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#expense">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Transfer</h4>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-swap"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#transfer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Acount Detail</h4>
            </div>
            <div class="icon">
              <i class="ion ion-information"></i>
            </div>
            <a href="finance/akun_detail" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-md-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h4>Project/Service</h4>
            </div>
            <div class="icon">
              <i class="ion ion-information"></i>
            </div>
            <a href="finance/project_service" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
  </div>




  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
        <table class="table table-hover" id="cashflow" cellspacing="1" style="background-color: #FFF">
          <thead>
            <tr>
              <th style="display:none;"></th>
              <th>Tanggal</th>
              <th>Akun</th>
              <th style="display:none;"></th>
              <th>Kategori</th>
              <th style="display:none;"></th>
              <th class="success">Debet</th>
              <th class="danger">Kredit</th>
              <th>Saldo</th>
              <th>Komponen</th>
              <th style="display:none;"></th>
              <th>CLIENT</th>
              <th>note</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach ($cashFlow as $key => $value) {
          ?>
                <tr>
                  <td style="display:none;"><?php echo $value['id_transaksi'];?></td>
                  <td><?php echo date('d-m-Y',strtotime($value['tanggal'])); ?></td>
                  <td><?php echo $value['nama_akun']; ?></td>
                  <td style="display:none;" ><?php echo $value['kode_akun']; ?></td>
                  <td><?php echo $value['nama_kategori']; ?></td>
                  <td style="display:none;"><?php echo $value['kode_kategori']; ?></td>
                  <td class="success">Rp.<?php echo number_format($value['debet'],0,',','.'); ?></td>
                  <td class="danger">Rp.<?php echo number_format($value['kredit'],0,',','.'); ?></td>
                  <td>Rp.<?php echo number_format($value['saldo_smtr'],0,',','.'); ?></td>
                  <td><?php echo $value['nama_komponen']; ?></td>
                  <td style="display:none;"><?php echo $value['kode_komponen']; ?></td>
                  <td><?php echo $value['nama_client']; ?></td>
                  <td><?php echo $value['note']; ?></td>
                  <td>
                    <?php 
                      if($max_transaksi_id['max_id'] === $value['id_transaksi']) {                 
                    ?>
                      <a href="" data-toggle="modal" data-id="<php echo $value['id_transaksi']; ?>" data-target="#update" class=" btn btn-primary btn-xs" role="button">Edit</a> 
                      <a href="/finance/delete/<?php echo $value['id_transaksi'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" role="button">Hapus</a>
                    <?php
                      } 
                    ?>
                  </td> 
                    
                </tr>
          <?php    
              }
          ?>  
          </tbody>
        </table>
        </div>
        </div>
    </div>
  </div>


<!-- Modal -->
<div id="income" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Income</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="/finance/income" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" for="tgl">Tanggal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" id="date1" name="tanggal" placeholder="Tanggal" required="">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="akun">Akun :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_akun" required="">
          <?php
                       foreach ($kd_akun as $key => $value) {

                        echo '<option value="'.$value['kode_akun'].'">'.$value['nama_akun'].'</option>';
                    }
                    ?>
          </select>
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" for="kategori">Kategori :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_kategori" required="">
          <?php
                       foreach ($kd_kator as $key => $value) {

                        echo '<option value="'.$value['kode_kategori'].'">'.$value['nama_kategori'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>   
<div class="form-group">
<label class="control-label col-sm-3" for="Nominal">Nominal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" required="">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="komponen">Komponen :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_komponen" required="">
          <?php
                       foreach ($kd_kom as $key => $value) {

                        echo '<option value="'.$value['kode_komponen'].'">'.$value['nama_komponen'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="client">Client :</label>
<div class="col-sm-7">
          <select class="form-control" name="client" required="">
          <?php
                       foreach ($client as $key => $value) {

                        echo '<option value="'.$value['id'].'">'.$value['nama_client'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>  
<div class="form-group">
<label class="control-label col-sm-3" for="note">Note :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="note" id="note" placeholder="Notel">
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div id="expense" class="modal fade">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Expense</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="/finance/expense" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" for="tgl">Tanggal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" id="date2" name="tanggal" placeholder="Tanggal" required="">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="akun">Akun :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_akun" required="">
          <?php
                       foreach ($kd_akun as $key => $value) {

                        echo '<option value="'.$value['kode_akun'].'">'.$value['nama_akun'].'</option>';
                    }
                    ?>
          </select>
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" for="kategori">Kategori :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_kategori" required="">
          <?php
                       foreach ($kd_kator as $key => $value) {
                        echo '<option value="'.$value['kode_kategori'].'">'.$value['nama_kategori'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>   
<div class="form-group">
<label class="control-label col-sm-3" for="Nominal">Nominal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="komponen">Komponen :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_komponen" required="">
          <?php
                       foreach ($kd_kom as $key => $value) {
                        echo '<option value="'.$value['kode_komponen'].'">'.$value['nama_komponen'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="client">Client :</label>
<div class="col-sm-7">
          <select class="form-control" name="client" required="">
          <?php
                       foreach ($client as $key => $value) {

                        echo '<option value="'.$value['id'].'">'.$value['nama_client'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>  
<div class="form-group">
<label class="control-label col-sm-3" for="note">Note :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="note" id="note" placeholder="Notel">
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div id="transfer" class="modal fade" >
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Transfer</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="/finance/transfer" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" for="tgl">Tanggal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" id="date3" name="tanggal" placeholder="Tanggal" required="">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="akun">From :</label>
<div class="col-sm-7">
          <select class="form-control" name="from_akun" required="">
          <?php
                       foreach ($kd_akun as $key => $value) {
                        echo '<option value="'.$value['kode_akun'].'">'.$value['nama_akun'].'</option>';
                    }
                    ?>
          </select>
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" for="akun">TO :</label>
<div class="col-sm-7">
          <select class="form-control" name="to_akun" required="">
          <?php
                       foreach ($kd_akun as $key => $value) {
                        echo '<option value="'.$value['kode_akun'].'">'.$value['nama_akun'].'</option>';
                    }
                    ?>
          </select>
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" for="Nominal">Nominal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" required="">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="komponen">Komponen :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_komponen" required="">
          <?php
                       foreach ($kd_kom as $key => $value) {
                        echo '<option value="'.$value['kode_komponen'].'">'.$value['nama_komponen'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="client">Client :</label>
<div class="col-sm-7">
          <select class="form-control" name="client" required="">
          <?php
                       foreach ($client as $key => $value) {

                        echo '<option value="'.$value['id'].'">'.$value['nama_client'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>  
<div class="form-group">
<label class="control-label col-sm-3" for="note">Note :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="note" id="note" value="Transfer" placeholder="Notel">
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div id="update" class="modal fade">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Edit</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="/finance/update" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" id="_id">
<div class="form-group">
<label class="control-label col-sm-3" for="tgl">Tanggal :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" id="date5" name="tanggal" placeholder="Tanggal" >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="akun">Akun :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_akun" id="_akun">
          <?php
                       foreach ($kd_akun as $key => $value) {
                        echo '<option  value="'.$value['kode_akun'].'">'.$value['nama_akun'].'</option>';
                    }
                    ?>
          </select>
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" for="kategori">Kategori :</label>
<div class="col-sm-7">
          <select class="form-control" name="nama_kategori" id="_kategori">

          <?php
                       foreach ($kd_kator as $key => $value) {
                        echo '<option  value="'.$value['kode_kategori'].'">'.$value['nama_kategori'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>   
<div class="form-group">
<label class="control-label col-sm-3" for="Nominal">Debet :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="debet" id="_debet" placeholder="Nominal">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Nominal">Kredit :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="kredit" id="_kredit" placeholder="Nominal">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="komponen">Komponen :</label>
<div class="col-sm-7">
<select class="form-control" name="nama_komponen"  id="_komponen">
          <option value="" disabled selected>Choose Options</option>
          <?php
                       foreach ($kd_kom as $key => $value) {
                        echo '<option value="'.$value['kode_komponen'].'">'.$value['nama_komponen'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="client">Client :</label>
<div class="col-sm-7">
          <select class="form-control" name="client" required="">
          <?php
                       foreach ($client as $key => $value) {

                        echo '<option value="'.$value['id'].'">'.$value['nama_client'].'</option>';
                    }
                    ?>
          </select>
</div>
</div>  
<div class="form-group">
<label class="control-label col-sm-3" for="note">Note :</label>
<div class="col-sm-7">
          <input type="text" class="form-control" name="note" id="_note" placeholder="Notel">
</div> 
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(function(){
    $('#cashflow').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "order": [[0, 'desc']],
      "info": true,
      "autoWidth": false
    });                
});

$(function () {
        $('#date1,#date2,#date3,#date5').datetimepicker({
        format: 'DD MMMM YYYY',
  });     
});

/*update*/
$(".btn[data-target='#update']").on('click',function(){
  $("#_id").val($(this).closest('tr').children()[0].textContent);
  $("#date5").val($(this).closest('tr').children()[1].textContent);
  $("#_akun").val($(this).closest('tr').children()[3].textContent);
  $("#_kategori").val($(this).closest('tr').children()[5].textContent);
  $("#_debet").val($(this).closest('tr').children()[6].textContent);
  $("#_kredit").val($(this).closest('tr').children()[7].textContent);
  $("#_komponen").val($(this).closest('tr').children()[10].textContent);
  $("#_client").val($(this).closest('tr').children()[11].textContent);
  $("#_note").val($(this).closest('tr').children()[12].textContent);
  console.log($(this).closest('tr').children()[9].textContent); 
});


</script>