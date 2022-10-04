<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Parameter API</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Parameter API <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-6">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-plugins-7">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Form Parameter API</h4>
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
					<form class="form-horizontal form-bordered" name="my-form" method="POST" action="<?= site_url('master/parameter_api_do/' . $button) ?>">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">API</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="id_api" name="id_api">
									<?php foreach ($api as $key) :
										$selected = $id_api == $key->id_api ? "selected " : ""; ?>

										<option value="<?= $key->id_api ?>" <?= $selected ?>><?= $key->nm_api ?></option>
									<?php endforeach ?>
								</select>
								<input type="hidden" id="id_parameter" name="id_parameter" value="<?= $id_parameter ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Posisi Parameter</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="posisi_parameter" id="posisi_parameter" value="<?= $posisi_parameter ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Nama Parameter</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nm_parameter" id="nm_parameter" value="<?= $nm_parameter ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Isi Parameter</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="val_parameter" id="val_parameter" value="<?= $val_parameter ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Keterangan</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="ket_parameter" id="ket_parameter" value="<?= $ket_parameter ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Tipe</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="tipe_parameter" id="tipe_parameter" value="<?= $tipe_parameter ?>" data-parsley-required="true">
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
			var url = "<?= site_url('master/parameter_api_do/' . $button) ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					id_parameter: $('#id_parameter').val(),
					id_api: $('#id_api').val(),
					posisi_parameter: $('#posisi_parameter').val(),
					nm_parameter: $('#nm_parameter').val(),
					val_parameter: $('#val_parameter').val(),
					ket_parameter: $('#ket_parameter').val(),
					tipe_parameter: $('#tipe_parameter').val(),
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
							window.location.href = '<?= site_url('master/parameter_api/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>