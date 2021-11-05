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
        ],
        [
            'label'=>'Quản lý Sản Phẩm',
            'route'=>'product.index',
            'icon'=>'fa-project-diagram',
            'items'=>[
                [
                    'label'=>'Danh Sách Sản Phẩm',
                    'route'=>'product.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Thêm Sản Phẩm',
                    'route'=>'product.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý Biến Thể',
            'route'=>'variantProduct.index',
            'icon'=>'fa-project-diagram',
            'items'=>[
                [
                    'label'=>'Danh Sách Biến Thể',
                    'route'=>'variantProduct.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý Thương hiệu ',
            'route'=>'brand.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [

                    'label'=>'Danh Sách Thương hiệu',

                    'route'=>'brand.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [

                    'label'=>'Thêm Thương hiệu mới',

                    'route'=>'brand.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý banner ',
            'route'=>'banner.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [
                    'label'=>'Danh Sách banner',
                    'route'=>'banner.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Thêm mới banner ',
                    'route'=>'banner.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý bài viết',
            'route'=>'blog.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [

                    'label'=>'Danh mục bài viết',

                    'route'=>'categoryblog.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [

                    'label'=>'Danh sách bài viết',

                    'route'=>'blog.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],

    ];
?>