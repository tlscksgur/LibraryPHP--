<main class="fd">
    <h2>유저 조회</h2>
    <p>유저 이름: <strong><?= $user -> name ?></strong></p>

    <?php if (empty($myRents)) : ?>
        <p>대여한 책이 없습니다.</p>
    <?php endif; ?>

    <?php foreach ($myRents as $mr): ?>
        <div class="myContent tac">
            <p>책 제목: <?= $mr -> bookName ?></p>
            <p>대여일: <?= $mr -> rentDate ?></p>
            <p>반납일: <?= $mr -> dueDate ?></p>
        </div>
    <?php endforeach; ?>
</main>
