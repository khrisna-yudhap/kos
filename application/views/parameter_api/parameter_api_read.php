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
        <h2 style="margin-top:0px">Parameter_api Read</h2>
        <table class="table">
	    <tr><td>Id Api</td><td><?php echo $id_api; ?></td></tr>
	    <tr><td>Posisi Parameter</td><td><?php echo $posisi_parameter; ?></td></tr>
	    <tr><td>Nm Parameter</td><td><?php echo $nm_parameter; ?></td></tr>
	    <tr><td>Val Parameter</td><td><?php echo $val_parameter; ?></td></tr>
	    <tr><td>Ket Parameter</td><td><?php echo $ket_parameter; ?></td></tr>
	    <tr><td>Tipe Parameter</td><td><?php echo $tipe_parameter; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('parameter_api') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>