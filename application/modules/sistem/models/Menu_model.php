<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends Ci_Model
{

    function json()
    {
        $this->load->library('datatables');
        $this->load->helper('my_datatable');

        $this->datatables->select('*, MenuId,MenuParentId,MenuModule,MenuName,MenuIcon,MenuId, MenuIsShow');
        $this->datatables->from('acm_menu');
        $this->datatables->add_column('tampil', '$1', 'checklist(MenuIsShow)');
        $this->datatables->edit_column('MenuId', '$1', 'encrypt_id(MenuId)');
        //generate tombol aksi di helper, menu = modulenya, (type 1 untuk akasi full, type 2 edit hapus, type 3 hapus only), id row
        $this->datatables->add_column('action', '$1', 'getAction(menu,2,MenuId)');
        return $this->datatables->generate();
    }

    function GetMenu()
    {
        $sql = "
         SELECT distinct MenuId,MenuParentId,MenuModule,MenuName,MenuIcon, MenuParent
         FROM acm_menu
         INNER JOIN acm_menu_aksi ON MenuId=MenuAksiMenuId
         INNER JOIN acm_group_menu_aksi ON MenuAksiId=GroupMenuMenuAksiId
         WHERE GroupMenuGroupId=1 AND MenuIsShow=1
         ORDER BY MenuOrder";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function getAksi()
    {
        $this->db->order_by('AksiId', 'asc');
        return $this->db->get('acm_aksi')->result();
    }

    function getMenuAksi($menuId)
    {
        $result = array(
            'index' => false,
            'add' => false,
            'update' => false,
            'delete' => false,
            'detail' => false,
            'print' => false,
            'import' => false
        );
        $sql = "SELECT 
            MenuAksiAksiId 
            FROM acm_menu INNER JOIN acm_menu_aksi ON MenuId = MenuAksiMenuId 
            WHERE MenuId = ?";
        $query = $this->db->query($sql, array($menuId));
        foreach ($query->result_array() as $record) {
            if ($record['MenuAksiAksiId'] == 1) {
                $result["index"] = true;
            } else if ($record['MenuAksiAksiId'] == 2) {
                $result["add"] = true;
            } else if ($record['MenuAksiAksiId'] == 3) {
                $result["update"] = true;
            } else if ($record['MenuAksiAksiId'] == 4) {
                $result["delete"] = true;
            } else if ($record['MenuAksiAksiId'] == 5) {
                $result['detail'] = true;
            } else if ($record['MenuAksiAksiId'] == 6) {
                $result['print'] = true;
            } else if ($record['MenuAksiAksiId'] == 7) {
                $result['import'] = true;
            }
        }
        return $result;
    }

    function doAdd($menuname, $is_child, $parent_id, $menuparent, $modulename, $is_show, $order, $index, $add, $update, $delete, $detail, $print, $import)
    {
        $index = $index == 'on' ? 1 : 0;
        $add = $add == 'on' ? 1 : 0;
        $update = $update == 'on' ? 1 : 0;
        $delete = $delete == 'on' ? 1 : 0;
        $detail = $detail == 'on' ? 1 : 0;
        $print = $print == 'on' ? 1 : 0;
        $import = $import == 'on' ? 1 : 0;
        $this->db->trans_start();
        if ($is_child == 0) {
            $parent_id = 0;
            $index = 1;
            $add = 0;
            $update = 0;
            $delete = 0;
            $detail = 0;
            $print = 0;
            $import = 0;
        }
        $sql = "INSERT INTO acm_menu (MenuParentId, MenuParent, MenuName, MenuModule, MenuIsShow, MenuOrder) VALUES (?,?, ?, ?, ?, ?)";
        $this->db->query($sql, array($parent_id, $menuparent, $menuname, $modulename, $is_show, $order));
        $menuId = $this->db->insert_id();
        if ($index == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 1));
        }
        if ($add == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 2));
        }
        if ($update == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 3));
        }
        if ($delete == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 4));
        }
        if ($detail == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 5));
        }
        if ($print == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 6));
        }
        if ($import == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 7));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function doUpdate($menuname, $is_child, $parent_id, $menuparent, $modulename, $is_show, $order, $index, $add, $update, $delete, $detail, $print, $import, $menuId)
    {
        $index = $index == 'on' ? 1 : 0;
        $add = $add == 'on' ? 1 : 0;
        $update = $update == 'on' ? 1 : 0;
        $delete = $delete == 'on' ? 1 : 0;
        $detail = $detail == 'on' ? 1 : 0;
        $print = $print == 'on' ? 1 : 0;
        $import = $import == 'on' ? 1 : 0;
        $this->db->trans_start();
        if ($is_child == 0) {
            $parent_id = 0;
            $index = 1;
            $add = 0;
            $update = 0;
            $delete = 0;
            $detail = 0;
            $print = 0;
            $import = 0;
        }

        $sql = "UPDATE acm_menu SET MenuParentId = ?,MenuParent = ?, MenuName = ?, MenuModule = ?, MenuIsShow = ?, MenuOrder = ? WHERE MenuId = ?";
        $this->db->query($sql, array($parent_id, $menuparent, $menuname, $modulename, $is_show, $order, $menuId));

        //        $sql = "DELETE FROM acm_menu_aksi WHERE MenuAksiMenuId = ?";
        //        $this->db->query($sql, array($menuId));

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 1";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $index == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 1));
        } else if ($jmlh == 1 && $index == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 1";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $index == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/index", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 2";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $add == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 2));
        } else if ($jmlh == 1 && $add == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 2";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $add == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/add", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 3";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $update == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 3));
        } else if ($jmlh == 1 && $update == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 3";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $update == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/update", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 4";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $delete == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 4));
        } else if ($jmlh == 1 && $delete == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 4";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $delete == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/delete", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 5";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $detail == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 5));
        } else if ($jmlh == 1 && $detail == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 5";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $detail == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/detail", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 6";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $print == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 6));
        } else if ($jmlh == 1 && $print == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 6";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $print == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/detail", $id));
        }

        $sql = "SELECT * FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 7";
        $query = $this->db->query($sql, array($menuId));
        $jmlh = $query->num_rows();
        if ($jmlh == 0 && $import == 1) {
            $sql = "INSERT INTO acm_menu_aksi (MenuAksiMenuId, MenuAksiAksiId) VALUES (?, ?)";
            $this->db->query($sql, array($menuId, 7));
        } else if ($jmlh == 1 && $import == 0) {
            $sql = "DELETE FROM `acm_menu_aksi` WHERE `MenuAksiMenuId` = ? AND `MenuAksiAksiId` = 7";
            $this->db->query($sql, array($menuId));
        } else if ($jmlh == 1 && $import == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $sql = "UPDATE `acm_group_menu_aksi` SET `GroupMenuSegmen` = ? WHERE `GroupMenuMenuAksiId` = ?";
            $this->db->query($sql, array("$modulename/detail", $id));
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }
 
    function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('acm_menu');
        $this->db->where('MenuId', $id);
        return $this->db->get()->row();
    }

    function doDelete($menuId)
    {
        $sql = "DELETE FROM acm_menu WHERE MenuId = ?";
        return $this->db->query($sql, array($menuId));
    }

    function getMenuParentName($id)
    {
        $this->db->select('MenuName');
        $this->db->from('acm_menu');
        $this->db->where('MenuId', $id);
        return $this->db->get()->row()->MenuName;
    }
}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */
