<?php
$user = (new \App\User())->DeleteAccount($_POST['email'], $_POST['password']);
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if ($user) {
        $saveemail = $user['email'];
        $savepasssword = $user['password'];
        if ($saveemail === $_POST['email'] && $savepasssword === $_POST['password']) {
            (new \App\User)->DeleteAccount($saveemail, $savepasssword);
            redirect('/');
        }
        else {
            $_SESSION['error_message'] = 'Invalid email or password';
            redirect('/login');
        }
    } else {
        $_SESSION['error_message'] = 'Invalid email or password';
        redirect('/login');
    }
}else {
    $_SESSION['error_message'] = 'Please fill in all fields';
    redirect('/login');
}