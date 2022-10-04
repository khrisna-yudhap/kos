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
        <h2 style="margin-top:0px">Parameter_api <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Api <?php echo form_error('id_api') ?></label>
            <input type="text" class="form-control" name="id_api" id="id_api" placeholder="Id Api" value="<?php echo $id_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Posisi Parameter <?php echo form_error('posisi_parameter') ?></label>
            <input type="text" class="form-control" name="posisi_parameter" id="posisi_parameter" placeholder="Posisi Parameter" value="<?php echo $posisi_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Parameter <?php echo form_error('nm_parameter') ?></label>
            <input type="text" class="form-control" name="nm_parameter" id="nm_parameter" placeholder="Nm Parameter" value="<?php echo $nm_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Val Parameter <?php echo form_error('val_parameter') ?></label>
            <input type="text" class="form-control" name="val_parameter" id="val_parameter" placeholder="Val Parameter" value="<?php echo $val_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Ket Parameter <?php echo form_error('ket_parameter') ?></label>
            <input type="text" class="form-control" name="ket_parameter" id="ket_parameter" placeholder="Ket Parameter" value="<?php echo $ket_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tipe Parameter <?php echo form_error('tipe_parameter') ?></label>
            <input type="text" class="form-control" name="tipe_parameter" id="tipe_parameter" placeholder="Tipe Parameter" value="<?php echo $tipe_parameter; ?>" />
        </div>
	    <input type="hidden" name="id_parameter" value="<?php echo $id_parameter; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('parameter_api') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>