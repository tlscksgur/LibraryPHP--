<?php

get('/', function() {
    views('home');
});
get('/join', function() {
    views('user/join');
});
get('/login', function() {
    views('user/login');
});
get('/logout', function() {
    session_destroy();
    move('/', '로그아웃');
});
get('/libraryManager', function() {
    views('admin/admin');
});
get('/userlist', function() {
    views('admin/userList');
});

post('/join', function() {
    extract($_POST);

    $idReg = '/^[A-Za-z0-9]+$/';
    $pwReg = '/[!@#$%^&*()_\-+=\[\]{};:\'",.<>\/?\\|`~]/';

    if(preg_match($idReg, $name) && preg_match($pwReg, $pw)){
        DB::exec("INSERT into user (name, pw) values ('$name', '$pw')");
    }else {
        back('아이디 및 비밀번호를 다시 작성해주세요.');
        return;
    }
    
    move('/', '회원가입 성공');
});

post('/login', function() {
    extract($_POST);

    $loginInfo = DB::fetch("SELECT idx, name AS id, cate AS role FROM user WHERE name = '$name' AND pw = '$pw'");
    if (!$loginInfo) { $loginInfo = DB::fetch("SELECT idx, managerId AS id, 'manager' AS role FROM library WHERE managerId = '$name' AND managerPw = '$pw'"); }
    if (!$loginInfo) { back('아이디 및 비밀번호를 다시 확인해주세요.'); return; }

    $_SESSION['ss'] = $loginInfo;
    move('/', '로그인 성공');
});


post('/managerAdd', function() {
    extract($_POST);

    $from = $_FILES['logo']['tmp_name'];
    $img = $_FILES['logo']['name'];

    move_uploaded_file($from, 'uploads/' . $img);

    DB::exec("INSERT INTO library (libraryName, logo, managerId, managerPw) values ('$libraryName','$logo','$managerId','$managerPw')");
    
    move('/', '관리자 등록');
});