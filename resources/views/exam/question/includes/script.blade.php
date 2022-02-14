<script>
    function edit(obj) {
      $("#questionEdit form .note-editable").html(obj.description);
      $("#questionEdit form input[name=question_paper_id]").val(obj.question_paper_id);
      $("#questionEdit form input[name=id]").val(obj.id);
      $("#questionEdit").modal('show');
    }
</script>
