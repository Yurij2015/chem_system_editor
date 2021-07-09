<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
<!--            --><?php
//            echo Nav::widget([
//                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
//                'items' => [
////            ['label' => 'Обратная связь', 'url' => ['/site/contact']],
//                    Yii::$app->user->isGuest ? (
//                    ['label' => 'Войти', 'url' => ['/site/login']]
//                    ) : (
//                        '<li>'
//                        . Html::beginForm(['/site/logout'], 'post')
//                        . Html::submitButton(
//                            'Выйти (' . Yii::$app->user->identity->username . ')',
//                            ['class' => 'btn btn-link logout']
//                        )
//                        . Html::endForm()
//                        . '</li>'
//                    ),
//                ],
//            ]);
//            ?>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Меню модуля', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => Yii::t('translate', 'Chemical Elements'), 'url' => ['/chemical-elements']],
                    ['label' => Yii::t('translate', 'Chemical Reactions'), 'url' => ['/chemical-reactions']],
                    ['label' => Yii::t('translate', 'Chemicals'), 'url' => ['/chemicals']],
                    ['label' => Yii::t('translate', 'Reaction Reagents'), 'url' => ['/reaction-reagents']],
                    ['label' => Yii::t('translate', 'Elements Of Chemicals'), 'url' => ['/elements-of-chemicals']],
//                    ['label' => 'Войти', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => Yii::t('translate', 'User Panel'), 'url' => ['/user']],

                ],
            ]
        ) ?>
    </section>
</aside>
