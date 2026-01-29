<main>
    <form action="/bookAdd" method="post" enctype="multipart/form-data" id="form">
        <input type="hidden" name="idx" id="bookIdx">
        <legend class="tac fb fz25">책 등록</legend>
        <table>
            <tr>
                <th>책 이름</th>
                <td><input type="text" name="bookName" id="bookName"></td>
            </tr>
            <tr>
                <th>책 설명</th>
                <td>
                    <input type="text" name="content" id="content">
                </td>
            </tr>
            <tr>
                <th>책 이미지</th>
                <td><input type="file" name="bookImg" id="bookImg"></td>
            </tr>
            <tr>
                <th>책 수량</th>
                <td><input type="number" name="count" min="1" id="count"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="책 등록" id="fixBtn">
                </td>
            </tr>
        </table>
    </form>
</main>

<?php $bookList = DB::fetchAll("SELECT * FROM book") ?>
<section class="bookListSection">
    <?php foreach($bookList as $BL): ?>
        <div class="bookListContent">
            <div><img src="./uploads/<?= $BL -> bookImg?>"></div>
            <div><?= $BL -> bookName ?></div>
            <div><?= $BL -> content ?></div>
            <div class="bookFixDelBtn">
                <input type="submit" value="수정"
                onclick="getValue(
                    <?= $BL->idx ?>,
                    '<?= htmlspecialchars($BL->bookName, ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($BL->content, ENT_QUOTES) ?>',
                    <?= $BL->totalCount ?>
                )">
                <input type="button" value="삭제" onclick="bookDel(<?= $BL -> idx ?>)">
            </div>
        </div>
    <?php endforeach; ?>
</section>

<script>
    function getValue(idx, name, content, count) {
        $('#bookIdx').value = idx
        $('#bookName').value = name
        $('#content').value = content
        $('#count').value = count

        $('#form').action = '/bookFix'
        $('#fixBtn').value = '수정 완료'
    }

    function bookDel(idx) {
        const form = newEl('form', {
            method: "post",
            action: "/deleteBook"
        })
        const input = newEl('input', {
            type: "hidden",
            name: "idx",
            value: idx
        })

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }

</script>