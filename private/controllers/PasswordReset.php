<?php


class PasswordReset extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function forgot_password()
    {
        if (isset($_POST['forgot'])) {
            $email = $this->input->post('email');
            $que = $this->db->query("select email,pass from user_data where email='$email'");
            $row = $que->row();
            $user_email = $row->email;
            if ((!strcmp($email, $user_email))) {
                $pass = $row->pass;
                /*Mail Code*/
                $to = $user_email;
                $subject = "Password";
                $txt = "Your password is $pass .";
                $headers = "From: password@example.com" . "\r\n" .
                    "CC: ifany@example.com";
                mail($to, $subject, $txt, $headers);
            }
        }
        $this->view('passwordReset');
    }
}