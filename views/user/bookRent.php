<main id="bookRent">
    <?php foreach($book as $b): ?>
    <div class="books">
        <img src="./uploads/<?= $b -> bookImg ?>">
        <p><b>제목:</b> <?= $b -> bookName ?></p>
        <p><b>빌릴수 있는 책:</b> <?= $b -> nowRentCount ?>권</p>

        <form action="/rentBook" method="post">
            <input type="hidden" name="bookIdx" value="<?= $b -> idx ?>">
            <input type="hidden" name="libraryIdx" value="<?= $b -> libraryIdx ?>">
            <button type="submit">대여하기</button>
        </form>

    </div>
    <?php endforeach; ?>
</main>