<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
		<li class="breadcrumb-item active">Pengakses</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Pengakses <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Tabel Pengakses </h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body" style="border-bottom: 1px solid #ccc;">
					<div class="col-xl-12">
						<button onclick="window.open('<?= site_url('master/pengakses/add') ?>', '_self')" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button id="editBtn" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button id="deleteBtn" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				</div>
				<div class="panel-body">
					<table id="my-table" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th width="80px">No</th>
								<th>Nm Pengakses</th>
								<th>Kode Bank</th>
								<th width="200px">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div>
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
<!-- end #content -->

<script src="<?= base_url() ?>assets/admin/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	// var save_method; //for save method string
	var table;
	var dataId;

	$(document).ready(function() {
		//datatables
		table = $('#my-table').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": '<?= site_url('master/pengakses/index/json'); ?>',
				"type": "POST"
			},
			//Set column definition initialisation properties.
			"columns": [{
					"data": "id_pengakses",
					"orderable": false
				}, {
					"data": "nm_pengakses"
				}, {
					"data": "kode_bank"
				},
				{
					"data": "action",
					"orderable": false,
					"className": "text-center"
				}
			],
			"scrollX": true,
			order: [
				[0, 'asc']
			],
			// dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
			autoFill: true,
			colReorder: true,
			keys: true,
			rowReorder: true,
			select: true


		});

		table.on('order.dt search.dt', function() {
			table.column(0, {
				search: 'applied',
				order: 'applied'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw();

		$('#my-table tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
			var pos = table.row(this).index();
			var row = table.row(pos).data();
			console.log(row.MenuId);
			dataId = row.id_pengakses;
		});

		$('#editBtn').click(function() {
			var oData = table.rows('.selected').data();

			if (oData.length > 0) {
				window.location.href = '<?= site_url('master/pengakses/update/') ?>' + dataId;
			} else {
				$.gritter.add({
					title: 'Pilih data terlebih dahulu!',
					// text: data,
					// sticky: true,
					time: '3000',
				}, 1000);
				return false;
			}

		});

		$('#deleteBtn').click(function() {
			var oData = table.rows('.selected').data();

			if (oData.length > 0) {
				swal({
					title: "Hapus menu?",
					text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
					icon: "warning",
					buttons: [
						'Batal',
						'Ya'
					],
					dangerMode: true,
				}).then(function(isConfirm) {
					if (isConfirm) {
						swal({
							title: 'Dihapus!',
							text: 'Data berhasil dihapus!',
							icon: 'success'
						}).then(function() {
							$.ajax({
								type: "POST", // Method pengiriman data bisa dengan GET atau POST
								url: "<?= site_url('master/pengakses_do/delete/') ?>" + dataId,
								data: {}, // data yang akan dikirim ke file yang dituju
								dataType: "json",
								beforeSend: function(e) {
									if (e && e.overrideMimeType) {
										e.overrideMimeType("application/json;charset=UTF-8");
									}
								},
								success: function(response) {
									table.ajax.reload();
								},
								error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
									swal(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
								}
							});
						});
					} else {
						swal("Dibatalkan", "", "error");
					}
				})
			} else {
				$.gritter.add({
					title: 'Pilih data terlebih dahulu!',
					// text: data,
					// sticky: true,
					time: '3000',
				}, 1000);
				return false;
			}

		});

	});
</script>