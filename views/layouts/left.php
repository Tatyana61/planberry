<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->isGuest ?'Гость':(\Yii::$app->user->identity->username) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Панель управления', 'options' => ['class' => 'header']],
                    ['label' => 'Проекты',
                        'icon' => 'share',
                        'url' => ['/project'],
                        'items' => [['label' => 'Проекты', 'icon' => 'dashboard', 'url' => ['/project/index'],],
                            ['label' => 'Создать проект', 'icon' => 'file-code-o', 'url' => ['/project/create'],],],
                        ],
                    ['label' => 'Задачи',
                        'icon' => 'share',
                        'url' => ['/task'],
                        'items' => [['label' => 'Задачи', 'icon' => 'dashboard', 'url' => ['/task/index'],],
                            ['label' => 'Создать задачу', 'icon' => 'file-code-o', 'url' => ['/task/create'],],],
                    ],

                    ['label' => 'Тикеты',
                        'icon' => 'share',
                        'url' => ['/ticket'],
                        'items' => [['label' => 'Тикеты', 'icon' => 'dashboard', 'url' => ['/ticket/index'],],
                            ['label' => 'Создать тикет', 'icon' => 'file-code-o', 'url' => ['/ticket/create'],],],
                    ],
                    ['label' => 'Обсуждения',
                        'icon' => 'share',
                        'url' => ['/discussion'],
                        'items' => [['label' => 'Обсуждения', 'icon' => 'dashboard', 'url' => ['/discussion/index'],],
                            ['label' => 'Создать обсуждение', 'icon' => 'file-code-o', 'url' => ['/discussion/create'],],],
                    ],
                    ['label' => 'Пользователи',
                        'icon' => 'share',
                        'url' => ['/user'],
                        'items' => [
                            ['label' => 'Добавить пользователя', 'icon' => 'file-code-o', 'url' => ['/site/signup'],],],
                    ],
                    ['label' => 'Отчеты', 'icon' => 'dashboard', 'url' => ['#']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],


                ],
            ]
        ) ?>

    </section>

</aside>
