<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">System</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Menu</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Menu <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-6">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-plugins-7">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Form Menu</h4>
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
					<form class="form-horizontal form-bordered" name="my-form" method="POST" action="<?= site_url('sistem/menu_do/' . $button) ?>">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Nama</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="MenuName" id="MenuName" value="<?= $MenuName ?>" data-parsley-required="true">
								<input type="hidden" id="MenuId" name="menuId" value="<?= $MenuId ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Jenis</label>
							<div class="col-lg-8">
								<select class="form-control" data-size="10" id="jenis-menu" name="is_child" data-style="btn-white">
									<option value="0">Menu Utama</option>
									<option value="1" <?= $MenuParentId ? 'selected' : '' ?>>Sub Menu</option>
								</select>
							</div>
						</div>
						<div style="display: <?= $MenuParentId == 0 ? 'none' : '' ?>" id="div-module" class="form-group row">
							<label class="col-lg-4 col-form-label">Module / Url</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="MenuModule" id="MenuModule" value="<?= $MenuModule ?>">
							</div>
						</div>
						<div style="display: <?= $MenuParentId == 0 ? 'none' : '' ?>" id="div-parent" class="form-group row">
							<label class="col-lg-4 col-form-label">Menu Utama</label>
							<div class="col-lg-8">
								<select class="form-control selectpicker" id="MenuParent" name="MenuParent" data-size="10" data-live-search="true" data-style="btn-white">
									<?php foreach ($menu as $key) :
										$selected = $MenuParentId == $key['MenuId'] ? "selected " : ""; ?>

										<option value="<?= $key['MenuId'] ?>" <?= $selected ?>><?= $key['MenuName'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div style="display:<?= $MenuParentId == 0 ? 'none' : '' ?>" id="div-aksi" class="form-group row">
							<label class="col-lg-4 col-form-label">Aksi</label>
							<div class="col-md-8">
								<?php foreach ($aksi as $key) : ?>
									<div class="checkbox">
										<input type="checkbox" id="<?= $key->AksiFungsi ?>" name="<?= $key->AksiFungsi ?>" <?= $menuaksi[$key->AksiFungsi] ? 'checked ' : '' ?> />
										<label><?= $key->AksiName ?></label>
									</div>
								<?php endforeach ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">Urutan</label>
							<div class="col-lg-4">
								<input type="number" class="form-control" name="MenuOrder" id="MenuOrder" value="<?= $MenuOrder ?>">
							</div>
						</div>
						<?php
						if ($button == 'update') : ?>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label">Tampilkan</label>
								<div class="col-md-8">
									<div class="checkbox">
										<input type="radio" name="MenuIsShow" id="MenuIsShow" value="1" checked />
										<label>Ya</label>
									</div>
									<div class="checkbox">
										<input type="radio" value="0" name="MenuIsShow" id="MenuIsShow" <?= ($MenuIsShow == '0' ? 'checked' : '') ?> />
										<label>Tidak</label>
									</div>
								</div>
							</div>
						<?php endif ?>
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

		$('#jenis-menu').on('change', function() {
			var jenis = $('#jenis-menu').val();
			if (jenis == 1) {
				$('#div-parent').show();
				$('#div-module').show();
				$('#div-aksi').show();
				$('#MenuModule').removeAttr('data-parsley-required');
			} else {
				$('#div-parent').hide();
				$('#div-module').hide();
				$('#div-aksi').hide();
				$('#MenuModule').attr('data-parsley-required', 'true');

			}
			// console.log(jenis);
		})

		$('#simpan').click(function() {
			var url = "<?= site_url('sistem/menu_do/' . $button) ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					MenuName: $('#MenuName').val(),
					MenuId: $('#MenuId').val(),
					MenuModule: $('#MenuModule').val(),
					is_child: $('#jenis-menu').val(),
					MenuParent: $('#MenuParent').val(),
					MenuIsShow: $('#MenuIsShow').val(),
					MenuOrder: $('#MenuOrder').val(),
					index: $('#index').val(),
					add: $('#add').val(),
					update: $('#update').val(),
					delete: $('#delete').val(),
					detail: $('#detail').val(),
					print: $('#print').val(),
					import: $('#import').val(),
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
							window.location.href = '<?= site_url('sistem/menu/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>