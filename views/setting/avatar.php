<h2>Загрузка фото</h2>
<?php use \yii\widgets\ActiveForm; ?>
<?//= \app\widgets\Alert::widget() ?>
<?php $form = ActiveForm::begin([
    'id' => 'my-form',
]) ?>

<?= $form->field($model, 'image')->fileInput() ?>

<div><button type="submit" class="btn btn-primary">Загрузить фото</button></div>

<?php ActiveForm::end() ?>