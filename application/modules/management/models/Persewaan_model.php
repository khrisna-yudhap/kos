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

    //Get Data Kamar
    function getKamarLokasi($postData)
    {
        $response = array();

        // Select record
        $this->db->select('*');
        $this->db->where('LokasiId', $postData);
        $q = $this->db->get('manage_kamar');
        $response = $q->result_array();

        return $response;
    }

    function checkHarga($tglAwal, $tglAkhir)
    {
        $response = [];

        if ($tglAwal == null && $tglAkhir == null) {
            $response = false;

            return $response;
        }

        //Cari Jenis Sewa
        $JenisSewa = "";
        $BiayaSewa = "";

        $TotalDays = (new DateTime($tglAwal))->diff(new DateTime($tglAkhir))->days;

        function cekTgl($tglAwal, $tglAkhir)
        {
            $TglAwal = $tglAwal;
            $TglAkhir = $tglAkhir;

            //Temukan Tanggal Hari Pada Tgl Awal
            $dayAwal = date("d", strtotime($TglAwal));

            //Hitung Jumlah hari pada input tgl akhir
            $dayAkhir = date("d", strtotime($TglAkhir));
            $month = date("m", strtotime($TglAkhir));
            $years = date("y", strtotime($TglAkhir));

            if ($dayAwal == $dayAkhir) {
                return true;
            }
        }

        //Check Jenis Sewa dan Biaya Sewa
        if (!cekTgl($tglAwal, $tglAkhir)) {
            if ($TotalDays % 7 != 0) {
                $JenisSewa = "Harian";

                //Get Harga
                $HargaHarian = 185000;

                $BiayaSewa = $TotalDays * $HargaHarian;

                //Return Response
                $response = [
                    'JenisSewa' => $JenisSewa,
                    'BiayaSewa' => $BiayaSewa,
                    'Banyaknya Hari' => $TotalDays
                ];

                return $response;
                die;
            } else {
                $JenisSewa = "Mingguan";

                //Get Harga
                $HargaMingguan = 1400000;

                $TotalWeeks = $TotalDays / 7;
                $BiayaSewa = $TotalWeeks * $HargaMingguan;

                //Return Response
                $response = [
                    'JenisSewa' => $JenisSewa,
                    'BiayaSewa' => $BiayaSewa,
                    'Banyaknya Hari' => $TotalDays
                ];

                return $response;
                die;
            }
        } else {
            $JenisSewa = "Bulanan";

            //Get Harga $this->Persewaan_model->getHarga()
            $HargaBulanan = 4000000;

            $TotalMonth = $TotalDays / 30;

            $BiayaSewa = round($TotalMonth) * $HargaBulanan;

            //Return Response
            $response = [
                'JenisSewa' => $JenisSewa,
                'BiayaSewa' => $BiayaSewa,
                'Banyaknya Hari' => $TotalDays
            ];

            return $response;
            die;
        }
    }


    function doAdd($PengelolaId, $KotaId, $LokasiId, $KamarId, $NamaPenyewa, $NomorHp, $NomorIdentitas, $JenisSewa, $BiayaSewa, $TanggalAwal, $TanggalAkhir, $TanggalEntry, $Keterangan)
    {
        $sql = "INSERT INTO manage_persewaan (PengelolaId, KotaId, LokasiId, KamarId, NamaPenyewa, NomorHp, NomorIdentitas, JenisSewa, BiayaSewa, TanggalAwal, TanggalAkhir, TanggalEntry,  Keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($PengelolaId, $KotaId, $LokasiId, $KamarId, $NamaPenyewa, $NomorHp, $NomorIdentitas, $JenisSewa, $BiayaSewa, $TanggalAwal, $TanggalAkhir, $TanggalEntry, $Keterangan));
        return $this->db->insert_id();
    }

    function doDelete($sewaId)
    {
        $sql = "DELETE FROM manage_persewaan WHERE SewaId = ?";
        return $this->db->query($sql, array($sewaId));
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
