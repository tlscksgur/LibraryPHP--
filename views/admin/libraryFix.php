<form action="/libraryFix" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idx" value="<?= $lib->idx ?>">
    <legend class="tac fb fz25">도서관 수정</legend>
    <table>
        <tr>
            <th></th>
            <td><input type="text" name="libraryName" value="<?= $lib->libraryName ?>" required></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="file" name="logo"></td>
        </tr>
        <tr>
            <td><input type="submit" value="수정 완료"></td>
        </tr>
    </table>

</form>
