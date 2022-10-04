<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">API</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">API <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-6">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-plugins-7">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Form API</h4>
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
					<form class="form-horizontal form-bordered" name="my-form" method="POST" action="<?= site_url('master/api_do/' . $button) ?>">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Nama API</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nm_api" id="nm_api" value="<?= $nm_api ?>" data-parsley-required="true">
								<input type="hidden" id="id_api" name="id_api" value="<?= $id_api ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Link</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="link_api" id="link_api" value="<?= $link_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">OPD</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="opd_api" id="opd_api" value="<?= $opd_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Nama OPD</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nm_opd_api" id="nm_opd_api" value="<?= $nm_opd_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Tahun</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="tahun_api" id="tahun_api" value="<?= $tahun_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Keterangan</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="keterangan_api" id="keterangan_api" value="<?= $keterangan_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Pengguna API</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="user_api" id="user_api" value="<?= $user_api ?>" data-parsley-required="true">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Ref Billing</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="id_ref_billing" name="id_ref_billing">
									<?php foreach ($ref_billing as $key) :
										$selected = $id_ref_billing == $key->id_ref_billing ? "selected " : ""; ?>

										<option value="<?= $key->id_ref_billing ?>" <?= $selected ?>><?= $key->ref_billing . '(' . $key->id_jenis_ref_billing . ')' ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Token</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="token" name="token">
									<option <?= $token == '1' ? 'selected' : '' ?> value="1">Ya</option>
									<option <?= $token == '2' ? 'selected' : '' ?> value="2">Tidak</option>
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
			var url = "<?= site_url('master/api_do/' . $button) ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					id_api: $('#id_api').val(),
					nm_api: $('#nm_api').val(),
					link_api: $('#link_api').val(),
					opd_api: $('#opd_api').val(),
					nm_opd_api: $('#nm_opd_api').val(),
					tahun_api: $('#tahun_api').val(),
					keterangan_api: $('#keterangan_api').val(),
					user_api: $('#user_api').val(),
					id_ref_billing: $('#id_ref_billing').val(),
					token: $('#token').val(),
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
							window.location.href = '<?= site_url('master/api/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>