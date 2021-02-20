<div class="wrapper">
    <div class="users">
        <h2>Все пользователи</h2>
        <table class="iksweb">
            <tr>
                <th>Пользователь</th>
                <th>Возраст</th>
                <th>Страна проживания</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <li class="user__item"><a href="<?= \yii\helpers\Url::toRoute(['home/user', 'id' => $user->id]) ?>" class="user__link"><?= $user->name . " " . $user->surname ?></a></li></td>
                <td><?= calculate_age($user->dateofbirth) ?></td>
                <td><?= $user->country ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $pages
        ]) ?>
    </div>
    <div class="sort">
        <h2>Сортировка</h2>
        <ul class="sort__list">
            <li class="sort__item">
                <a href="<?= \yii\helpers\Url::toRoute(['friend/users', 'sort' => 'alphabetically']) ?>" class="sort__link">По алфавиту</a></li>
            <li class="sort__item">По возрасту:
                <a href="<?= \yii\helpers\Url::toRoute(['friend/users', 'sort' => 'ascending']) ?>" class="sort__link">По возрастанию</a>
                <a href="<?= \yii\helpers\Url::toRoute(['friend/users', 'sort' => 'descending']) ?>" class="sort__link">По убыванию</a></li>
            <li class="sort__item">
                <a href="<?= \yii\helpers\Url::toRoute(['friend/users', 'sort' => 'by-country']) ?>" class="sort__link">По стране проживания</a></li>
        </ul>
    </div>
</div>