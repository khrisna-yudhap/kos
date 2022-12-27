<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setoran_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*,	SetorId, manage_setoran.PengelolaId, LokasiName, manage_setoran.TanggalAwal, manage_setoran.TanggalAkhir, JumlahSetor, TanggalSetor, StatusSetor, manage_setoran.Keterangan');
        $this->datatables->join('manage_lokasi', 'manage_lokasi.LokasiId = manage_setoran.LokasiId', 'LEFT');
        $this->datatables->join('manage_persewaan', 'manage_persewaan.SewaId = manage_setoran.SewaId', 'LEFT');
        $this->datatables->from('manage_setoran');
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
        $this->db->from('manage_setoran');
        $this->db->where('SetorId', $id);
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

    function getJumlahSetor()
    {
    }

    function checkHarga($LokasiId, $tglAwal, $tglAkhir)
    {
        $response = [];

        if ($tglAwal == null && $tglAkhir == null) {
            $response = false;

            return $response;
        }
        // return [$LokasiId, $tglAwal, $tglAkhir];
        $SewaId = [];

        $this->db->select('SewaId, BiayaSewa');
        $this->db->where("TanggalEntry BETWEEN '" . $tglAwal . "' AND '" . $tglAkhir . "'");
        $q = $this->db->get('manage_persewaan');
        $response = $q->result_array();

        $jumlahSetoran = 0;
        foreach ($response as $row) {
            $jumlahSetoran += $row['BiayaSewa'];
        }

        $response = [
            'JumlahSetor' => $jumlahSetoran,
        ];

        return $response;
    }


    function doAdd($PengelolaId, $LokasiId, $JumlahSetor, $TanggalAwal, $TanggalAkhir, $TanggalSetor, $Keterangan)
    {
        $sql = "INSERT INTO manage_setoran (PengelolaId, LokasiId, JumlahSetor, TanggalAwal, TanggalAkhir, TanggalSetor, Keterangan) VALUES (?, ?, ?, ?,  ?, ?, ?)";
        $this->db->query($sql, array($PengelolaId, $LokasiId, $JumlahSetor, $TanggalAwal, $TanggalAkhir, $TanggalSetor,  $Keterangan));
        return $this->db->insert_id();
    }

    function doDelete($setorId)
    {
        $sql = "DELETE FROM manage_setoran WHERE SetorId = ?";
        return $this->db->query($sql, array($setorId));
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
