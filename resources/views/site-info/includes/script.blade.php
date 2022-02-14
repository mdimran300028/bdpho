<script>
    function edit(obj) {
      $("#property").text(obj.property);
      let inputFields = '<input type="';
      inputFields += obj.type+'"';
      inputFields += 'class="form-control"';
      inputFields += 'name="value"';
      inputFields += 'value="'+obj.value+'"/>';
      inputFields += '<input type="hidden" name="id" value="'+obj.id+'"/>';
      $("#inputField").empty().append(inputFields);
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
        $.get("{{ route('district-and-category-wise-participant') }}",{
          district_id:districtId,
          category_id:categoryId
        },function (response) {
          $("#ajaxResult").empty().append(response);
          console.log(response);
        });
      }else {
        swal('Warning','Select all fields correctly.','info');
      }
    }
</script>
