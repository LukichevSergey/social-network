<div class="wrapper">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="users">
        <?php if(!empty($friends)): ?>
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
        <?php else: ?>
        <h2>У вас пока нет друзей</h2>
        <?php endif; ?>
    </div>
    <div class="requests">
        <?php if((Yii::$app->user->identity->id == Yii::$app->request->get('id'))): ?>
            <?php if(!empty($friendRequests)): ?>
            <h2>Заявки к вам в друзья</h2>
            <table class="iksweb">
                <tr>
                    <th>Пользователь</th>
                    <th>Возраст</th>
                    <th>Страна проживания</th>
                    <th>Статус заявки</th>
                </tr>
                <?php foreach ($friendRequests as $request): ?>
                    <tr>
                        <td>
                            <li class="user__item"><a href="<?= \yii\helpers\Url::toRoute(['home/user', 'id' => $request->id]) ?>" class="user__link"><?= $request->name . " " . $request->surname ?></a></li></td>
                        <td><?= calculate_age($request->dateofbirth) ?></td>
                        <td><?= $request->country ?></td>
                        <td><a href="<?= \yii\helpers\Url::toRoute([
                                'friend/request', 'user_id' => $request->id,
                                'friend_id' => Yii::$app->user->identity->id,
                                'accepted' => 1]) ?>" style="color: #006400">Принять</a> | <a href="<?= \yii\helpers\Url::toRoute([
                                'friend/request', 'user_id' => $request->id,
                                'friend_id' => Yii::$app->user->identity->id,
                                'accepted' => 0]) ?>" style="color: #B22222">Отклонить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <h2>У вас пока нет заявок в друзья</h2>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>