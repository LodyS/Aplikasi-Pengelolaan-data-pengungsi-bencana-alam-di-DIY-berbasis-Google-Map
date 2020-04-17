<?php
require_once'functions.php';
 

    /** LOGIN */ 
    if ($mod=='login'){
        $username = esc_field($_POST['username']);
        $password = esc_field($_POST['password']);
        
        $row = $db->get_row("SELECT * FROM admin WHERE username='$username' AND password='$password'");
        if($row){
            $_SESSION['login'] = $row->username;
            redirect_js("index.php");
        } else{
            print_msg("Salah kombinasi username dan password.");
        }          
    }  else if ($mod=='password'){
        $pass1 = $_POST[pass1];
        $pass2 = $_POST[pass2];
        $pass3 = $_POST[pass3];
        
        $row = $db->get_row("SELECT * FROM admin WHERE username='$_SESSION[username]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg('Field bertanda * harus diisi.');
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif( $pass2 != $pass3 )
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            $db->query("UPDATE admin SET password='$pass2' WHERE username='$_SESSION[username]'");                    
            print_msg('Password berhasil diubah.', 'success');
        }
    } elseif($act=='logout'){
        unset($_SESSION['login']);
        header("location:index.php?m=login");
    }