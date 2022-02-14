<script>
    function edit(obj) {
        $("#edit form select[name=event_id]").val(obj.event_id);
        $("#edit form select[name=round_id]").val(obj.round_id);
        $("#edit form select[name=category_id]").val(obj.category_id);
        $("#edit form select[name=question_type]").val(obj.question_type);
        $("#edit form input[name=title]").val(obj.title);
        $("#edit form input[name=mark]").val(obj.mark);
        $("#edit form input[name=exam_start_time]").val(obj.exam_start_time);
        $("#edit form input[name=exam_end_time]").val(obj.exam_end_time);
        $("#edit form input[name=duration]").val(obj.duration);
        $("#edit form input[name=remind_time]").val(obj.remind_time);
        $("#edit form input[name=remind_message]").val(obj.remind_message);
        $("#edit form input[name=id]").val(obj.id);
        if (obj.status==1){$("#edit form input:radio[name=status][value='1']").attr('checked',true);}
        else {$("#edit form input:radio[name=status][value='2']").attr('checked',true);}
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
