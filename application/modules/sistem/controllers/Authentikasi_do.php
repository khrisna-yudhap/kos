<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentikasi_do extends ACM_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->library('ciqrcode');  

        $this->load->model('Group_model');
        $this->load->model('Authentikasi_model');
    }

    function update()
    {
        if ($this->input->post()) {
            $auth = array();
            for ($i = 0; $i < $_POST['total']; $i++) {
                array_push($auth, array(
                    "menuid" => $_POST['MenuId' . $i],
                    "index" => isset($_POST['index' . $i]) ? $_POST['index' . $i] : '',
                    "add" => isset($_POST['add' . $i]) ? $_POST['add' . $i] : '',
                    "update" => isset($_POST['update' . $i]) ? $_POST['update' . $i] : '',
                    "delete" => isset($_POST['delete' . $i]) ? $_POST['delete' . $i] : '',
                    "detail" => isset($_POST['detail' . $i]) ? $_POST['detail' . $i] : '',
                    "print" => isset($_POST['print' . $i]) ? $_POST['print' . $i] : '',
                    "import" => isset($_POST['import' . $i]) ? $_POST['import' . $i] : ''
                ));
            }
            $result = $this->Authentikasi_model->doUpdate(decrypt_url($_POST['group_id']), $auth);
            if ($result) {
                $err = '::/3';
            } else {
                $err = '::/4';
            }
        }
        redirect('sistem/authentikasi');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Group_model->doDelete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file Group_do.php */
/* Location: ./application/controllers/system/Group_do.php */
