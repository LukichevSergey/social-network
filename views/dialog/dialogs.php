<div class="wrapper">
    <div class="dialogs">
        <h2>Диалоги</h2>
        <ul class="dialogs__list"
            <?php foreach ($users as $user): ?>
                <li class="sort__item"><a href="<?= \yii\helpers\Url::toRoute(['dialog/dialogs', 'id' => $user->id]) ?>" class="sort__link"><?= $user->name . " " . $user->surname ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="dialog">
        <?php use \yii\widgets\ActiveForm; ?>
        <?php $form = ActiveForm::begin([
            'id' => 'my-form',
            'enableClientValidation' => true, //Отключение клиентской валидации
            'options' => [
                'class' => 'form-horizontal',
            ]
        ]) ?>

        <?= $form->field($dialogForm, 'message')->textarea(['rows' => 3, 'placeholder' => 'Введите текст'])  ?>

        <div><button type="submit" class="btn btn-primary">Отправить</button></div>

        <?php ActiveForm::end() ?>

        <?php if(Yii::$app->request->get('id')): ?>
        <h2>Диалог с <?= $friend->name . " " . $friend->surname ?></h2>
        <ul class="dialog__list">
            <?php foreach ($userMessages as $userMessage): ?>
                <li class="dialog__item"><div class="userMessage">
                        <div class="dialog__item_time"></div><?= $userMessage->datetime ?>
                        <div class="dialog__item_text"></div><?= $userMessage->text ?>
                    </div></li>
            <?php endforeach; ?>
            <?php foreach ($opponentMessages as $opponentMessage): ?>
                <li class="dialog__item"><div class="opponentMessage">
                        <div class="dialog__item_time"></div><?= $opponentMessage->datetime ?>
                        <div class="dialog__item_text"></div><?= $opponentMessage->text ?>
                    </div></li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <h2>Ваши диалоги</h2>
        <?php endif; ?>
    </div>
</div>