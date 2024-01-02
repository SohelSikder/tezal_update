(function($) {
    "use strict";
    $(document).ready(function () {
        $('#ProductColorTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'Name',
                    name: 'Name'
                },
                {
                    data: 'ColorCode',
                    name: 'ColorCode'
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
