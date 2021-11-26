     /**
     * Setup crud laravel project
     * load <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> first
     */ 

    /**
     * Setup delete an element
     *  @type string
     *  @default class='btnInsert' set class in an item
     *  create form post example :
     * <form action="{{ route('') }}" id="formInsert" method="POST">
     *   @csrf
     * </form>
     */ 
    $('.btnInsert').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn không thể hoàn tác chức năng này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, Thêm mới nó!',
            cancelButtonText: "Không, hủy nó!",
        }).then((result) => {
            if (result.isConfirmed) {
                $('form#formInsert').submit();
                Swal.fire(
                    'Đã Thêm!',
                    'Dữ liệu của bạn đã được thêm.',
                    'success'
                );
            }
        });
    });


    /**
     * Setup delete an element
     *  @type string
     *  @default class='btnEdit' set class in an item
     *  create form post example :
     * <form action="{{ route('') }}" id="formInsert" method="POST">
     *   @csrf @method('PUT')
     * </form>
     */ 
    $('.btnEdit').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Bạn Có Chắc Chắn?',
            text: "Bạn Không Thể Hoàn Tác Chức Năng!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, Thêm nó!',
            cancelButtonText: "Không, hủy nó!",
        }).then((result) => {
            if (result.isConfirmed) {
                $('form#formEdit').submit();
                Swal.fire(
                    'Đang Cập Nhật!',
                    'Dữ Liệu Đang Được Cập Nhật.',
                    'success'
                );
            }
        });
    });
    
    
    /**
     * Setup delete an element
     *  @type string
     *  @default class='btnDelete' set class in an item
     *  create form post in before close <boby></boby> example :
     * <form action="" method="post" id="formAction">
     *   @csrf @method('DELETE')
     * </form>
     */ 
     $('#example2').on('click', '.btnDelete', function (e) {
        e.preventDefault();
        var _href = $(this).attr('href');
        $('form#formAction').attr('action', _href);
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn sẽ không thể hoàn tác lại!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, xóa nó!',
            cancelButtonText: "Không, hủy nó!",
        }).then((result) => {
            if (result.isConfirmed) {
                $('form#formAction').submit();
                Swal.fire(
                    'Đang xóa',
                    'Đã được xóa!',
                    'info'
                );
            };
        });
    });