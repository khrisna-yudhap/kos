<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends Ci_Model {

   function json(){
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*,UserId,UserRealName,UserName,UserGroupId,UserFoto,UserExpired,UserTelp');
        $this->datatables->from('acm_user');
        //$this->datatables->add_column('foto', '$1', 'checklist(UserGroupId)');
        //$this->datatables->edit_column('UserId', '$1', 'encrypt_id(UserId)');
        //generate tombol aksi di helper, menu = modulenya, (type 1 untuk akasi full, type 2 edit hapus, type 3 hapus only), id row
        // $this->datatables->add_column('action', '$1', 'getAction(menu,2,MenuId)');
        return 
		$this->datatables->generate();
		//$this->db->last_query();die;
    }

   function GetCountUser($jenis,$key) {
      if ($jenis=='1') {
         $hub = 'OR';
         $param = array('%'.$key.'%','%'.$key.'%');
      } else {
         $hub = 'AND';
         $exkey = explode('--',$key);
         if(!isset($exkey[1])) $exkey[1] = '';
        // if(!isset($exkey[2])) $exkey[2] = '';
         $param = array('%'.$exkey[0].'%','%'.$exkey[1].'%');
      }
      $sql = "
         SELECT count(*) as total
         FROM acm_user
         WHERE UserRealName like ? $hub UserEmail like ? ";
      $query = $this->db->query($sql, $param);
      $result = $query->result_array();
      return $result[0]['total'];
   }

   function GetUserAll() {
      $sql = "
                SELECT *
                FROM acm_user
                LEFT JOIN acm_group ON GroupId=UserGroupId
             ";
      $query = $this->db->query($sql);
      return $query->result_array();
   }
   
   function GetGroup() {
      $sql = "
         SELECT GRoupId as value,GroupName as label
         FROM acm_group";
      $query = $this->db->query($sql, array());
      return $query->result_array();
   }

   function DoAdd($UserName,$UserPassword,$UserRealName,$UserGroupId,$UserEmail,$UserTelp,$foto) {
      $sql = "
         INSERT INTO acm_user(UserName,UserPassword,UserRealName,UserActive,UserGroupId,UserEmail,UserTelp,UserFoto)
         VALUES (?,?,?,?,?,?,?,?)";
      return $this->db->query($sql, array($UserName,$UserPassword,$UserRealName,'1',$UserGroupId,$UserEmail,$UserTelp,$foto));
   }

   function DoUpdate($UserName,$UserRealName,$UserGroupId,$UserEmail,$UserTelp,$foto,$id) {
      $sql = "
         UPDATE acm_user
         SET UserName=?,UserRealName=?,UserActive=?,UserGroupId=?,UserEmail=?,UserTelp=?,UserFoto=?
         WHERE UserId=?";
      return $this->db->query($sql, array($UserName,$UserRealName,'1',$UserGroupId,$UserEmail,$UserTelp,
         $foto,$id));
   }
   
   function updateProfile($UserName, $UserRealName, $UserNip, $UserEmail, $id) {
      $sql = "
         UPDATE acm_user
         SET UserName=?, UserRealName=?, UserNip=?, UserEmail=?
         WHERE UserId=?";
      return $this->db->query($sql, array($UserName, $UserRealName, $UserNip, $UserEmail, $id));
   }
   
   function getUniqueUserByUsername($username, $id) {       
       $sql = "
         SELECT count(*) as total
         FROM acm_user
         WHERE UserName = ? AND UserId != ?";
       $query = $this->db->query($sql, array($username, $id));
       $result = $query->result_array();
       return $result[0]['total'];
   }
   
   function checkPasswordByUserId($password, $id) {
       $sql = "
         SELECT count(*) as total
         FROM acm_user
         WHERE UserPassword = ? AND UserId = ?";
       $query = $this->db->query($sql, array(md5($password), $id));
       $result = $query->result_array();
       return $result[0]['total'];
   }
   
   function updatePassword($new) {
       $sql = "
         UPDATE acm_user
         SET UserPassword = ? 
         WHERE UserId = ?";
      return $this->db->query($sql, array($new, $_SESSION['userid']));
   }

    function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('acm_user');
        $this->db->where('UserId', $id);
        return $this->db->get()->row();
    }
    
    function doDelete($id) {
        $sql = "DELETE FROM acm_user WHERE UserId = ?";
        return $this->db->query($sql, array($id));
    }

}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */