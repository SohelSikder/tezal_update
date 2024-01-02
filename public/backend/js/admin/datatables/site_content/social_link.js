(function($) {
    "use strict";
    $(document).ready(function () {
        $('#socialLink').DataTable({
            processing: true,
            serverSide: true,
            orderable: false,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'Facebook',
                    name: 'Facebook'
                },
                {
                    data: 'youtube',
                    name: 'youtube'
                },
                {
                    data: 'Skype',
                    name: 'Skype'
                },
                {
                    data: 'Twitter',
                    name: 'Twitter'
                },
                {
                    data: 'Linkedin',
                    name: 'Linkedin'
                },
                {
                    data: 'Instagram',
                    name: 'Instagram'
                },
                {
                    data: 'action',
                    name: 'action',
                }
            ]
        });
    });
})(jQuery)
