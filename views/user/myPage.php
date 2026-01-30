<main id="myPage" class="flex fd">
    <h2>마이 페이지</h2>

    <?php if(empty($myRents)) :?>
        <p>현재 대여 중인 책이 없습니다.</p>
    <?php endif; ?>

    <?php foreach($myRents as $mr): ?>
        <div class="myContent">
            <p>도서관명: <?= $mr -> libraryName ?></p>
            <p>책 제목: <?= $mr -> bookName ?></p>
            <p>대여일: <?= $mr -> rentDate ?></p>
            <p>반납일: <?= $mr -> dueDate ?></p>
            
            <form action="/returnBook" method="post">
                <input type="hidden" name="returnIdx" value="<?= $mr -> rentIdx ?>">
                <input type="submit" value="반납하기">
            </form>

        </div>
    <?php endforeach; ?>

</main>