<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Master_pengakses Read</h2>
        <table class="table">
	    <tr><td>Nm Pengakses</td><td><?php echo $nm_pengakses; ?></td></tr>
	    <tr><td>Kode Bank</td><td><?php echo $kode_bank; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengakses') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>