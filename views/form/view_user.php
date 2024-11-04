<h1 class="text-center">Список пользователей</h1>
<!-- выводим информацию о пользователях в виде таблицы -->
<table class="table table-bordered shadow table-hover">
    <tr class="sticky-top">
        <th class="text-center bg-primary text-white">ID</th>
        <th class="text-center bg-secondary text-white">Имя</th>
        <th class="text-center bg-primary text-white">Фамилия</th>
        <th class="text-center bg-secondary text-white">Телефон</th>
        <th class="text-center bg-primary text-white">Дата создания</th>
        <th class="text-center bg-secondary text-white">Дата обновления</th>
        <th class="text-center bg-primary text-white">Редактировать</th>
        <th class="text-center bg-secondary text-white">Удалить</th>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user->id ?></td>
            <td><?=$user->name ?></td>
            <td> <?=$user->surname ?></td>
            <td><?=$user->phone ?></td>
            <td><?=$user->date_creation ?></td>
            <td><?=$user->date_update ?></td>
            <!-- редактировать запись в таблице -->
            <td class="text-center"><a class="link-underline-light link-opacity-50-hover" href = "<?=Yii::$app->urlManager->createUrl(['form/update', 'id' => $user->id]) ?>">&#9997;</a></td>
            <!-- удалить запись в таблице -->
            <td class="text-center">
                <a class="link-underline-light link-opacity-50-hover" href = "<?=Yii::$app->urlManager->createUrl(['form/delete', 'id' => $user->id]) ?>"  
                onclick="return confirm('Вы действительно хотите удалить пользователя ID <?=$user->id . ' ' . $user->name . ' ' . $user->surname ?> ?')">&#10060;</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p class="sticky-bottom m-0 pt-2 pb-2 bg-dark shadow">
    <a class="link-warning" href = "<?=Yii::$app->urlManager->createUrl(['form/create']) ?>">Добавить нового пользователя</a>
</p>