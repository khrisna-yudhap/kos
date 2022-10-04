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
        <h2 style="margin-top:0px">Master_pengakses <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Pengakses <?php echo form_error('nm_pengakses') ?></label>
            <input type="text" class="form-control" name="nm_pengakses" id="nm_pengakses" placeholder="Nm Pengakses" value="<?php echo $nm_pengakses; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Kode Bank <?php echo form_error('kode_bank') ?></label>
            <input type="text" class="form-control" name="kode_bank" id="kode_bank" placeholder="Kode Bank" value="<?php echo $kode_bank; ?>" />
        </div>
	    <input type="hidden" name="id_pengakses" value="<?php echo $id_pengakses; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengakses') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>