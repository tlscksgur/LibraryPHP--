<main>
    <form action="/bookAdd" method="post" enctype="multipart/form-data">
        <legend class="tac fb fz25">책 등록</legend>

        <table>
            <tr>
                <th>책 이름</th>
                <td><input type="text" name="bookName" required></td>
            </tr>
            <tr>
                <th>책 설명</th>
                <td>
                    <textarea name="content" rows="4" required></textarea>
                </td>
            </tr>
            <tr>
                <th>책 이미지</th>
                <td><input type="file" name="bookImg" required></td>
            </tr>
            <tr>
                <th>책 수량</th>
                <td><input type="number" name="count" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="책 등록">
                </td>
            </tr>
        </table>
    </form>
</main>
