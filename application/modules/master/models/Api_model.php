<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public $table = 'master_api';
    public $id = 'id_api';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->load->helper('my_datatable');
        $this->datatables->select('id_api,nm_api,link_api,opd_api,nm_opd_api,tahun_api,keterangan_api,created_api,user_api,id_ref_billing,token');
        $this->datatables->from('master_api');
        //add this line for join
        //$this->datatables->join('table2', 'master_api.field = table2.field');
        $this->datatables->edit_column('id_api', '$1', 'encrypt_id(id_api)');
        $this->datatables->add_column('action', anchor(site_url('api/read/$1'), 'Read') . " | " . anchor(site_url('api/update/$1'), 'Update') . " | " . anchor(site_url('api/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_api');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_api', $q);
        $this->db->or_like('nm_api', $q);
        $this->db->or_like('link_api', $q);
        $this->db->or_like('opd_api', $q);
        $this->db->or_like('nm_opd_api', $q);
        $this->db->or_like('tahun_api', $q);
        $this->db->or_like('keterangan_api', $q);
        $this->db->or_like('created_api', $q);
        $this->db->or_like('user_api', $q);
        $this->db->or_like('id_ref_billing', $q);
        $this->db->or_like('token', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_api', $q);
        $this->db->or_like('nm_api', $q);
        $this->db->or_like('link_api', $q);
        $this->db->or_like('opd_api', $q);
        $this->db->or_like('nm_opd_api', $q);
        $this->db->or_like('tahun_api', $q);
        $this->db->or_like('keterangan_api', $q);
        $this->db->or_like('created_api', $q);
        $this->db->or_like('user_api', $q);
        $this->db->or_like('id_ref_billing', $q);
        $this->db->or_like('token', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Api_model.php */
/* Location: ./application/models/Api_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-15 08:29:59 */
/* http://harviacode.com */