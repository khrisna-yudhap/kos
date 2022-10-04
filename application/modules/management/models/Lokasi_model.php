<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*,LokasiId,LokasiName,LokasiKab,LokasiActive');
        $this->datatables->from('manage_lokasi');
        // $this->datatables->add_column('tampil', '$1', 'checklist(MenuIsShow)');
        // $this->datatables->edit_column('MenuId', '$1', 'encrypt_id(MenuId)');
        // //generate tombol aksi di helper, menu = modulenya, (type 1 untuk akasi full, type 2 edit hapus, type 3 hapus only), id row
        // $this->datatables->add_column('action', '$1', 'getAction(menu,2,MenuId)');
        return
            $this->datatables->generate();
    }

    function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('manage_lokasi');
        $this->db->where('LokasiId', $id);
        return $this->db->get()->row();
    }

    function doAdd($LokasiName, $description)
    {
        $sql = "INSERT INTO manage_lokasi (LokasiName, LokasiKab) VALUES (?, ?)";
        $this->db->query($sql, array($LokasiName, $description));
        return $this->db->insert_id();
    }

    function doUpdate($LokasiName, $description, $LokasiId)
    {
        $sql = "UPDATE manage_lokasi SET LokasiName = ?, LokasiKab = ? WHERE LokasiId = ?";
        return $this->db->query($sql, array($LokasiName, $description, $LokasiId));
    }

    function doDelete($LokasiId)
    {
        $sql = "DELETE FROM manage_lokasi WHERE LokasiId = ?";
        return $this->db->query($sql, array($LokasiId));
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
