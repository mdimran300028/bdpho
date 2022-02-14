<script>
    function optionAdd(obj) {
      $("#addOption form input[name=question_id]").val(obj.questionId);
      $("#addOption").modal('show');
    }

    function optionEdit(obj) {
      let option = JSON.parse(obj.option);
      $("#optionEdit form .note-editable").html(option.content);
      $("#optionEdit form input[name=question_id]").val(option.question_id);
      $("#optionEdit form input[name=id]").val(option.id);
      if (obj.answerId !== null && obj.answerId == option.id){
        $("#optionEdit form input[name=is_answer]").prop('checked',true);
      }else {
        $("#optionEdit form input[name=is_answer]").prop('checked',false);
      }
      $("#optionEdit").modal('show');
    }
</script>
