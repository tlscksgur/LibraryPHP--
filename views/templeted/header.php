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
            <li><a href="/libraryManager">서점관리</a></li>
            <li><a href="/userlist">유저 리스트</a></li>
            <li><a href="/logout">로그아웃</a></li>
            <li><?= ss()->id ?></li>

        <?php elseif(ss()->role === 'manager'): ?>
            <li><a href="/">홈으로</a></li>
            <li><a href="/libraryManager">내 서점</a></li>
            <li><a href="/logout">로그아웃</a></li>
            <li><?= ss()->id ?></li>

        <?php else: ?>
            <li><a href="/">홈으로</a></li>
            <li><a href="/logout">로그아웃</a></li>
            <li><?= ss()->id ?></li>
        <?php endif; ?>
    </ul>
</header>
