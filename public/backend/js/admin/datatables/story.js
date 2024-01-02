(function($) {
    "use strict";
    $(document).ready(function () {
        $('#StoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'video',
                    name: 'video'
                },
               
                {
                    data: 'Status',
                    name: 'Status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]

            // columns: [
            //     {
            //         data: 'Category_Name',
            //         name: 'Category_Name'
            //     },
            //     {
            //         data: 'Category_Slug',
            //         name: 'Category_Slug'
            //     },
            //     {
            //         data: 'Description',
            //         name: 'Description'
            //     },
            //     {
            //         data: 'Category_Icon',
            //         name: 'Category_Icon'
            //     },
            //     {
            //         data: 'Status',
            //         name: 'Status'
            //     },
            //     {
            //         data: 'action',
            //         name: 'action',
            //         orderable: false
            //     }
            // ]
        });
    });
})(jQuery)
