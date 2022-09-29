<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function eliminar(target) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    }
</script>