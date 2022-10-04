<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parameter_api_model extends CI_Model
{

    public $table = 'parameter_api';
    public $id = 'id_parameter';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->load->helper('my_datatable');
        $this->datatables->select('id_parameter,id_api,posisi_parameter,nm_parameter,val_parameter,ket_parameter,tipe_parameter');
        $this->datatables->from('parameter_api');
        //add this line for join
        //$this->datatables->join('table2', 'parameter_api.field = table2.field');
        $this->datatables->edit_column('id_parameter', '$1', 'encrypt_id(id_parameter)');
        $this->datatables->add_column('action', anchor(site_url('parameter_api/read/$1'), 'Read') . " | " . anchor(site_url('parameter_api/update/$1'), 'Update') . " | " . anchor(site_url('parameter_api/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_parameter');
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
        $this->db->like('id_parameter', $q);
        $this->db->or_like('id_api', $q);
        $this->db->or_like('posisi_parameter', $q);
        $this->db->or_like('nm_parameter', $q);
        $this->db->or_like('val_parameter', $q);
        $this->db->or_like('ket_parameter', $q);
        $this->db->or_like('tipe_parameter', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_parameter', $q);
        $this->db->or_like('id_api', $q);
        $this->db->or_like('posisi_parameter', $q);
        $this->db->or_like('nm_parameter', $q);
        $this->db->or_like('val_parameter', $q);
        $this->db->or_like('ket_parameter', $q);
        $this->db->or_like('tipe_parameter', $q);
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

/* End of file Parameter_api_model.php */
/* Location: ./application/models/Parameter_api_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-15 09:49:04 */
/* http://harviacode.com */