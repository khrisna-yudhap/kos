<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_billing_model extends CI_Model
{

    public $table = 'ref_billing';
    public $id = 'id_ref_billing';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->load->helper('my_datatable');
        $this->datatables->select('id_ref_billing,ref_billing,id_kategori_ref_billing,id_jenis_ref_billing');
        $this->datatables->from('ref_billing');
        //add this line for join
        //$this->datatables->join('table2', 'ref_billing.field = table2.field');
        $this->datatables->edit_column('id_ref_billing', '$1', 'encrypt_id(id_ref_billing)');
        $this->datatables->add_column('action', anchor(site_url('ref_billing/read/$1'), 'Read') . " | " . anchor(site_url('ref_billing/update/$1'), 'Update') . " | " . anchor(site_url('ref_billing/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_ref_billing');
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
        $this->db->like('id_ref_billing', $q);
        $this->db->or_like('ref_billing', $q);
        $this->db->or_like('id_kategori_ref_billing', $q);
        $this->db->or_like('id_jenis_ref_billing', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_ref_billing', $q);
        $this->db->or_like('ref_billing', $q);
        $this->db->or_like('id_kategori_ref_billing', $q);
        $this->db->or_like('id_jenis_ref_billing', $q);
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

/* End of file Ref_billing_model.php */
/* Location: ./application/models/Ref_billing_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-15 07:28:33 */
/* http://harviacode.com */
