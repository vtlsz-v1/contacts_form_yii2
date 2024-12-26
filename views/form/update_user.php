<?php
use yii\helpers\Html; // используется для вывода кнопки
use yii\widgets\ActiveForm; // подключаем виджет для вывода формы
?>
<div class="col-md-8 mx-auto">
    <h1 class="text-center"><?=$this->title ?> <span class="text-danger">ID <?=$user->id ?></span></h1>

    <!-- сообщение об успехе -->
    <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

        <!-- сообщение об ошибке -->
        <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'method' => 'post']]) ?>

    <!-- выводим поля формы из модели user -->
    <?=$form->field($user, 'name')->label('<b>Имя:</b>') ?>
    <?=$form->field($user, 'surname')->label('<b>Фамилия:</b>') ?>
    <?=$form->field($user, 'phone', ['enableAjaxValidation' => true])->label('<b>Телефон</b> (<u>без 8 или +7</u>)<b>:</b>') ?>
    <br>
    
    <!-- кнопка отправки данных -->
    <div class="d-grid gap-2">
        <?= Html::submitButton('<h5>Отправить</h5>', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end() ?>

    <p class="mt-3"><a href = "<?=Yii::$app->urlManager->createUrl(['form/show']) ?>">Вернуться на страницу со списком всех пользователей</a></p>
    <p class="mt-3"><a href = "<?=Yii::$app->urlManager->createUrl(['form/create']) ?>">Добавить нового пользователя</a></p>
</div>