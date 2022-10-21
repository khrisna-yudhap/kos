<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Persewaan_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*,	SewaId, PengelolaId, KotaName, LokasiName, KamarName, NamaPenyewa, NomorHp, NomorIdentitas, JenisSewa, TanggalAwal, TanggalAkhir, TanggalEntry, Keterangan');
        $this->datatables->join('manage_kota', 'manage_kota.KotaId = manage_persewaan.KotaId', 'LEFT');
        $this->datatables->join('manage_lokasi', 'manage_lokasi.LokasiId = manage_persewaan.LokasiId', 'LEFT');
        $this->datatables->join('manage_kamar', 'manage_kamar.KamarId = manage_persewaan.KamarId', 'LEFT');
        $this->datatables->from('manage_persewaan');
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
        $this->db->from('manage_persewaan');
        $this->db->where('SewaId', $id);
        return $this->db->get()->row();
    }

    function doAdd($kotaName)
    {
        $sql = "INSERT INTO manage_kota (KotaName) VALUES (?)";
        $this->db->query($sql, array($kotaName));
        return $this->db->insert_id();
    }

    function doDelete($kotaId)
    {
        $sql = "DELETE FROM manage_kota WHERE KotaId = ?";
        return $this->db->query($sql, array($kotaId));
    }

    function doUpdate($KotaName, $KotaId)
    {
        $sql = "UPDATE manage_kota SET KotaName = ? WHERE KotaId = ?";
        return $this->db->query($sql, array($KotaName, $KotaId));
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
