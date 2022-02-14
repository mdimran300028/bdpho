<script>
  function edit(obj) {
    $("#edit form input[name=name]").val(obj.name);
    $("#edit form input[name=email]").val(obj.email);
    $("#edit form select[name=role]").val(obj.role);
    $("#edit form input[name=id]").val(obj.id);
    $("#edit").modal('show');
  }

  function editAvatar(obj) {
    $("#editAvatar form input[name=name]").val(obj.name);
    $("#editAvatar form input[name=id]").val(obj.id);
    $("#editAvatar form #profile_photo").attr('src',obj.photo);
    $("#editAvatar").modal('show');
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

  //Image Show Before Upload Start
  $(document).ready(function(){
    $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      if (fileName){
        $('#fileLabel').html(fileName);
      }
    });
  });

  function showImage(data, imgId){
    if(data.files && data.files[0]){
      var obj = new FileReader();

      obj.onload = function(d){
        var image = document.getElementById(imgId);
        image.src = d.target.result;
      };
      obj.readAsDataURL(data.files[0]);
    }
  }
  //Image Show Before Upload End
</script>
