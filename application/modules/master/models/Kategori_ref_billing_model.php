<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_ref_billing_model extends CI_Model
{

    public $table = 'kategori_ref_billing';
    public $id = 'id_kategori_ref_billing';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');
        $this->datatables->select('id_kategori_ref_billing,kategori_ref_billing');
        $this->datatables->from('kategori_ref_billing');
        //add this line for join
        //$this->datatables->join('table2', 'kategori_ref_billing.field = table2.field');
        // $this->datatables->edit_column('id_kategori_ref_billing', '$1', 'encrypt_id(id_kategori_ref_billing)');
        $this->datatables->add_column('action', anchor(site_url('kategori_ref_billing/update/$1'), 'Update') . " | " . anchor(site_url('kategori_ref_billing/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kategori_ref_billing');
        return $this->datatables->generate();
    }

    function DoAdd($kategori_ref_billing, $id_kategori_ref_billing)
    {
        $sql = "
         INSERT INTO kategori_ref_billing(id_kategori_ref_billing,kategori_ref_billing)
         VALUES (?,?)";
        return $this->db->query($sql, array($kategori_ref_billing, $id_kategori_ref_billing));
    }

    function DoUpdate($kategori_ref_billing, $id_kategori_ref_billing)
    {
        $sql = "
         UPDATE kategori_ref_billing
         SET kategori_ref_billing=?
         WHERE id_kategori_ref_billing=?";
        return $this->db->query($sql, array(
            $kategori_ref_billing, $id_kategori_ref_billing
        ));
    }

    function doDelete($id_kategori_ref_billing)
    {
        $sql = "DELETE FROM kategori_ref_billing WHERE id_kategori_ref_billing = ?";
        return $this->db->query($sql, array($id_kategori_ref_billing));
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
        $this->db->like('id_kategori_ref_billing', $q);
        $this->db->or_like('kategori_ref_billing', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kategori_ref_billing', $q);
        $this->db->or_like('kategori_ref_billing', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file kategori_ref_billing_model.php */
/* Location: ./application/models/kategori_ref_billing_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-14 10:49:49 */
/* http://harviacode.com */
