<div class="wrapper">
    <div class="menu">
        <ul class="menu__list">
            <li class="menu__item"><a href="<?= \yii\helpers\Url::to(['friend/users']) ?>" class="menu__link">Люди</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Друзья</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Сообщения</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Новости</a></li>
        </ul>
    </div>
    <div class="user">
        <div class="user__photo"><img class="user__photo_img" src="http://placehold.it/150x200" /></div>
        <div class="user__name">Имя: <?= $user->name ?></div>
        <div class="user__surname">Фамилия: <?= $user->surname ?></div>
        <div class="user__dateofbirth">Дата Рождения: <?= Date("d.m.Y", strtotime($user->dateofbirth)) ?>
            (<?= calculate_age($user->dateofbirth) ?>)</div>
        <div class="user__country">Страна: <?= $user->country ?></div>
    </div>
</div>