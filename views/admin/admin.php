<main>
    <form action="libraryAdd" method="post" enctype="multipart/form-data">
        <legend class="tac fb fz25">서점관리</legend>
        <table>
            <tr>
                <th>도서관 이름</th>
                <td><input type="text" name="libraryName" id=""></td>
            </tr>
            <tr>
                <th>도서관 로고</th>
                <td><input type="file" name="logo" id=""></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><input type="submit" value="도서관등록"></td>
            </tr>
        </table>
    </form>
</main>
<?php $libInfo = DB::fetchAll("SELECT idx, libraryName, logo FROM library") ?>
<section class="libDataSection">
    <?php foreach($libInfo as $li): ?>
    <div class="libContent">
        <div class="libImg"><img src="./uploads/<?= $li -> logo ?>" alt=""></div>
        <div class="libName"><?= $li -> libraryName ?></div>
        <div class="libBtnBox">
            <form action="/libraryFix">
                <input type="hidden" name="idx" value="<?= $li -> idx ?>">
                <input type="submit" value="수정">
            </form>

            <form action="/libraryDel">
                <input type="hidden" name="idx" value="<?= $li -> idx ?>">
                <input type="button" value="삭제">
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</section>