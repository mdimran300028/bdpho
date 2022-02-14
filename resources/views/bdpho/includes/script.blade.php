<script>
    function edit(obj) {
        $("#edit form input[name=name]").val(obj.name);
        $("#edit form input[name=code]").val(obj.code);
        $("#edit form input[name=id]").val(obj.id);
        $("#edit form img.logo").attr('src',obj.logo);
        if (obj.status==1){
            $("#edit form input:radio[name=status][value='1']").attr('checked',true);
        }else {
            $("#edit form input:radio[name=status][value='2']").attr('checked',true);
        }

        if (obj.registration_status==1){
            $("#edit form input:radio[name=registration_status][value='1']").attr('checked',true);
        }else {
            $("#edit form input:radio[name=registration_status][value='2']").attr('checked',true);
        }
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
