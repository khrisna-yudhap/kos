<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*, BiayaId, LokasiName, KotaName, BiayaHarian, BiayaMingguan, BiayaBulanan');
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

    //Get Data Lokasi
    function getLokasiKota($postData)
    {
        $response = array();

        // Select record
        $this->db->select('*');
        $this->db->where('KotaId', $postData);
        $q = $this->db->get('manage_lokasi');
        $response = $q->result_array();

        return $response;
    }
    function getLokasiById($id)
    {
        $this->db->select('*');
        $this->db->from('manage_lokasi');
        $this->db->where('LokasiId', $id);
        return $this->db->get()->row();
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

    function doAdd($KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan)
    {
        $sql = "INSERT INTO manage_biaya ( KotaId, LokasiId, BiayaHarian, BiayaMingguan, BiayaBulanan) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql, array($KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan));
        return $this->db->insert_id();
    }

    function doUpdate($KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan, $BiayaId)
    {
        $sql = "UPDATE manage_biaya SET KotaId = ?, LokasiId = ?, BiayaHarian = ?, BiayaMingguan = ?, BiayaBulanan = ? WHERE BiayaId = ?";
        return $this->db->query($sql, array($KotaId, $LokasiId, $BiayaHarian, $BiayaMingguan, $BiayaBulanan, $BiayaId));
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
