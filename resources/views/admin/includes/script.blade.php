<script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendor/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/js/admin/summernote-init.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/custom/data-table-page.js') }}"></script>
<script src="{{ asset('backend/vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/js/image-preview.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<script src="{{ asset('admin/js/summernote-lite.min.js') }}"></script>
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
$('.show_confirm').click(function(event) {
     var form =  $(this).closest("form");
     var name = $(this).data("name");
     event.preventDefault();
     Swal.fire({
         title: `Are you sure you want to delete this record?`,
         text: "If you delete this, it will be gone forever.",
         icon: "warning",
         showCancelButton: true, // Add this line to show the Cancel button
         confirmButtonText: "Delete", // You can customize the button text
         cancelButtonText: "Cancel", // Customize the Cancel button text
         dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete.isConfirmed) {
         form.submit();
       }
     });
 });
</script>


@stack('post_scripts')
