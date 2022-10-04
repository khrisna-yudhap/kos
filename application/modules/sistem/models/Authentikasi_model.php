<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentikasi_model extends CI_Model
{

    function CekModule($module, $class, $doclass, $fungsi, $groupid)
    {
        $sql = "
         SELECT GroupMenuMenuAksiId
         FROM acm_group_menu_aksi
         WHERE GroupMenuGroupId=? AND GroupMenuSegmen=?";
        $query = $this->db->query($sql, array($groupid, $module . '/' . $class . '/' . $fungsi));
        // if (substr($doclass, strlen($doclass) - 3, 3) == '_do') {
        //     $query = $this->db->query($sql, array($groupid, $module . '/' . $doclass . '/' . $fungsi));
        // }
        // echo $groupid . $module . '/' . $doclass . '/' . $fungsi;
        // die;
        $result = $query->result_array();
        // print_r($result);
        // die;
        if (!empty($result))
            return TRUE;
        else
            return false;
    }


    function getAuthenticationMenu($groupId)
    {
        $sql = "SELECT * FROM ( SELECT MenuId, MenuName, MenuParentId, sum(1-abs( sign(MenuAksiAksiId-1))) AS `view`, sum(1-abs( sign(MenuAksiAksiId-2))) AS `add`, sum(1-abs( sign(MenuAksiAksiId-3))) AS `update`, sum(1-abs( sign(MenuAksiAksiId-4))) AS `delete`, sum(1-abs( sign(MenuAksiAksiId-5))) AS `detail`, sum(1-abs( sign(MenuAksiAksiId-6))) AS `print`, sum(1-abs( sign(MenuAksiAksiId-7))) AS `import` FROM acm_group_menu_aksi INNER JOIN acm_menu_aksi ON GroupMenuMenuAksiId = MenuAksiId INNER JOIN acm_menu ON MenuAksiMenuId = MenuId WHERE GroupMenuGroupId = ? GROUP BY MenuName UNION SELECT MenuId, MenuName, MenuParentId, 0, 0, 0, 0, 0, 0, 0 FROM acm_menu WHERE MenuId NOT IN (SELECT MenuAksiMenuId FROM acm_menu_aksi INNER JOIN acm_group_menu_aksi ON MenuAksiId = GroupMenuMenuAksiId WHERE GroupMenuGroupId = ?)) a ORDER BY MenuId";
        $query = $this->db->query($sql, array($groupId, $groupId));
        return $query->result_array();
    }


    function GetUserByUserPassword($user, $pass)
    {
        $data = array();
        $sql = "
         SELECT acm_user.*
         FROM acm_user
         WHERE UserName = '".$user."' AND UserPassword = '".$pass."'";
        $query = $this->db->query($sql, array($user, $pass));
        $result = $query->result_array();
        if (sizeof($result) > 0) {
            $data = $result[0];
        }
        return $data;
    }

    function doUpdate($groupId, $auth)
    {
        $this->db->trans_start();
        $sql = "DELETE FROM acm_group_menu_aksi WHERE GroupMenuGroupId = ?";
        $this->db->query($sql, array($groupId));
        foreach ($auth as $aksi) {
            if ($aksi['index'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 1);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/index"));
                }
            }
            if ($aksi['add'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 2);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/add"));
                }
            }
            if ($aksi['update'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 3);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/update"));
                }
            }
            if ($aksi['delete'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 4);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/delete"));
                }
            }
            if ($aksi['detail'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 5);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/detail"));
                }
            }
            if ($aksi['print'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 6);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/cetak"));
                }
            }
            if ($aksi['import'] == 'on') {
                $menu = $this->getMenuModule($aksi['menuid'], 7);
                if (sizeof($menu) > 0) {
                    $sql = "INSERT INTO acm_group_menu_aksi VALUES (?, ?, ?)";
                    $query = $this->db->query($sql, array($menu['menu_aksi_id'], $groupId, "$menu[menu_module]/import"));
                }
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    private function getMenuModule($menuId, $aksiId)
    {
        $arr_result = array();
        $sql = "SELECT MenuAksiId FROM acm_menu_aksi WHERE MenuAksiMenuId = ? AND MenuAksiAksiId = ?";
        $query = $this->db->query($sql, array($menuId, $aksiId));
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $arr_result['menu_aksi_id'] = $result[0]['MenuAksiId'];
            $sql = "SELECT MenuParentId, MenuName, MenuModule FROM acm_menu WHERE MenuId = ?";
            $query = $this->db->query($sql, array($menuId));
            $result = $query->result_array();
            $arr_result['menu_module'] = $result[0]['MenuModule'];
        }
        return $arr_result;
    }
}

/* End of file authentication_model.php */
/* Location: ./application/models/authentication_model.php */
