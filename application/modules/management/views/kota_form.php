<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Management</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Kabupaten Kota</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Kabupaten Kota <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-6">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-plugins-7">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Form Tambah Kabupaten Kota</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div id="wizard" class="panel-body panel-form">
					<form class="form-horizontal form-bordered" name="my-form">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Nama Kota <?php echo form_error('KotaName') ?></label>
							<div class="col-lg-8">
								<input class="form-control" id="KotaName" name="KotaName" cols="30" rows="1"></input>
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-8">
								<button type="button" id="simpan" class="btn btn-sm btn-primary m-r-5">Simpan</button>
								<button type="button" onclick="history.back(-1)" class="btn btn-sm btn-default">Batal</button>
							</div>
						</div>
					</form>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
<!-- end #content -->

<script type="text/javascript">
	$(document).ready(function() {


		$('#simpan').click(function() {
			var url = "<?= $action ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					KotaName: $('#KotaName').val(),
				},
				success: function(data) {
					if (data != 'success') {
						// alert(data);
						$.gritter.add({
							title: 'Data gagal disimpan!',
							text: data,
							sticky: true,
							time: '',
						}, 1000);
						return false;
					} else {
						$.gritter.add({
							title: 'Data berhasil disimpan!',
							// text: data,
							sticky: true,
							time: '',
						});
						setTimeout(function() {
							window.location.href = '<?= site_url('management/kota/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>