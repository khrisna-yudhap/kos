<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Biaya per Kamar</a></li>
        <li class="breadcrumb-item active">Form</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Biaya<small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-6">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-7">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Form Biaya</h4>
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
                        <input type="hidden" name="BiayaId" id="BiayaId" value="<?= $BiayaId ?>">
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
                                    <?php
                                    if ($lokasi_terpilih) { ?>
                                        <option value="<?= $lokasi_terpilih->LokasiId ?>"><?= $lokasi_terpilih->LokasiName ?></option>
                                    <? } else { ?>
                                        <option value="">-- Pilih --</option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Biaya Kamar Per Hari<?php echo form_error('BiayaId') ?></label>
                            <div class="col-lg-8">

                                <input type="text" class="form-control" name="BiayaHarian" id="BiayaHarian" placeholder="Biaya Per Hari" value="<?php echo $BiayaHarian; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Biaya Kamar Per Minggu<?php echo form_error('BiayaId') ?></label>
                            <div class="col-lg-8">
                                <input type="hidden" name="BiayaId" id="BiayaId" value="<?= $BiayaId ?>">
                                <input type="text" class="form-control" name="BiayaMingguan" id="BiayaMingguan" placeholder="Biaya Per Minggu" value="<?php echo $BiayaMingguan; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Biaya Kamar Per Bulan<?php echo form_error('BiayaId') ?></label>
                            <div class="col-lg-8">
                                <input type="hidden" name="BiayaId" id="BiayaId" value="<?= $BiayaId ?>">
                                <input type="text" class="form-control" name="BiayaBulanan" id="BiayaBulanan" placeholder="Biaya Per Bulan" value="<?php echo $BiayaBulanan; ?>" />
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <button type="button" id="simpan" class="btn btn-sm btn-primary m-r-5">Simpan</button>
                                    <button type="button" onclick="history.back(-1)" class="btn btn-sm btn-default">Batal</button>
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
                url: '<?= site_url('management/biaya/index/find') ?>',
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

        $('#simpan').click(function() {
            var url = "<?= $action ?>"
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    BiayaId: $('#BiayaId').val(),
                    KotaId: $('#KotaId').val(),
                    LokasiId: $('#LokasiId').val(),
                    BiayaHarian: $('#BiayaHarian').val(),
                    BiayaMingguan: $('#BiayaMingguan').val(),
                    BiayaBulanan: $('#BiayaBulanan').val(),
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
                            window.location.href = '<?= site_url('management/biaya/') ?>';
                        }, 1000);

                    }
                }
            });
        })

    });
</script>