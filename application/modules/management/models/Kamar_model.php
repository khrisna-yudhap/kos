<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kamar_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('KamarId, KamarName, LokasiId, KotaId');
        $this->datatables->from('manage_kamar');
        // $this->datatables->add_column('tampil', '$1', 'checklist(MenuIsShow)');
        // $this->datatables->edit_column('MenuId', '$1', 'encrypt_id(MenuId)');
        // //generate tombol aksi di helper, menu = modulenya, (type 1 untuk akasi full, type 2 edit hapus, type 3 hapus only), id row
        // $this->datatables->add_column('action', '$1', 'getAction(menu,2,MenuId)');
        return
            $this->datatables->generate();
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
