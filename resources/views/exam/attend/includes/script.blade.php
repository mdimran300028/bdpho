
<script>
    function edit(obj) {
        $("#edit form input[name=name]").val(obj.name);
        $("#edit form input[name=code]").val(obj.code);
        $("#edit form input[name=id]").val(obj.id);
        if (obj.status==1){
            $("#edit form input:radio[name=status][value='1']").attr('checked',true);
        }else {
            $("#edit form input:radio[name=status][value='2']").attr('checked',true);
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

    function examList() {
      let categoryId = $("#form select[name=category_id]").val();
      if (categoryId){
        $('.loader').show();
        $.get("{{ route('exam-list') }}",{
          category_id:categoryId
        },function (response) {
          console.log(response);
          $("#form select[name=question_paper_id]").empty().html(response);
          $('.loader').hide();
        })
      }
    }

    function getParticipantList() {
      let categoryId = $("select[name=category_id]").val();
      let obj = {category_id:categoryId,
        question_paper_id : $("#form select[name=question_paper_id]").val(),
        _token:'{{ csrf_token() }}'};
      if (categoryId){
        $('.loader').show();
        $.ajax({
          type : 'POST',
          url  : '{{ route('category-wise-exam-participant') }}',
          data : obj,
          success: function (response) {
            $("#ajaxResult").empty().append(response);
            $('.loader').hide();
          }
        });
      }else {
        swal('Warning','Select category correctly.','info');
      }
    }
</script>
