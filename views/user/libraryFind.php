<?php $libraryFind = DB::fetchAll("SELECT idx, libraryName, logo FROM library") ?>
<main id="librarys">
    <?php foreach($libraryFind as $libFind): ?>
    <div class="library lib<?= $libFind->idx ?>">
        <img src="./uploads/<?= $libFind -> logo ?>">
        <p class="tac"><a href="/bookRent?idx=<?= $libFind->idx ?>"><?= $libFind -> libraryName ?></a></p>
    </div>
    <?php endforeach; ?>
</main>