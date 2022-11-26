<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Setoran Kos</a></li>
        <li class="breadcrumb-item active">Form</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Setoran Kos<small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-xl-9">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-7">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Form Tambah Setoran Kos</h4>
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
                                    <label class="col-lg-4 col-form-label">Lokasi <?php echo form_error('LokasiId') ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="LokasiId" name="LokasiId">
                                            <option value="">-- Pilih --</option>
                                        </select>
                                    </div>
                                </div>
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
                                    <label class="col-lg col-form-label">Jumlah Setoran (Rp)<?php echo form_error('JumlahSetoran') ?></label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" id="Harga" disabled>
                                        <input class="form-control" type="hidden" name="JumlahSetoran" id="JumlahSetoran" disabled>
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

        $('#checkHarga').click(function() {

            $.ajax({
                type: "POST",
                url: '<?= site_url('management/setoran/index/checkHarga') ?>',
                data: {
                    LokasiId: $('#LokasiId').val(),
                    TanggalAwal: $('#TanggalAwal').val(),
                    TanggalAkhir: $('#TanggalAkhir').val(),
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    if (data == 'false') {
                        // alert(data);
                        $.gritter.add({
                            title: 'Check Biaya Gagal !',
                            text: 'Harap masukan tanggal terlebih dahulu.',
                            sticky: true,
                            time: '',
                        }, 1000);
                        return false;
                    } else {
                        $.gritter.add({
                            title: 'Check Biaya Berhasil',
                            sticky: true,
                            time: '',
                        }, 1000);
                        // Create our number formatter.
                        const formatter = new Intl.NumberFormat('ban', 'id');
                        $('#Harga').val(formatter.format(data.JumlahSetor));
                        $('#JumlahSetor').val(data.JumlahSetor);
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
                    SetoranId: $('#SetoranId').val(),
                    PengelolaId: $('#PengelolaId').val(),
                    LokasiId: $('#LokasiId').val(),
                    JumlahSetor: $('#JumlahSetor').val(),
                    TanggalAwal: $('#TanggalAwal').val(),
                    TanggalAkhir: $('#TanggalAkhir').val(),
                    TanggalSetor: $('#SewaId').val(),
                    StatusSetor: $('#StatusSetor').val(),
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
                            window.location.href = '<?= site_url('management/setoran/') ?>';
                        }, 1000);

                    }
                }
            });
        });

    });
</script>