<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');


        $this->datatables->select('*')->join('manage_kota', 'manage_kota.KotaId = manage_lokasi.KotaId', 'LEFT');
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

    function getKota()
    {
        $sql = "
        SELECT  KotaId as value, KotaName as label
        FROM manage_kota";

        $query = $this->db->query($sql, array());
        return $query->result_array();
    }

    function getAll()
    {
        $sql = "
            SELECT *
            FROM manage_lokasi";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function doAdd($LokasiName, $KotaId)
    {
        $sql = "INSERT INTO manage_lokasi (LokasiName, KotaId) VALUES (?, ?)";
        $this->db->query($sql, array($LokasiName, $KotaId));
        return $this->db->insert_id();
    }

    function doUpdate($LokasiName, $LokasiId, $KotaId)
    {
        $sql = "UPDATE manage_lokasi SET LokasiName = ?, KotaId = ? WHERE LokasiId = ?";
        return $this->db->query($sql, array($LokasiName, $LokasiId, $KotaId));
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
