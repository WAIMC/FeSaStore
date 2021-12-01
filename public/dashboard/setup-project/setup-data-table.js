    /**
     * Setup data table language
     *  @type string
     *  @default Showing 0 to 0 of 0 entries
     *
     *  @dtopt Language
     *  @name DataTable.defaults.language.infoEmpty
     *
     */ 
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
            "decimal":        "",
            "emptyTable":     "không có dữ liệu hợp lệ trong bảng",
            "info":           "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty":      "Hiển thị 0 đến 0 của 0 mục",
            "infoFiltered":   "(Tìm kiếm tổng _MAX_ mục)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Hiển thị _MENU_ mục",
            "loadingRecords": "Đang tải...",
            "processing":     "Đang xử lý...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Bản ghi tìm kiếm không khớp",
            "paginate": {
                "first":      "Đầu",
                "last":       "Cuối",
                "next":       "Sau",
                "previous":   "Trước"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });