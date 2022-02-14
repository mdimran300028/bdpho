<script>
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
      let divisionId = $("select[name=division_id]").val();
      let categoryId = $("select[name=category_id]").val();
      let obj = {category_id:categoryId, division_id:divisionId,
        question_paper_id : $("#form select[name=question_paper_id]").val(),
        _token:'{{ csrf_token() }}'};
      if (categoryId && divisionId){
        $('.loader').show();
        $.ajax({
          type : 'POST',
          url  : '{{ route('category-and-division-wise-result') }}',
          data : obj,
          success: function (response) {
            $('.loader').hide();
            // return console.log(response);
            $("#ajaxResult").empty().append(response);
          }
        });
      }else {
        swal('Warning','Select category correctly.','info');
      }
    }
</script>

<script>
  function deleteScript(obj) {
    let msg = 'If you want to delete this item press OK';
    if(confirm(msg)){
      $('.loader').show();
      $.get("{{ route('delete-answer-script') }}",obj,function (response) {
        $("#ajaxResult").empty().append(response);
        $('.loader').hide();
      });
    }
  }
</script>
