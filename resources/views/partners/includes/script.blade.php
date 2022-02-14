<script>
    function edit(obj) {
        $("#edit form input[name=name]").val(obj.name);
        $("#edit form input[name=title]").val(obj.title);
        $("#edit form input[name=short_description]").val(obj.short_description);
        $("#edit form textarea[name=long_description]").val(obj.long_description);
        $("#edit form input[name=id]").val(obj.id);
        $("#edit").modal('show');
    }

    function del() {
        swal({
            title: "Are you sure ?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
                if (willDelete) {
                    swal("Your file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your file is safe!", {
                        icon: "success",
                    });
                }
        });
    }
</script>