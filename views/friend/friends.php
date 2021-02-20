<div class="wrapper">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="users">
        <h2>Ваши друзья</h2>
        <table class="iksweb">
            <tr>
                <th>Пользователь</th>
                <th>Возраст</th>
                <th>Страна проживания</th>
            </tr>
            <?php foreach ($friends as $friend): ?>
                <tr>
                    <td>
                        <li class="user__item"><a href="<?= \yii\helpers\Url::toRoute(['home/user', 'id' => $friend->id]) ?>" class="user__link"><?= $friend->name . " " . $friend->surname ?></a></li></td>
                    <td><?= calculate_age($friend->dateofbirth) ?></td>
                    <td><?= $friend->country ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="requests">
        <h2>Заявки к вам в друзья</h2>
        <table class="iksweb">
            <tr>
                <th>Пользователь</th>
                <th>Возраст</th>
                <th>Страна проживания</th>
            </tr>
            <?php foreach ($friendRequests as $request): ?>
                <tr>
                    <td>
                        <li class="user__item"><a href="<?= \yii\helpers\Url::toRoute(['home/user', 'id' => $request->id]) ?>" class="user__link"><?= $request->name . " " . $request->surname ?></a></li></td>
                    <td><?= calculate_age($request->dateofbirth) ?></td>
                    <td><?= $request->country ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>