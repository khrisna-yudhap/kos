<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends Ci_Model {

   function json(){
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('GroupId,GroupName,GroupDescription');
        $this->datatables->from('acm_group');
        $this->datatables->edit_column('GroupId', '$1', 'encrypt_id(GroupId)');
        return $this->datatables->generate();
    }

    function getGroup($jenis, $key, $start, $limit) {
        if ($jenis == '1') {
            $hub = 'OR';
            $param = array('%'.$key.'%', '%'.$key.'%', $start, $limit);
        } else {
            $hub = 'AND';
            $exkey = explode('--', $key);
            if(!isset($exkey[1])) $exkey[1] = '';
            $param = array('%'.$exkey[0].'%', '%'.$exkey[1].'%', $start, $limit);
        }
        $sql = "
         SELECT * 
         FROM acm_group          
         WHERE GroupName like ? $hub GroupDescription like ? 
         LIMIT ?,?";
        $query = $this->db->query($sql, $param);
        return $query->result_array();
    }

    function getCountGroup($jenis, $key) {
        if ($jenis == '1') {
            $hub = 'OR';
            $param = array('%'.$key.'%', '%'.$key.'%');
        } else {
            $hub = 'AND';
            $exkey = explode('--', $key);
            if(!isset($exkey[1])) $exkey[1] = '';
            $param = array('%'.$exkey[0].'%', '%'.$exkey[1].'%');
        }
        $sql = "
         SELECT count(*) as total
         FROM acm_group          
         WHERE GroupName like ? $hub GroupDescription like ?";
        $query = $this->db->query($sql, $param);
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('acm_group');
        $this->db->where('GroupId', $id);
        return $this->db->get()->row();
    }

    function getDataByIdArr($groupId) {
        $sql = "
            SELECT *
            FROM acm_group
            WHERE GroupId = ?";
        $query = $this->db->query($sql, array($groupId));
        $result = $query->result_array();
        return $result[0];
    }

    function getAll() {
        $sql = "
            SELECT *
            FROM acm_group";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function doAdd($groupName, $description) {
        $sql = "INSERT INTO acm_group (GroupName, GroupDescription) VALUES (?, ?)";
        $this->db->query($sql, array($groupName, $description));
        return $this->db->insert_id();
    }
    
    function doUpdate($groupName, $description, $groupId) {
        $sql = "UPDATE acm_group SET GroupName = ?, GroupDescription = ? WHERE GroupId = ?";
        return $this->db->query($sql, array($groupName, $description, $groupId));
    }
    
    function doDelete($groupId) {
        $sql = "DELETE FROM acm_group WHERE GroupId = ?";
        return $this->db->query($sql, array($groupId));
    }
    
    function getEmptyGroup() {
       $group['GroupId'] = NULL;
       $group['GroupName'] = NULL;
       $group['GroupDescription'] = NULL;
       return $group;
   }


}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */