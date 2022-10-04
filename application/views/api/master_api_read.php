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
        <h2 style="margin-top:0px">Master_api Read</h2>
        <table class="table">
	    <tr><td>Nm Api</td><td><?php echo $nm_api; ?></td></tr>
	    <tr><td>Link Api</td><td><?php echo $link_api; ?></td></tr>
	    <tr><td>Opd Api</td><td><?php echo $opd_api; ?></td></tr>
	    <tr><td>Nm Opd Api</td><td><?php echo $nm_opd_api; ?></td></tr>
	    <tr><td>Tahun Api</td><td><?php echo $tahun_api; ?></td></tr>
	    <tr><td>Keterangan Api</td><td><?php echo $keterangan_api; ?></td></tr>
	    <tr><td>Created Api</td><td><?php echo $created_api; ?></td></tr>
	    <tr><td>User Api</td><td><?php echo $user_api; ?></td></tr>
	    <tr><td>Id Ref Billing</td><td><?php echo $id_ref_billing; ?></td></tr>
	    <tr><td>Token</td><td><?php echo $token; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('api') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>