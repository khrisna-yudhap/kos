<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_model extends Ci_Model {

   function GetMenu() {
      $sql = "
         SELECT distinct MenuId,MenuParentId,MenuModule,MenuName,MenuIcon,MenuIsSubMenu
         FROM acm_menu
         INNER JOIN acm_menu_aksi ON MenuId=MenuAksiMenuId
         INNER JOIN acm_group_menu_aksi ON MenuAksiId=GroupMenuMenuAksiId
         WHERE GroupMenuGroupId=1 AND MenuIsShow=1
         ORDER BY MenuOrder";
      $query = $this->db->query($sql);
      return $query->result_array();
   }

}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */