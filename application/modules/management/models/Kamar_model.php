<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kamar_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');


        $this->datatables->select('*')->join('manage_kota', 'manage_kota.KotaId = manage_kamar.KotaId', 'LEFT');
        $this->datatables->from('manage_kamar');
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
        $this->db->from('manage_kamar');
        $this->db->where('KamarId', $id);
        return $this->db->get()->row();
    }

    function getLokasi()
    {
        $sql = "
        SELECT  LokasiId as value, LokasiName as label
        FROM manage_lokasi";

        $query = $this->db->query($sql, array());
        return $query->result_array();
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
            FROM manage_kamar";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function doAdd($KamarName, $LokasiId, $KotaId)
    {
        $sql = "INSERT INTO manage_kamar (KamarName, LokasiId, KotaId) VALUES (?, ?, ?)";
        $this->db->query($sql, array($KamarName, $LokasiId, $KotaId));
        return $this->db->insert_id();
    }

    function doUpdate($KamarName, $KamarID, $LokasiId, $KotaId)
    {
        $sql = "UPDATE manage_kamar SET KamarName = ?, LokasiId = ?, KotaId = ? WHERE KamarId = ?";
        return $this->db->query($sql, array($KamarName, $KamarID, $LokasiId, $KotaId));
    }

    function doDelete($KamarId)
    {
        $sql = "DELETE FROM manage_kamar WHERE KamarId = ?";
        return $this->db->query($sql, array($KamarId));
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
