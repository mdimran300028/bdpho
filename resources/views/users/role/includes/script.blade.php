<script>
  function edit(obj) {
    $("#edit form button[type=reset]").click();
    $("#edit form input[name=name]").val(obj.name);
    for (let i in obj.permissions){
      $("#permissionEdit"+obj.permissions[i].id).prop('checked',true);
    }
    $("#edit form input[name=id]").val(obj.id);
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

  $("#permissionAll").click(function () {
    if ($(this).prop('checked')===true){
      $("input[type=checkbox]").prop('checked',true);
    }else {
      $("input[type=checkbox]").prop('checked',false);
    }
  });

  $("#permissionAllEdit").click(function () {
    if ($(this).prop('checked')===true){
      $("input[type=checkbox]").prop('checked',true);
    }else {
      $("input[type=checkbox]").prop('checked',false);
    }
  });

    @foreach($permissionGroups as $permissionGroup)
    $("#permissionAll"+"{{ $permissionGroup[0]->group_name }}").click(function () {
      if ($(this).prop('checked')===true){
        $("."+"{{ $permissionGroup[0]->group_name }}").prop('checked',true);
      }else {
        $("."+"{{ $permissionGroup[0]->group_name }}").prop('checked',false);
      }
    });

    $("#permissionAllEdit"+"{{ $permissionGroup[0]->group_name }}").click(function () {
      if ($(this).prop('checked')===true){
        $("."+"{{ $permissionGroup[0]->group_name }}").prop('checked',true);
      }else {
        $("."+"{{ $permissionGroup[0]->group_name }}").prop('checked',false);
      }
    });
    @endforeach

    function checkGroupPermissions(obj) {
      let permissions = obj.permissions;
      let allPermissions = obj.allPermissions;
      let groupPermissionCount = 0;
      let totalPermissionCount = 0;
      for (let i in permissions){
        if (($("#permissionEdit"+permissions[i].id).prop('checked'))){groupPermissionCount++;}
      }
      if (obj.groupPermissionCount == groupPermissionCount){$("#permissionAllEdit"+obj.groupName).prop('checked',true);}
      else {$("#permissionAllEdit"+obj.groupName).prop('checked',false);}

      for (let j in allPermissions){
        if (($("#permissionEdit"+allPermissions[j].id).prop('checked'))){totalPermissionCount++;}
      }
      if (obj.totalPermissionCount == totalPermissionCount){$("#permissionAllEdit").prop('checked',true);}
      else {$("#permissionAllEdit").prop('checked',false);}
    }
</script>
