<?php
    $myIdx = ss()->idx;

    $userList = DB::fetchAll("
        SELECT *
        FROM user
        WHERE idx != $myIdx
        AND cate = 'manager' OR cate = ''
    ");
    $managerList = DB::fetchAll("
        SELECT name
        FROM user
        WHERE idx != $myIdx
        AND cate = 'manager'
        UNION
        select managerId
        from library
    ");
?>

<main>
    <div class="content">

        <form action="/managerAdd" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>libraryName</th>
                    <td><input type="text" name="libraryName" id=""></td>
                </tr>
                <tr>
                    <th>logo</th>
                    <td><input type="file" name="logo" id=""></td>
                </tr>
                <tr>
                    <th>managerId</th>
                    <td><input type="text" name="managerId" id=""></td>
                </tr>
                <tr>
                    <th>managerPw</th>
                    <td><input type="password" name="managerPw" id=""></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="서점 관리자 등록"></td>
                </tr>
            </table>
        </form>

        <ul class="managerList">
            <li class="tac fb fz25">매니저</li>
            <?php foreach($managerList as $ml): ?>
            <li><?= $ml -> name ?></li>
            <?php endforeach; ?>
        </ul>
        <ul class="userList">
            <li class="tac fb fz25">일반유저</li>
            <?php foreach($userList as $ul): ?>
                <li><?= $ul -> name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>