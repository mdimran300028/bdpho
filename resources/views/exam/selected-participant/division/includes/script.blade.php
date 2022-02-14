<script>
    function getParticipantList() {
      let roundId = $("select[name=round_id]").val();
      let divisionId = $("select[name=division_id]").val();
      let categoryId = $("select[name=category_id]").val();
      let obj = {category_id:categoryId, division_id:divisionId, round_id:roundId,
        _token:'{{ csrf_token() }}'};
      if (categoryId && divisionId && roundId){
        $('.loader').show();
        $.ajax({
          type : 'POST',
          url  : '{{ route('selected-participant-list') }}',
          data : obj,
          success: function (response) {
            $('.loader').hide();
            // console.log(response);
            $("#ajaxResult").empty().append(response);
          }
        });
      }else {
        swal('Warning','Select category correctly.','info');
      }
    }
</script>
