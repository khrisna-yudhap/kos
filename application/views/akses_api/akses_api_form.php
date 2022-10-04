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
        <h2 style="margin-top:0px">Akses_api <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Api <?php echo form_error('id_api') ?></label>
            <input type="text" class="form-control" name="id_api" id="id_api" placeholder="Id Api" value="<?php echo $id_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Pengakses <?php echo form_error('id_pengakses') ?></label>
            <input type="text" class="form-control" name="id_pengakses" id="id_pengakses" placeholder="Id Pengakses" value="<?php echo $id_pengakses; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Ip Pengakses <?php echo form_error('ip_pengakses') ?></label>
            <input type="text" class="form-control" name="ip_pengakses" id="ip_pengakses" placeholder="Ip Pengakses" value="<?php echo $ip_pengakses; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status Akses <?php echo form_error('status_akses') ?></label>
            <input type="text" class="form-control" name="status_akses" id="status_akses" placeholder="Status Akses" value="<?php echo $status_akses; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('akses_api') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>