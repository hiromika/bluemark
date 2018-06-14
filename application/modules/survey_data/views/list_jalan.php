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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Jalan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <p class="margin">
                        <a class="btn btn-app" href="/survey_data/add_jalan">
                            <span class="glyphicon glyphicon-plus"></span>
                            Tambah
                        </a> <!-- 
                        <a class="btn btn-app" onclick="confirm('Hapus data yg dipilih');">
                            <span class="glyphicon glyphicon-trash"></span>
                            Hapus
                        </a> --> 
                    </p>

                    <table id="dtTbls" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="15%">Ruas</th>
                                <th>Nama</th>
                                <th>Provinsi</th>
                                <th>Panjang</th>
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem selatan</td>
                                <td>Jalan Lorem 1</td>
                                <td>Ipsum sit amet</td>
                                <td>70 KM</td>
                                <td><a href="/survey_data/edit_jalan" class="btn btn-sm btn-default">Detail</a></td>
                            </tr>
                            <tr>
                                <td>Donec</td>
                                <td>Jalan Timor</td>
                                <td>Timor</td>
                                <td>56 KM</td>
                                <td><a href="/survey_data/edit_jalan" class="btn btn-sm btn-default">Detail</a></td>
                            </tr>                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>