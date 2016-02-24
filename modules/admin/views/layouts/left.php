<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Сторінки', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/pages']],
                ],
            ]
        ) ?>

    </section>

</aside>
