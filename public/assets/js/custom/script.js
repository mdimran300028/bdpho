//Sweet alert confirmation alert
function confirmationAlert(e){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            e.closest('form').submit();
        } else {
            swal("Don't Worry!","Your data is safe now","success");
        }
    });
};
