<div class="wrapper">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="user">
        <div class="user__photo"><img class="user__photo_img" src="http://placehold.it/150x200" /></div>
        <div class="user__name">Имя: <?= Yii::$app->user->identity->name ?></div>
        <div class="user__surname">Фамилия: <?= Yii::$app->user->identity->surname ?></div>
        <div class="user__dateofbirth">Дата Рождения: <?= Date("d.m.Y", strtotime(Yii::$app->user->identity->dateofbirth)) ?>
            (<?= calculate_age(Yii::$app->user->identity->dateofbirth) ?>)</div>
        <div class="user__country">Страна: <?= Yii::$app->user->identity->country ?></div>
    </div>
</div>