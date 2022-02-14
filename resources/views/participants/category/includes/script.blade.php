
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
      let categoryId = $("select[name=category_id]").val();
      let obj = {category_id:categoryId, _token:'{{ csrf_token() }}'};
      if (categoryId){
        $('.loader').show();
        $.ajax({
          type : 'POST',
          url  : '{{ route('category-wise-participant') }}',
          data : obj,
          success: function (response) {
            let table = '<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">';
            let thead = '<thead class="thead-light"> <tr> <th>Sl.</th> <th>Name</th> <th>Reg. No.</th> <th>Mobile</th> <th>Email</th><th class="text-center">Action</th> </tr> </thead>';
            let tbody = '<tbody>';
            for (let i in response){
              let participant = response[i];
              let tr ='<tr>' +
                '<td class="text-center">'+(Number(i)+1)+'</td>' +
                '<td>'+participant.name+'</td>' +
                '<td>'+participant.reg_no+'</td>' +
                '<td>'+participant.mobile+'</td>' +
                '<td>'+participant.email+'</td>' +
                '<td class="text-center"><a target="_blank" href="'+participant.edit_route+'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>' +
                '</tr>';
              tbody += tr;
            }
            tbody += '</tbody>';
            table += thead;
            table += tbody;
            table += '</table>';
            $("#ajaxResult").empty().append(table);
            $('.loader').hide();

            // $('#datatable-buttons').DataTable();
            $("#datatable-buttons").DataTable({
              lengthChange:!1,
              buttons:["copy","excel","pdf","colvis"]
            }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
          }
        });
      }else {
        swal('Warning','Select category correctly.','info');
      }
    }
</script>
