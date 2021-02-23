<div class="wrapper">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="user">
        <div class="user__photo"><img class="user__photo_img" src="<?= $user->avatar ? "/web/uploads/" . $user->avatar : "http://placehold.it/150x200" ?>" /></div>
        <div class="user__photo_load">
            <?php if(empty(Yii::$app->request->get('id')) || Yii::$app->request->get('id') == Yii::$app->user->identity->id): ?>
            <?= \yii\helpers\Html::a('Загрузка фотографии', ['setting/avatar', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-default']) ?>
            <?php endif; ?>
        </div>
        <div class="user__name">Имя: <?= $user->name ?></div>
        <div class="user__surname">Фамилия: <?= $user->surname ?></div>
        <div class="user__dateofbirth">Дата Рождения: <?= Date("d.m.Y", strtotime($user->dateofbirth)) ?>
            (<?= calculate_age($user->dateofbirth) ?>)</div>
        <div class="user__country">Страна: <?= $user->country ?></div>
    </div>
</div>