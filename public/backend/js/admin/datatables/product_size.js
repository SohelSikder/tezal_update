(function($) {
    "use strict";
    $(document).ready(function () {
        $('#ProductSizeTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'Size',
                    name: 'Size'
                },
                {
                    data: 'product',
                    name: 'product'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    });
})(jQuery)
