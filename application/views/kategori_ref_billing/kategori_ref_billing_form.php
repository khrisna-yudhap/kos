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
        <h2 style="margin-top:0px">Kategori_ref_billing <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori Ref Billing <?php echo form_error('kategori_ref_billing') ?></label>
            <input type="text" class="form-control" name="kategori_ref_billing" id="kategori_ref_billing" placeholder="Kategori Ref Billing" value="<?php echo $kategori_ref_billing; ?>" />
        </div>
	    <input type="hidden" name="id_kategori_ref_billing" value="<?php echo $id_kategori_ref_billing; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_ref_billing') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>