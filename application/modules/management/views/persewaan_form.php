<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Penyewa Kos</a></li>
        <li class="breadcrumb-item active">Form</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Penyewa Kos<small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-9">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-7">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Form Tambah Penyewa Kos</h4>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" class="" name="PengelolaId" id="PengelolaId" value="">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Penyewa <?php echo form_error('NamaPenyewa') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="NamaPenyewa" id="NamaPenyewa" placeholder="Nama Penyewa...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Identitas Penyewa <?php echo form_error('NomorIdentitas') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="NomorIdentitas" id="NomorIdentitas" placeholder="Ex: 2102408210001 /KTP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nomor HP <?php echo form_error('NomorHp') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="NomorHp" id="NomorHp" placeholder="Ex: 081211173882">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kabupaten / Kota <?php echo form_error('KotaId') ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="KotaId" name="KotaId">
                                            <option value="">-- Pilih --</option>
                                            <? for ($i = 0; $i < sizeof($kota); $i++) {
                                                $select = ($kota[$i]['value'] == $KotaId ? 'selected' : '') ?>
                                                <option value="<?= $kota[$i]['value'] ?>" <?= $select ?>>
                                                    <?= $kota[$i]['label'] ?>
                                                <? } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Lokasi <?php echo form_error('LokasiId') ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="LokasiId" name="LokasiId">
                                            <option value="">-- Pilih --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kamar <?php echo form_error('KamarId') ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="KamarId" name="KamarId">
                                            <option value="">-- Pilih --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tanggal Sewa <?php echo form_error('TanggalSewa') ?></label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input class="form-control" type="date" name="TanggalAwal" id="TanggalAwal">
                                            <span class="input-group-btn" style="padding: 5px;"><b>s.d</b></span>
                                            <input class="form-control" type="date" name="TanggalAkhir" id="TanggalAkhir">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <button type="button" id="checkHarga" class="btn btn-sm btn-success col-12">Check Harga</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Jenis Sewa <?php echo form_error('Keterangan') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="NomorHp" id="NomorHp" placeholder="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg col-form-label">Biaya Sewa <?php echo form_error('Keterangan') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="NomorHp" id="NomorHp" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status Sewa <?php echo form_error('StatusSewa') ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="StatusSewa" name="StatusSewa">
                                            <option value="">-- Pilih --</option>
                                            <option value="Sewa">Sewa</option>
                                            <option value="Booking">Booking</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Keterangan <?php echo form_error('Keterangan') ?></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" type="text" name="Keterangan" id="Keterangan" placeholder="Isi Keterangan..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <button type="button" id="simpan" class="btn btn-sm btn-primary m-r-5">Simpan</button>
                                        <button type="button" onclick="history.back(-1)" class="btn btn-sm btn-default">Batal</button>
                                    </div>
                                </div>
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

        // City change
        $('#KotaId').change(function() {
            var KotaId = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= site_url('management/persewaan/index/findLokasi') ?>',
                method: 'POST',
                data: {
                    KotaId: KotaId
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#LokasiId').empty();

                    html = '<option value="">-- Pilih --</option>';
                    $('#LokasiId').html(html);
                    $('#KamarId').html('<option value="">-- Pilih --</option>');

                    if (data) {
                        var html = '';
                        var i;
                        html += '<option value="">-- Pilih --</option>';

                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i]['LokasiId'] + '">' + data[i]['LokasiName'] + '</option>';
                            $('#LokasiId').html(html);
                            // $('#LokasiId').append('<option value="'+response[i]['LokasiId']+'">'+response[]['LokasiName']+'</option>');
                        }
                    }
                }
            });
        });

        $('#LokasiId').change(function() {
            var LokasiId = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= site_url('management/persewaan/index/findKamar') ?>',
                method: 'POST',
                data: {
                    LokasiId: LokasiId
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#KamarId').empty();

                    html = '<option value="">-- Pilih --</option>';
                    $('#KamarId').html(html);

                    if (data) {
                        var html = '';
                        var i;
                        html += '<option value="">-- Pilih --</option>';

                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i]['KamarId'] + '">' + data[i]['KamarName'] + '</option>';
                            $('#KamarId').html(html);
                            // $('#LokasiId').append('<option value="'+response[i]['LokasiId']+'">'+response[]['LokasiName']+'</option>');
                        }
                    }
                }
            });
        });

        $('#checkHarga').click(function() {

            $.ajax({
                type: "POST",
                url: '<?= site_url('management/Persewaan_do/checkHarga') ?>',
                data: {
                    TanggalAwal: $('#TanggalAwal').val(),
                    TanggalAkhir: $('#TanggalAkhir').val(),
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
                            window.location.href = '<?= site_url('management/persewaan/') ?>';
                        }, 1000);
                    }
                }
            });
        });


        $('#simpan').click(function() {
            var url = "<?= $action ?>"
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    PengelolaId: $('#PengelolaId').val(),
                    SewaId: $('#SewaId').val(),
                    NamaPenyewa: $('#NamaPenyewa').val(),
                    NomorIdentitas: $('#NomorIdentitas').val(),
                    NomorHp: $('#NomorHp').val(),
                    KotaId: $('#KotaId').val(),
                    BiayaSewa: $('#BiayaSewa').val(),
                    LokasiId: $('#LokasiId').val(),
                    KamarId: $('#KamarId').val(),
                    JenisSewa: $('#JenisSewa').val(),
                    StatusSewa: $('#StatusSewa').val(),
                    TanggalAwal: $('#TanggalAwal').val(),
                    TanggalAkhir: $('#TanggalAkhir').val(),
                    Keterangan: $('#Keterangan').val(),
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
                            window.location.href = '<?= site_url('management/persewaan/') ?>';
                        }, 1000);

                    }
                }
            });
        });

    });
</script>