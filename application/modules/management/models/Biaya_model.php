<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*');
        $this->datatables->join('manage_kota', 'manage_kota.KotaId = manage_biaya.KotaId', 'LEFT');
        $this->datatables->join('manage_lokasi', 'manage_lokasi.LokasiId = manage_biaya.LokasiId', 'LEFT');
        $this->datatables->from('manage_biaya');
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
        $this->db->from('manage_biaya');
        $this->db->where('BiayaId', $id);
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

    function getKamar()
    {
        $sql = "
        SELECT  KamarId as value, KamarName as label
        FROM manage_kamar";

        $query = $this->db->query($sql, array());
        return $query->result_array();
    }

    function getAll()
    {
        $sql = "
            SELECT *
            FROM manage_biaya";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function doAdd($KamarId, $KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan)
    {
        $sql = "INSERT INTO manage_biaya (KamarId, KotaId, LokasiId, BiayaHarian, BiayaMingguan, BiayaBulanan) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($KamarId, $KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan));
        return $this->db->insert_id();
    }

    function doUpdate($BiayaId, $KamarId, $KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan)
    {
        $sql = "UPDATE manage_biaya SET KamarId = ?, KotaId = ?, LokasiId = ?, BiayaHarian = ?, BiayaMingguan = ?, BiayaBulanan = ?, WHERE BiayaId = ?";
        return $this->db->query($sql, array($BiayaId, $KamarId, $KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan));
    }

    function doDelete($BiayaId)
    {
        $sql = "DELETE FROM manage_biaya WHERE BiayaId = ?";
        return $this->db->query($sql, array($BiayaId));
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
