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

    function getParticipantList() {
      let districtId = $("select[name=district_id]").val();
      let categoryId = $("select[name=category_id]").val();
      if (districtId && categoryId){
        $('.loader').show();
        $.get("{{ route('district-and-category-wise-participant') }}",{
          district_id:districtId,
          category_id:categoryId
        },function (response) {
          $('.loader').hide();
          $("#ajaxResult").empty().append(response);
          console.log(response);
        });
      }else {
        swal('Warning','Select all fields correctly.','info');
      }
    }
</script>
