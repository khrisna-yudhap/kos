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
        <h2 style="margin-top:0px">Ref_billing <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ref Billing <?php echo form_error('ref_billing') ?></label>
            <input type="text" class="form-control" name="ref_billing" id="ref_billing" placeholder="Ref Billing" value="<?php echo $ref_billing; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori Ref Billing <?php echo form_error('id_kategori_ref_billing') ?></label>
            <input type="text" class="form-control" name="id_kategori_ref_billing" id="id_kategori_ref_billing" placeholder="Id Kategori Ref Billing" value="<?php echo $id_kategori_ref_billing; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jenis Ref Billing <?php echo form_error('id_jenis_ref_billing') ?></label>
            <input type="text" class="form-control" name="id_jenis_ref_billing" id="id_jenis_ref_billing" placeholder="Id Jenis Ref Billing" value="<?php echo $id_jenis_ref_billing; ?>" />
        </div>
	    <input type="hidden" name="id_ref_billing" value="<?php echo $id_ref_billing; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ref_billing') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>