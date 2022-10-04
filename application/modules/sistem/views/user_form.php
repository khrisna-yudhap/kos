<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">System</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Pengguna</a></li>
		<li class="breadcrumb-item active">Form</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Pengguna <small></small></h1>
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
					<form class="form-horizontal form-bordered" name="my-form" method="POST" action="<?= site_url('sistem/user_do/' . $button) ?>">
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">UserRealName <?php echo form_error('UserRealName') ?></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="UserRealName" id="UserRealName" placeholder="UserRealName" value="<?php echo $UserRealName; ?>" />
								<input type="hidden" id="UserId" name="UserId" value="<?= $UserId ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">UserName <?php echo form_error('UserName') ?></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="UserName" id="UserName" placeholder="UserName" value="<?php echo $UserName; ?>" />
							</div>
						</div>
						<?php if ($button == 'add') : ?>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label">Password <?php echo form_error('password') ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" name="password" id="password" placeholder="password" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label">Konfirmasi Password <?php echo form_error('password') ?></label>
								<div class="col-lg-8">
									<input type="password" class="form-control" data-equals="password" name="check" id="check" placeholder="Konfirmasi Password">
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">UserGroupId <?php echo form_error('UserGroupId') ?></label>
							<div class="col-lg-8">
								<select class="form-control" id="UserGroupId" name="UserGroupId">
									<option value="">-- pilih --</option>
									<? for ($i = 0; $i < sizeof($group); $i++) {
										$select = ($group[$i]['value'] == $UserGroupId ? 'selected' : '') ?>
										<option value="<?= $group[$i]['value'] ?>" <?= $select ?>>
											<?= $group[$i]['label'] ?>
										<? } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">UserEmail <?php echo form_error('UserEmail') ?></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="UserEmail" id="UserEmail" placeholder="UserEmail" value="<?php echo $UserEmail; ?>" />
							</div>
						</div>
						<!-- <div class="form-group row">
									<label class="col-lg-4 col-form-label">UserFoto <?php echo form_error('UserFoto') ?></label>
									<div class="col-lg-8">
            							<input type="text" class="form-control" name="UserFoto" id="UserFoto" placeholder="UserFoto" value="<?php echo $UserFoto; ?>" />
									</div>
								</div> -->
						<!-- <div class="form-group row">
									<label class="col-lg-4 col-form-label">UserExpired <?php echo form_error('UserExpired') ?></label>
									<div class="col-lg-8">
            							<input type="text" class="form-control" name="UserExpired" id="UserExpired" placeholder="UserExpired" value="<?php echo $UserExpired; ?>" />
									</div>
								</div> -->
						<div class="form-group row">
							<label class="col-lg-4 col-form-label">UserTelp <?php echo form_error('UserTelp') ?></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="UserTelp" id="UserTelp" placeholder="UserTelp" value="<?php echo $UserTelp; ?>" />
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
			var url = "<?= $action ?>"
			$.ajax({
				type: "POST",
				url: url,
				data: {
					UserId: $('#UserId').val(),
					UserName: $('#UserName').val(),
					UserRealName: $('#UserRealName').val(),
					password: $('#password').val(),
					check: $('#check').val(),
					UserGroupId: $('#UserGroupId').val(),
					UserEmail: $('#UserEmail').val(),
					UserTelp: $('#UserTelp').val(),
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
							window.location.href = '<?= site_url('sistem/user/') ?>';
						}, 1000);

					}
				}
			});
		})

	});
</script>