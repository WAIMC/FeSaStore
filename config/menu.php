<?php
    return [
        [
            'label' => 'Bảng Điều Khiển',
            'route' => 'admin.index',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Quản lý file',
            'route' => 'admin.file',
            'icon' => 'fa-file'
        ],
        [
            'label'=>'Quản lý Danh Mục',
            'route'=>'category.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [
                    'label'=>'Danh Sách Danh Mục',
                    'route'=>'category.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Thêm Danh Mục',
                    'route'=>'category.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý Đường Dẫn',
            'route'=>'settingLink.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [
                    'label'=>'Danh Sách Danh Mục',
                    'route'=>'settingLink.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Thêm Danh Mục',
                    'route'=>'settingLink.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ]

    ];
?>