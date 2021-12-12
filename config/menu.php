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
            'label' => 'Quản lý Phân Quyền',
            'route' => 'decentralize.index',
            'icon' => 'fa-user-tag',
            'items' => [
                [
                    'label' => 'Danh Sách Phân Quyền',
                    'route' => 'decentralize.index',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý Vai Trò',
            'route' => 'role.index',
            'icon' => 'fa-user-tag',
            'items' => [
                [
                    'label' => 'Danh Sách Vai Trò',
                    'route' => 'role.index',
                    'icon' => 'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm Vai Trò',
                    'route' => 'role.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý Danh Mục',
            'route' => 'category.index',
            'icon' => 'fa-list-alt',
            'items' => [
                [
                    'label' => 'Danh Sách Danh Mục',
                    'route' => 'category.index',
                    'icon' => 'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm Danh Mục',
                    'route' => 'category.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý Đường Dẫn',
            'route' => 'settingLink.index',
            'icon' => 'fa-link',
            'items' => [
                [
                    'label' => 'Danh Sách Danh Mục',
                    'route' => 'settingLink.index',
                    'icon' => 'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm Danh Mục',
                    'route' => 'settingLink.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý Sản Phẩm',
            'route' => 'product.index',
            'icon' => 'fa-tshirt',
            'items' => [
                [
                    'label' => 'Danh Sách Sản Phẩm',
                    'route' => 'product.index',
                    'icon' => 'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm Sản Phẩm',
                    'route' => 'product.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý Biến Thể',
            'route' => 'variantProduct.index',
            'icon' => 'fa-project-diagram',
            'items' => [
                [
                    'label' => 'Danh Sách Biến Thể',
                    'route' => 'variantProduct.index',
                    'icon' => 'fa-circle nav-icon'
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
            'icon'=>'fa-image',
            'items'=>
            [
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
            'label'=>'Quản lý đơn hàng ',
            'route'=>'order.index',
            'icon'=>'fa fa-shopping-cart',
            'items'=>[
                [
                    'label'=>'Danh Sách đơn hàng',
                    'route'=>'order.index',
                    'icon'=>'fa-circle nav-icon'
                ],
            ]
        ],
        [
            'label'=>'Quản lý slider ',
            'route'=>'slider.index',
            'icon'=>'fa-image',
            'items'=>[
                [
                    'label'=>'Danh Sách slider',
                    'route'=>'slider.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Thêm mới slider ',
                    'route'=>'slider.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],         
        [
            'label'=>'Quản lý bài viết',
            'route'=>'blog.index',
            'icon'=>'fa-file-alt',
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
        [
            'label'=>'Quản lý đánh giá sao ',
            'route'=>'rating.index',
            'icon'=>'fa-star-half-alt',
            'items'=>[
                [
                    'label'=>'Danh Sách đánh giá sao',
                    'route'=>'rating.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],         
        [
            'label'=>'Quản lý khách hàng',
            'route'=>'customer.index',
            'icon'=>'fa-users',
            'items'=>[
                [
                    'label'=>'Danh sách khách hàng',
                    'route'=>'customer.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm khách hàng',
                    'route' => 'customer.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Quản lý bình luận',
            'route'=>'blog.index',
            'icon'=>'fa-comments',
            'items'=>[
                [
                    'label'=>'Bình luận bài viết',
                    'route'=>'commentblog.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Bình luận sản phẩm',
                    'route'=>'comment.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label' => 'Quản lý mã giảm giá',
            'route' => 'coupon.index',
            'icon' => 'fa-money-bill-alt',
            'items' => [
                [
                    'label' => 'Danh sách mã giảm giá',
                    'route' => 'coupon.index',
                    'icon' => 'fa-circle nav-icon'
                ],
                [
                    'label' => 'Thêm mã giảm giá',
                    'route' => 'coupon.create',
                    'icon' => 'fa-circle nav-icon'
                ]
            ]
        ],
    ];
?>
