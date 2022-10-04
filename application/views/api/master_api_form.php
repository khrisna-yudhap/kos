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
        <h2 style="margin-top:0px">Master_api <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Api <?php echo form_error('nm_api') ?></label>
            <input type="text" class="form-control" name="nm_api" id="nm_api" placeholder="Nm Api" value="<?php echo $nm_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link Api <?php echo form_error('link_api') ?></label>
            <input type="text" class="form-control" name="link_api" id="link_api" placeholder="Link Api" value="<?php echo $link_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Opd Api <?php echo form_error('opd_api') ?></label>
            <input type="text" class="form-control" name="opd_api" id="opd_api" placeholder="Opd Api" value="<?php echo $opd_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Opd Api <?php echo form_error('nm_opd_api') ?></label>
            <input type="text" class="form-control" name="nm_opd_api" id="nm_opd_api" placeholder="Nm Opd Api" value="<?php echo $nm_opd_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Tahun Api <?php echo form_error('tahun_api') ?></label>
            <input type="text" class="form-control" name="tahun_api" id="tahun_api" placeholder="Tahun Api" value="<?php echo $tahun_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan Api <?php echo form_error('keterangan_api') ?></label>
            <input type="text" class="form-control" name="keterangan_api" id="keterangan_api" placeholder="Keterangan Api" value="<?php echo $keterangan_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created Api <?php echo form_error('created_api') ?></label>
            <input type="text" class="form-control" name="created_api" id="created_api" placeholder="Created Api" value="<?php echo $created_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Api <?php echo form_error('user_api') ?></label>
            <input type="text" class="form-control" name="user_api" id="user_api" placeholder="User Api" value="<?php echo $user_api; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Ref Billing <?php echo form_error('id_ref_billing') ?></label>
            <input type="text" class="form-control" name="id_ref_billing" id="id_ref_billing" placeholder="Id Ref Billing" value="<?php echo $id_ref_billing; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Token <?php echo form_error('token') ?></label>
            <input type="text" class="form-control" name="token" id="token" placeholder="Token" value="<?php echo $token; ?>" />
        </div>
	    <input type="hidden" name="id_api" value="<?php echo $id_api; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('api') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>