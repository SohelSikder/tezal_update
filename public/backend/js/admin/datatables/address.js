(function($) {
    "use strict";
    $(document).ready(function () {
        $('#addressTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'address_type',
                    name: 'address_type'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'area',
                    name: 'area'
                },
                // {
                //     data: 'orders',
                //     name: 'orders',
                //     orderable: false
                // },
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false
                // }
            ]
        });
    });
})(jQuery)
