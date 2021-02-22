<div class="menu">
    <ul class="menu__list">
        <li class="menu__item"><a href="<?= \yii\helpers\Url::to(['friend/users']) ?>" class="menu__link">Люди</a></li>
        <li class="menu__item"><a href="<?= \yii\helpers\Url::to(['friend/friends', 'id' => Yii::$app->user->identity->id]) ?>" class="menu__link">Друзья</a></li>
        <li class="menu__item"><a href="<?= \yii\helpers\Url::to(['dialog/dialogs']) ?>" class="menu__link">Сообщения</a></li>
        <li class="menu__item"><a href="#" class="menu__link">Новости</a></li>
        <hr>
        <li class="menu__item"><a href="<?= \yii\helpers\Url::toRoute(['setting/settings']) ?>" class="menu__link">Настройки</a></li>
    </ul>
</div>