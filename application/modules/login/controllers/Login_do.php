<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_do extends CI_Controller
{

    // function login() {
    // $id = $this->uri->segment(4);
    // // echo $id;
    // // exit();
    // $this->load->library('curl');
    // $this->load->library('encrypt');
    //     $parameter = json_encode(array('id_upik'=>str_replace('_', '-', $id),));
    //     $response_json = $this->curl->simple_post('https://layananupik.jogjakota.go.id/lumen/public/api/sso_id_jss',$parameter );
    //     die($response_json);

    //     $response_object = json_decode($response_json);
    //     if($response_object->status == "true"){
    //         $nik = $response_object->data->nik;
    //         //echo $nik;
    //         $data = $this->Authentikasi_model->GetUserByNik($nik);
    //         if (sizeof($data) > 0) {
    //             // print_r($data);
    //             // exit();
    //             $_SESSION['userid'] = $data['UserId'];
    //             $_SESSION['groupid'] = $data['UserGroupId'];
    //             $_SESSION['realname'] = $data['UserRealName'];
    //             $_SESSION['unitkerjaid'] = $data['UnitKerjaId'];
    //             $_SESSION['unitkerjanama'] = $data['UnitKerjaNama'];
    //             $_SESSION['npsn'] = $data['UserNpsn'];
    //             redirect('home/home');
    //         } else {
    //             // $this->form_validation->set_message("validate", "Nama Pengguna atau Kata Sandi salah.");
    //             // return FALSE;
    //             echo "Login Failed";
    //         }

    //     }
    // }

    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|callback_validate');

        if ($this->form_validation->run() == FALSE) {
            //            $data['err'] = TRUE;            
            //            $this->load->view('non_login/login', $data);
            $this->load->library('session');
            $data = array(
                'username' => $_POST['username'],
                'message_type' => "error", "message" => "<b>Login gagal.</b>" .  validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('login');
        } else {
            redirect('home');
        }
    }

    function login_2()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|callback_validate');
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            $data['success'] = FALSE;
            $data['message'] = validation_errors();
        } else {
            $data['success'] = TRUE;
            $data['message'] = 'Login Berhasil';
        }

        echo json_encode($data);
    }

    function validate($username)
    {
        $this->load->model('sistem/Authentikasi_model');

        $data = $this->Authentikasi_model->GetUserByUserPassword($_POST['username'], md5($_POST['password']));

        if (sizeof($data) > 0) {
            $_SESSION['userid'] = $data['UserId'];
            $_SESSION['groupid'] = $data['UserGroupId'];
            $_SESSION['username'] = $data['UserName'];
            $_SESSION['realname'] = $data['UserRealName'];
            return TRUE;
        } else {
            $this->form_validation->set_message("validate", "Nama Pengguna atau Kata Sandi salah.");
            return FALSE;
        }
    }

    function logout()
    {
        session_destroy();
        redirect('login');
    }
}

/* End of file login_do.php */
/* Location: ./application/controllers/non_login/login_do.php */
