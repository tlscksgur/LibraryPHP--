<?php 
    $libraryIdxQuery = DB::fetch("SELECT idx from library where managerId = '".ss()->id."' ");
    $libraryIdx = $libraryIdxQuery->idx;

    $rents = DB::fetchAll("
        SELECT r.idx, r.rentDate, r.dueDate, u.name as userName, b.bookName, r.status
        from rent r
        join user u 
        on u.idx = r.userIdx
        join book b
        on b.idx = r.bookIdx
        where r.libraryIdx = {$libraryIdx}
    ");
?>

<main>
    <table class="tableTable">
        <tr>
            <th>유저</th>
            <th>책 제목</th>
            <th>대여일</th>
            <th>반납 예정일</th>
            <th>상태</th>
        </tr>
        <?php foreach($rents as $rent): ?>
        <tr>
            <td><a href="/userProfile?idx=<?= $rent -> idx ?>"><?= $rent -> userName ?></a></td>
            <td><?= $rent ->  bookName ?></td>
            <td><?= $rent ->  rentDate ?></td>
            <td><?= $rent ->  dueDate ?></td>
            <td><?= $rent ->  status ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>