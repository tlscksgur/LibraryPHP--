<?php $libInfo = DB::fetchAll("SELECT idx, libraryName, logo FROM library"); ?>

<main>
    <form action="/libraryAdd" method="post" enctype="multipart/form-data" id="libForm">
        <input type="hidden" name="idx" id="libIdx">

        <legend class="tac fb fz25" id="formTitle">서점 등록</legend>

        <table>
            <tr>
                <th>도서관 이름</th>
                <td><input type="text" name="libraryName" id="libraryName" required></td>
            </tr>
            <tr>
                <th>도서관 로고</th>
                <td><input type="file" name="logo"></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" value="도서관 등록" id="submitBtn">
                </td>
            </tr>
        </table>
    </form>
</main>

<section class="libDataSection">
    <?php foreach($libInfo as $li): ?>
    <div class="libContent">
        <div class="libImg">
            <img src="/uploads/<?= $li->logo ?>" alt="">
        </div>

        <div class="libName"><?= $li->libraryName ?></div>

        <div class="libBtnBox">
            <input type="button" value="수정" onclick="libraryFix(<?= $li->idx ?>, '<?= $li->libraryName ?>')">
            <input type="button" value="삭제" onclick="libraryDel(<?= $li->idx ?>)">
        </div>
    </div>
    <?php endforeach; ?>
</section>

<script>

    function libraryFix(idx, name) {
        $('#libIdx').value = idx;
        $('#libraryName').value = name

        $('#libForm').action = '/libraryFix';
        $('#formTitle').innerText = '서점 수정';
        $('#submitBtn').value = '수정 완료';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function libraryDel(idx) {
        const form = newEl('form', {
            method: 'post',
            action: '/libraryDel'
        })
        const input = newEl('input', {
            type: 'hidden',
            name: 'idx',
            value: idx
        })

        form.appendChild(input);
        document.body.appendChild(form)
        form.submit();
    }

</script>
