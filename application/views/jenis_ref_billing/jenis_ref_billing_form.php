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
        <h2 style="margin-top:0px">Jenis_ref_billing <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Ref Billing <?php echo form_error('jenis_ref_billing') ?></label>
            <input type="text" class="form-control" name="jenis_ref_billing" id="jenis_ref_billing" placeholder="Jenis Ref Billing" value="<?php echo $jenis_ref_billing; ?>" />
        </div>
	    <input type="hidden" name="id_jenis_ref_billing" value="<?php echo $id_jenis_ref_billing; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_ref_billing') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>