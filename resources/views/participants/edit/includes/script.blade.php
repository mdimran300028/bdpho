<script>
    function getParticipantList() {
      let divisionId = $("select[name=division_id]").val();
      let categoryId = $("select[name=category_id]").val();
      if (divisionId && categoryId){
        $.get("{{ route('participant-reg-no-edit-form') }}",{
          division_id:divisionId,
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
