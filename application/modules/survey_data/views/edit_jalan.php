<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <ul class="easyui-tree">
                        <li>
                            <span><a href="/survey_data">DKI Jakarta</a></span>
                            <ul>
                                <li>
                                    <span><a href="">Jakarta Selatan</a></span>
                                    <ul>
                                        <li><a href="/survey_data/jalan">Jalan Ciledug Raya</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span><a href="">Jakarta Timur</a></span>
                                    <ul>
                                        <li><a href="/survey_data/jalan">Jalan Cipinang Raya</a></li>
                                        <li><a href="/survey_data/jalan">Jembatan Cipinang</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class=""><a href="#dokumen" data-toggle="tab" aria-expanded="false">Dokumen</a></li>
                    <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Detail</a></li>
                    <li class="pull-left header">Detail Jalan</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="detail">
                        <form role="form">
                            <div class="form-group">
                                <label>Ruas</label>
                                <select class="form-control">
                                    <option>RS/IX/1188 - Ipsum sit amet</option>
                                    <option>RS/XXI/1209 - Donec</option>
                                    <option>RS/III/6621 - Ipsum sit amet</option>
                                    <option selected>RS/X/9128 - Lorem Selatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Jalan</label>
                                <input type="text" class="form-control" placeholder="" value="Jalan Lorem 1">
                            </div>
                            <div class="form-group">
                                <label>Kode Provinsi</label>
                                <input type="text" class="form-control" placeholder="" value="123123">
                            </div>
                            <div class="form-group">
                                <label>Nama Provinsi</label>
                                <input type="text" class="form-control" placeholder="" value="Ipsum sit amet">
                            </div>
                            <div class="form-group">
                                <label>Panjang Jalan</label>
                                <input type="text" class="form-control" placeholder="" value="70 KM">
                            </div>
                            <hr>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            <button class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan data Jalan');"><i class="fa fa-trash"></i> Hapus</button>
                            <a href="/survey_data/jalan" class="btn btn-default pull-right">Halaman List</a>
                        </form>
                    </div>

                    <div class="tab-pane" id="dokumen">
                        <p class="margin">
                            <a class="btn btn-app" href="/survey_data/add_jalan_file">
                                <span class="fa fa-upload"></span>
                                Upload
                            </a>
                        </p>

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#vs" data-toggle="tab" aria-expanded="true">Visibility Study</a></li>
                                <li class=""><a href="#amdal" data-toggle="tab" aria-expanded="false">AMDAL</a></li>
                                <li class=""><a href="#dl" data-toggle="tab" aria-expanded="false">Dokumen Lelang</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="vs">
                                    <table id="dtTbls" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>Unit Kerja</th>
                                                <th>Arsip</th>
                                                <th width="18%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ASD1237</td>
                                                <td>sit-amet.pdf</td>
                                                <td>Sekretariat</td>
                                                <td>Cabinet 1, Rack 3, Box 3</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>AHFGO912</td>
                                                <td>donec-cisera.pdf</td>
                                                <td>Sekretariat</td>
                                                <td>Cabinet 1, Rack 3, Box 3</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>AFSIU17</td>
                                                <td>donec-cisera.img</td>
                                                <td>Sekretariat</td>
                                                <td>Cabinet 1, Rack 3, Box 3</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ASD1237</td>
                                                <td>sit-amet.pdf</td>
                                                <td>Tata Usaha</td>
                                                <td>Cabinet 1, Rack 1, Box 1</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>AHFGO912</td>
                                                <td>donec-cisera.pdf</td>
                                                <td>Hubungan Masyarakat</td>
                                                <td>Cabinet 1, Rack 2, Box 1</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>AFSIU17</td>
                                                <td>donec-cisera.img</td>       
                                                <td>Hubungan Masyarakat</td>
                                                <td>Cabinet 1, Rack 2, Box 1</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="amdal">
                                    <table id="dtTbls2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>Unit Kerja</th>
                                                <th>Arsip</th>
                                                <th width="18%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>DSA6722</td>
                                                <td>sit-amet.pdf</td>
                                                <td>Hubungan Masyarakat</td>
                                                <td>Cabinet 1, Rack 2, Box 1</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a class="btn btn-default">Detail</a>
                                                        <a class="btn btn-danger" onclick="confirm('Konfirmasi penghapusan file')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="dl">
                                    <table id="dtTbls3" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>Unit Kerja</th>
                                                <th>Arsip</th>
                                                <th width="18%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                              
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.col-md-9 -->

    </div>
</div>