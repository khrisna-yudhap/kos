<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  edit_column callback function in Codeigniter (Ignited Datatables)
*
* Grabs a value from the edit_column field for the specified field so you can
* return the desired value.
*
* @access   public
* @return   mixed
*/


    function checklist($status = '')
    {
        return ($status == '1') ? '<i style="color: green; font-size:20px;" class="ion-ios-checkmark-circle"></i> ' : '<i style="color: red; font-size:20px;" class="ion-ios-close-circle"></i>';
    }


    function getAction($controller = '', $type = '', $id = '')
    {
      if($type == '1'){
        return 
        '<a href="'.site_url(''.lcfirst($controller).'/view/'.encrypt_url($id)).'" class="btn btn-warning btn-sm">Detil</a>
        <a href="'.site_url(''.lcfirst($controller).'/update/'.encrypt_url($id)).'" class="btn btn-sm btn-primary m-r-2"><i class="fa fa-edit"></i></a>
        <a href="'.site_url(''.lcfirst($controller).'/delete/'.encrypt_url($id)).'" class="btn btn-sm btn-danger " onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')" ><i class="fa fa-trash" </i></a>';
      }
      if($type == '2'){
        return 
        '<a href="'.site_url(''.lcfirst($controller).'/update/'.encrypt_url($id)).'" class="btn btn-sm btn-primary m-r-2">Edit</a>
        <a href="'.site_url(''.lcfirst($controller).'/delete/'.encrypt_url($id)).'" class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')" >Hapus</a>';
      }
      if($type == '3'){
        return 
        '<a href="'.site_url(''.lcfirst($controller).'/delete/'.encrypt_url($id)).'" class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')" ><i class="fa fa-trash" </i></a>';
      }
    }

    function encrypt_id($id = '')
    {
      return encrypt_url($id);
    }
         

/* End of file MY_datatable_helper.php */
/* Location: ./application/helpers/MY_datatable_helper.php */
