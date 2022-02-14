<script>
    function edit(obj) {
      // return console.log(obj);

        $("#edit form input[name=bn_title]").val(obj.bn_title);
        $("#edit form .note-editable").html(obj.bn_description).trigger('change');
        // $("#edit form input[name=en_title]").val(obj.en_title);
        // $("#edit form textarea[name=en_description]").val(obj.en_description);
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
