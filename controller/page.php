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


get('/admin', function() {
    views('admin/admin');
});
get('/userlist', function() {
    views('admin/userList');
});


get('/bookAdd', function() {
    views('manager/bookAdd');
});
get('/calendar', function() {
    views('manager/calendar');
});
get('/rentUserSelect', function() {
    views('manager/rentUserSelect');
});


// get('/libraryFix', function() {
//     echo 'HERE'; exit;
     // $idx = $_GET['idx'];
     // $lib = DB::fetch("SELECT * FROM library WHERE idx = '$idx'");
     // views('admin/libraryFix', compact('lib'));
// });

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

/* 슈퍼관리자 */
post('/managerAdd', function() {
    extract($_POST);

    $from = $_FILES['logo']['tmp_name'];
    $img = $_FILES['logo']['name'];

    move_uploaded_file($from, 'uploads/' . $img);

    DB::exec("INSERT INTO library (libraryName, logo, managerId, managerPw) values ('$libraryName','$logo','$managerId','$managerPw')");
    
    move('/', '관리자 등록');
});

post('/libraryAdd', function() {
    extract($_POST);

    $from = $_FILES['logo']['tmp_name'];
    $img = $_FILES['logo']['name'];

    move_uploaded_file($from, 'uploads/' . $img);

    DB::exec("INSERT INTO library (libraryName, logo) values ('$libraryName', '$img')");

    back('도서관 등록');
});

post('/libraryFix', function() {
    extract($_POST);

    $lib = DB::fetch("SELECT logo FROM library WHERE idx='$idx'");
    $img = $lib->logo;

    if (!empty($_FILES['logo']['name'])) {
        $from = $_FILES['logo']['tmp_name'];
        $img = $_FILES['logo']['name'];
        move_uploaded_file($from, 'public/uploads/' . $img);
    }

    DB::exec("UPDATE library SET libraryName='$libraryName', logo='$img' WHERE idx='$idx'");

    back('서점 수정 완료');
});

post('/libraryDel', function() {
    extract($_POST);

    DB::exec("DELETE FROM library where idx = '$idx'");
    back('삭제');
});
/* 슈퍼관리자 */

/* 서점 관리자 */
post('/bookAdd', function() {
    extract($_POST);

    $libraryIdx = ss()->idx;
    $img = '';

    if(!empty($_FILES['bookImg']['name'])) {
        $from = $_FILES['bookImg']['tmp_name'];
        $img = $_FILES['bookImg']['name'];
        move_uploaded_file($from, 'uploads/' . $img);
    }

    DB::exec("
        INSERT INTO book 
        (libraryIdx, bookName, content, bookImg, totalCount, nowRentCount)
        values
        ('$libraryIdx', '$bookName', '$content', '$img', '$count', '$count')
    ");
    back('책추가!');
});

post('/bookFix', function() {
    extract($_POST);

    $book = DB::fetch("SELECT * FROM book where idx = '$idx'");
    $bookImg = $book->bookImg;

    if(!empty($_FILES['bookImg']['tmp_name'])) {
        $from = $_FILES['bookImg']['tmp_name'];
        $img = $_FILES['bookImg']['name'];
        move_uploaded_file($from, 'uploads/' . $img);
    }

    DB::exec("UPDATE book SET bookName='$bookName', content='$content', bookImg='$img', totalCount='$count' where idx = '$idx' ");

    back('책 정보가 수정되었습니다.');
});

post('/deleteBook', function() {
    extract($_POST);

    DB::exec("");
    
});

/* 서점 관리자 */