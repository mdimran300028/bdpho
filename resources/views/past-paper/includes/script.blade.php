<script>
    function edit(obj) {
        $("#edit form select[name=event_id]").val(obj.event_id);
        $("#edit form select[name=round_id]").val(obj.round_id);
        $("#edit form select[name=category_id]").val(obj.category_id);
        $("#edit form input[name=title]").val(obj.title);
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
