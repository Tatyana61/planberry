<?php
/* @var $this yii\web\View */
/* @var $user app\models\User */
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
    Hello <?= $user->username ?>,

    Перейдите по ссылке для сброса пароля::

<?= $resetLink ?>