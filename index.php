<?php
$links = [
    ['url' => 'https://google.com', 'name' => 'Google'],
    ['url' => 'https://yandex.com', 'name' => 'Yandex'],
    ['url' => 'https://bingo.com', 'name' => 'Bingo']
];
?>
    <?php foreach ($links as $link) : ?>
        <div><a href="<?= $link['url'] ?>"><?= $link['name'] ?></a></div>
    <?php endforeach; ?>
