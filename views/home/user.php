<div class="wrapper">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="user">
        <div class="user__photo"><img class="user__photo_img" src="http://placehold.it/150x200" /></div>
        <div class="user__name">Имя: <?= $user->name ?></div>
        <div class="user__surname">Фамилия: <?= $user->surname ?></div>
        <div class="user__dateofbirth">Дата Рождения: <?= Date("d.m.Y", strtotime($user->dateofbirth)) ?>
            (<?= calculate_age($user->dateofbirth) ?>)</div>
        <div class="user__country">Страна: <?= $user->country ?></div>
    </div>
</div>