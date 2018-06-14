<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
			  <div class="box-header">
    			<h3 class="box-title">Rekapan Perbulan</h3>
				 <div class="row">
				  <div class="col-md-6"><br>
				    <form action="/finance/cariRekap" method="POST" accept-charset="utf-8" class="form-horizontal">

				      <div class="form-group">
				      <label class="control-label col-sm-3" for="bulan"> Tanggal:</label>
				      <div class="col-sm-9">
				            <input class="form-control" type="text" id="date" name="tgl"  placeholder="Bulan-Tahun" required="">
				      </div>
				      </div> 

				      <div class="form-group">
				      <div class="col-sm-9 col-md-offset-3"><br>
				      <button type="submit" class="btn btn-info ">Search</button>
				      </div>
				      </div>
				    </form>
				  </div>
				</div>
  			  </div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
						<?php if (empty($tgl)) {
						}else{ ?>
						 <table class="table table-renponsive">
                                <thead>
                                    <tr>
                                        <th> <h3 align="center">Rekap <?php echo ''.date('d-M-Y',strtotime($tgl['start'])).' s/d '.date('d-M-Y',strtotime($tgl['end'])).'';  ?></h3></th>
                                    </tr>
                                </thead>
                            </table><?php }?>	
							<table class="table table-bordered">

								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Akun</th>
										<th>Kategori</th>
										<th class="success">Debet</th>
										<th class="danger">Kredit</th>
										<th>Komponen</th>
										<th>Cleint</th>
										<th>Note</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$no=1;
								$debet=0;
								$kredit=0;
								foreach ($data as $key => $value) {
								 ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo date('d-M-Y', strtotime($value['tanggal'])); ?></td>
										<td><?php echo $value['nama_akun']; ?></td>
										<td><?php echo $value['nama_kategori']; ?></td>
										<td class="success">Rp.<?php echo number_format($value['debet'],0,',','.'); ?></td>
										<td class="danger">Rp.<?php echo number_format($value['kredit'],0,',','.'); ?></td>
										<td><?php echo $value['nama_komponen']; ?></td>
										<td><?php echo $value['nama_client']; ?></td>
										<td><?php echo $value['note']; ?></td>
									</tr>
									<?php 
									$kredit += $value['kredit'];
									$debet += $value['debet'];
									$no++;
										} 
									?>
									<tr>
										<th colspan="4"> <center>Jumlah Saldo :</center>  </th>
										<th>Rp.<?php echo number_format($debet,0,',','.'); ?></th>
										<th>Rp.<?php echo number_format($kredit,0,',','.'); ?></th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="box-footer">
				<?php if (empty($tgl)) {
				}else{ ?>

				<form action="finance/printRekap" method="POST">
					<input style="display: none;" type="text" name="tgl"  <?php echo 'value="'.$tgl['start'].'-'.$tgl['end'].'"'; ?>>
					<button type="submit" class="btn btn-info pull-right"><span class="fa fa-print"></span> Print</button>
				</form>
				<?php } ?>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('#date,#date2').daterangepicker({
		format:'YYYY-MM-DD'
	});
})
</script>