<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

<header>
    <ul>
        <?php if(!ss()): ?>
            <li><a href="/login">로그인</a></li>
            <li><a href="/">홈으로</a></li>
            <li><a href="/join">회원가입</a></li>

        <?php elseif(ss()->role === 'admin'): ?>
            <li><a href="/">홈으로</a></li>
            <li><a href="/admin">서점관리</a></li>
            <li><a href="/userlist">유저 리스트</a></li>
            <li>id: <?= ss()->id ?></li>
            <li><a href="/logout">로그아웃</a></li>

        <?php elseif(ss()->role === 'manager'): ?>
            <li><a href="/">홈으로</a></li>
            <li><a href="/bookAdd">책 등록</a></li>
            <li><a href="/calendar">대여 유저 조회(캘린더)</a></li>
            <li><a href="/table">대여 유저 조회(표)</a></li>
            <li>id: <?= ss()->id ?></li>
            <li><a href="/logout">로그아웃</a></li>

        <?php else: ?>
            <li><a href="/">홈으로</a></li>
            <li><a href="/libraryFind">도서관 조회</a></li>
            <li><a href="/myPage">마이페이지</a></li>
            <li><?= ss()->id ?></li>
            <li><a href="/logout">로그아웃</a></li>
        <?php endif; ?>
    </ul>
</header>
