<div class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
                    <h3 class="box-title">Data Tree</h3>
                </div>
                <div class="box-body">
                	<a data-acl="add_content_type" href="/content_type/add" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i> Tambah Tipe</a>
                    
                    <ul id="ctDT3" class="easyui-tree" 
                        data-options="url:'/content_type/get_content_type_treedata',
                        method:'get',
                        lines:true">
                    </ul>

                </div>
			</div>
		</div><!-- /.col-md-3 -->

		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
                    <h3 class="box-title">Detail</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<p class="text-center" style="padding:20px 25px;">Pilih salah satu atau tambah tipe konten pada panel bagian kiri untuk dapat melakukan <br> proses manajemen tipe konten.</p>
                </div>
			</div>
		</div><!-- /.col-md-9 -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
    $(function () {
        $('#ctDT3').tree({
            formatter:function(node){
                return '<a href="/content_type/update/'+node.id+'">'+node.text+'</a>';
            }
        });
    }); /* end of jquery on ready */
</script>