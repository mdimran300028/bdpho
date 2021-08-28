<script>
    //Sub Category Info
    function getSubCategoryInfo(categoryId) {
        $.ajax({
            type:'GET',
            url:"{{ url('get-sub-category-by-category-id') }}",
            data:{category_id:categoryId},
            dataType: 'json',
            success: function (res) {
                var selectElement = $("#subCategoryId");
                var option = '<option value="">--Select Sub Category--</option>';
                $.each(res, function (key, value) {
                    option += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                selectElement.empty().append(option);
            },
            error: function (err) {

            }
        });
        // swal('Category ID',categoryId,'success');
    }
</script>
