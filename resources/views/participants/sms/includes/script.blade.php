<script>
    function getParticipantList() {
      let divisionId = $("select[name=division_id]").val();
      let categoryId = $("select[name=category_id]").val();
      if (divisionId && categoryId){
        $.get("{{ route('division-wise-sms-form') }}",{
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

    function getDistrictWiseParticipantList() {
      let districtId = $("select[name=district_id]").val();
      let categoryId = $("select[name=category_id]").val();
      if (districtId && categoryId){
        $.get("{{ route('district-wise-sms-form') }}",{
          district_id:districtId,
          category_id:categoryId
        },function (response) {
          $("#ajaxResult").empty().append(response);
          $("#datatable-buttons").DataTable({
            lengthChange:!1,
            buttons:["copy","excel","pdf","colvis"]
          }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
          console.log(response);
        });
      }else {
        swal('Warning','Select all fields correctly.','info');
      }
    }
</script>
