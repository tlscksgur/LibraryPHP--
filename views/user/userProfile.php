<main class="fd">
    <h2>유저 프로필</h2>
    <p>이름: <strong><?= $user -> name ?></strong></p>
    <p>대여한 책: <b><?= $user -> rentBook ?? '없음' ?></b></p>
</main>