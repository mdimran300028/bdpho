<script>
  $("select[name=type]").change(function () {
    let type = $(this).val();
    if (type=='image'){
      $(".image").show();
      $(".video").hide();
    }else if (type=='video') {
      $(".image").hide();
      $(".video").show();
    }else {
      $(".video").hide();
    }
  })

    function edit(obj) {
        $("#edit form input[name=title]").val(obj.title);
        $("#edit form input[name=description]").val(obj.description);
        $("#edit form select[name=type]").val(obj.type);
        if (obj.type=='video'){
          $("#edit .video input[name=source]").val(obj.source);
          $(".image").hide();
          $(".video").show();
        }else {
          $(".image").show();
          $(".video").hide();
        }
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
