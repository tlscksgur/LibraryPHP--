<?php $libraryFind = DB::fetchAll("SELECT * FROM library") ?>
<main class="flex fd">
    <!-- <legend style="font-weight: bold; font-size: 25px;">도서관</legend> -->
    <table>
        <tr>
            <th>도서관</th>
        </tr>
        <?php foreach($libraryFind as $libFind): ?>
        <tr align="center">
            <td><?= $libFind -> libraryName ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>