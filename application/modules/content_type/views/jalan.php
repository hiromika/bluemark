<div class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
                    <h3 class="box-title">Data Tree : Tipe Konten</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<a href="/content_type/add" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i> Tambah</a>
                    <ul class="easyui-tree">
                        <li>
                            <span><a href="/content_type">Ruas</a></span>
                            <ul>
                                <li><a href="/content_type/jalan">Jalan</a></li>
                                <li><a href="#">Jembatan</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
                    <h3 class="box-title">Tipe Konten : Jalan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<form role="form">
                		<div class="form-group">
                			<label>Deskripsi</label>
                			<textarea class="form-control" rows="3" placeholder="">Deskripsi tipe konten "Jalan", penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</textarea>
                		</div>
                		<div class="form-group">
                			<label>Referensi</label>
                			<select class="form-control">
                                <option>--</option>
                                <option selected>Ruas</option>
                                <option>Jembatan</option>
                            </select>
                		</div>
                	</form>
                	<hr>
                	<h4>Atribut</h4>
                	<form role="form">
                		<table class="table table-striped table-hovered">
                			<thead>
                				<tr>
                					<th>Name</th>
                					<th>Label</th>
                					<th>Type</th>
                					<th>Value</th>
                					<th>Required</th>
                					<th>Actions</th>
                				</tr>
                			</thead>
                			<tbody>
                				<tr>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="ref_ruas" readonly>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="Ruas">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<select class="form-control" disabled>
				                                <option selected>Text</option>
				                                <option>Number</option>
				                                <option>Date</option>
				                                <option>Combo</option>
				                                <option>Checkbox</option>
                                                <option>Radio</option>
				                                <option selected>Reference</option>
				                            </select>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
                							<textarea class="form-control" rows="2" placeholder="" readonly>Ruas</textarea>
                						</div>
                					</td>
                					<td>
                						<input type="checkbox" checked>
                					</td>
                					<td>
                						<a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan Atribut');"><i class="fa fa-trash"></i></a>
                					</td>
                				</tr>
                				<tr>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="nama_jalan" readonly>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="Nama Jalan">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<select class="form-control" disabled>
				                                <option selected>Text</option>
				                                <option>Number</option>
				                                <option>Date</option>
				                                <option>Combo</option>
				                                <option>Checkbox</option>
                                                <option>Radio</option>
				                                <option>Reference</option>
				                            </select>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
                							<textarea class="form-control" rows="2" placeholder="" readonly></textarea>
                						</div>
                					</td>
                					<td>
                						<input type="checkbox" checked>
                					</td>
                					<td>
                						<a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan Atribut');"><i class="fa fa-trash"></i></a>
                					</td>
                				</tr>
                				<tr>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="jalan_kode_provinsi" readonly>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="Kode Provinsi">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<select class="form-control" disabled>
				                                <option>Text</option>
				                                <option selected>Number</option>
				                                <option>Date</option>
				                                <option>Combo</option>
				                                <option>Checkbox</option>
                                                <option>Radio</option>
				                                <option>Reference</option>
				                            </select>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
                							<textarea class="form-control" rows="2" placeholder="" readonly></textarea>
                						</div>
                					</td>
                					<td>
                						<input type="checkbox" checked>
                					</td>
                					<td>
                						<a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan Atribut');"><i class="fa fa-trash"></i></a>
                					</td>
                				</tr>
                				<tr>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="jalan_nama_provinsi" readonly>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="Nama Provinsi">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<select class="form-control" disabled>
				                                <option selected>Text</option>
				                                <option>Number</option>
				                                <option>Date</option>
				                                <option>Combo</option>
				                                <option>Checkbox</option>
                                                <option>Radio</option>
				                                <option>Reference</option>
				                            </select>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
                							<textarea class="form-control" rows="2" placeholder="" readonly></textarea>
                						</div>
                					</td>
                					<td>
                						<input type="checkbox" checked>
                					</td>
                					<td>
                						<a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan Atribut');"><i class="fa fa-trash"></i></a>
                					</td>
                				</tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="" value="panjang_jalan" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="" value="Panjang Jalan">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" disabled>
                                                <option selected>Text</option>
                                                <option>Number</option>
                                                <option>Date</option>
                                                <option>Combo</option>
                                                <option>Checkbox</option>
                                                <option>Radio</option>
                                                <option>Reference</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="2" placeholder="" readonly></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" checked>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan Atribut');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                			</tbody>
                		</table>

                		<hr>
                		<h4>Tambah Attribut</h4>
                		<table class="table">
                			<thead>
                				<tr>
                					<th>Name</th>
                					<th>Label</th>
                					<th>Type</th>
                					<th>Value</th>
                					<th>Required</th>
                				</tr>
                			</thead>
                			<tbody>
                				<tr>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<input type="text" class="form-control" placeholder="" value="">
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
	                            			<select class="form-control">
				                                <option>Text</option>
				                                <option>Number</option>
				                                <option>Date</option>
				                                <option>Combo</option>
				                                <option>Checkbox</option>
                                                <option>Radio</option>
				                                <option>Reference</option>
				                            </select>
	                            		</div>
                					</td>
                					<td>
                						<div class="form-group">
                							<textarea class="form-control" rows="2" placeholder="" readonly>Available for Combo, Checkbox, Radio</textarea>
                						</div>
                					</td>
                					<td>
                						<input type="checkbox" checked>
                					</td>
                				</tr>
                			</tbody>
                		</table>

                		<hr>
                		<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                		<button class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan tipe konten')"><i class="fa fa-trash"></i> Hapus</button>                            		
                	</form>
                </div>
			</div>
		</div>
	</div>
</div>