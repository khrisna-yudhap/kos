<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Akses API</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Akses API <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-6">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-plugins-7">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Form Akses API</h4>
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
					<form class="form-horizontal form-bordered" name="my-form" method="POST" action="<?= site_url('master/pengakses_do/' . $button) ?>">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">API</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="id_api" name="id_api">
									<?php foreach ($api as $key) :
										$selected = $id_api == $key->id_api ? "selected " : ""; ?>

										<option value="<?= $key->id_api ?>" <?= $selected ?>><?= $key->nm_api ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Pengakses</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="id_pengakses" name="id_pengakses">
									<?php foreach ($pengakses as $key) :
										$selected = $id_pengakses == $key->id_pengakses ? "selected " : ""; ?>

										<option value="<?= $key->id_pengakses ?>" <?= $selected ?>><?= $key->nm_pengakses ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">IP Pengakses</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="ip_pengakses" id="ip_pengakses" value="<?= $ip_pengakses ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Status</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="status_akses" name="status_akses">
									<option <?= $status_akses == '1' ? 'selected' : '' ?> value="1">Aktif</option>
									<option <?= $status_akses == '0' ? 'selected' : '' ?> value="0">Non-aktif</option>
								</select>
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
			var url = "<?= site_url('master/akses_api_do/' . $button) ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					id_api: $('#id_api').val(),
					id_pengakses: $('#id_pengakses').val(),
					ip_pengakses: $('#ip_pengakses').val(),
					status_akses: $('#status_akses').val(),
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
							window.location.href = '<?= site_url('master/akses_api/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>