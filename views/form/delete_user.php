<div class="col-md-8 mx-auto">
    <h1 class="text-center">Удаление пользователя</h1>

    <!-- сообщение об успехе -->
    <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

        <!-- сообщение об ошибке -->
        <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        
        <p class="mt-3"><a href = "<?=Yii::$app->urlManager->createUrl(['form/show']) ?>">Вернуться на страницу со списком всех пользователей</a></p>
        <p class="mt-3"><a href = "<?=Yii::$app->urlManager->createUrl(['form/create']) ?>">Добавить нового пользователя</a></p>

</div>