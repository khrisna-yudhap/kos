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
        <h2 style="margin-top:0px">Akses_api Read</h2>
        <table class="table">
	    <tr><td>Id Api</td><td><?php echo $id_api; ?></td></tr>
	    <tr><td>Id Pengakses</td><td><?php echo $id_pengakses; ?></td></tr>
	    <tr><td>Ip Pengakses</td><td><?php echo $ip_pengakses; ?></td></tr>
	    <tr><td>Status Akses</td><td><?php echo $status_akses; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('akses_api') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>