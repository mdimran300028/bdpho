@extends('master')
@section('title') Product @endsection
@section('page-title') Manage Product @endsection
@section('breadcrumb-item') Setting Module @endsection
@section('active-breadcrumb-item') Manage Product @endsection

@section('content')
    @include('product.includes.table')
@endsection

@section('modal-content')
    @include('product.includes.product-details-modal')
@endsection

@section('custom-script')
    <script>
        $('#datatable').DataTable();
        function productDetails(obj) {
            var product = obj[0], category = obj[1], subCategory = obj[2],brand = obj[3], colors = obj[4], sizes = obj[5], subImages = obj[6], rootPath = '{{ route('/') }}/';
            var pillsTab = $("#v-pills-tab"), pillsTabTHML = '';
            var pillsTabContent = $("#v-pills-tabContent"), pillsTabContentTHML = '';
            var productColor = $("#productColor"), productColorContent = '';
            var activeClass = '', allColors = '', allSizes = '';
            var productSpecificationBody = $("#productSpecificationBody");

            $(".product-name").html(product.name);

            $.each(subImages, function (key, value) {
                if (key==0){activeClass = 'active';}else{activeClass = '';}

                pillsTabTHML += '<a class="nav-link '+activeClass+'" ' +
                    'id="product-'+key+'-tab" data-toggle="pill" ' +
                    'href="#product-'+key+'" role="tab" aria-controls="product-'+key+'" ' +
                    'aria-selected="true"><img src="'+rootPath+value.image+'" ' +
                    'alt="" class="img-fluid mx-auto d-block rounded"><a>';
            });
            pillsTab.empty().append(pillsTabTHML);

            $.each(subImages, function (key, value) {
                if (key==0){activeClass = 'active';}else{activeClass = '';}
                pillsTabContentTHML += '<div class="tab-pane fade show '+activeClass+'" id="product-'+key+'" ' +
                    'role="tabpanel" aria-labelledby="product-'+key+'-tab"><div><img ' +
                    'src="'+rootPath+value.image+'" alt="" class="img-fluid mx-auto d-block"></div></div>';
            });
            pillsTabContent.empty().append(pillsTabContentTHML);

            $("#regularPrice").empty().text('Tk. '+product.main_price);
            $("#offerPrice").empty().text('Tk. '+product.discount_price);
            $("#shortDescription").empty().html(product.short_description);
            $(".category").empty().html(category.name);

            $.each(colors, function (key, value) {
                if (key==0){activeClass = 'active';}else{activeClass = '';}
                productColorContent += '<a href="#" class="'+activeClass+'">' +
                    '<div class="product-color-item border rounded">' +
                    '<img src="'+rootPath+product.image+'" alt="" class="avatar-md">' +
                    '</div><p>'+value.name+'</p></a>';

                if(key<colors.length-1){
                    allColors += value.name + ', ';
                }else{
                    allColors += value.name;
                }
            });
            productColor.empty().append(productColorContent);

            $.each(sizes, function (key, value) {
                if(key<sizes.length-1){
                    allSizes += value.name + ', ';
                }else{
                    allSizes += value.name;
                }
            });

            var specification = '';
            specification += '<tr><th scope="row" style="width: 400px;">Category</th><td>'+category.name+'</td></tr>';
            specification += '<tr><th scope="row" style="">Brand</th><td>'+brand.name+'</td></tr>';
            specification += '<tr><th scope="row" style="">Colors</th><td>'+allColors+'</td></tr>';
            specification += '<tr><th scope="row" style="">Sizes</th><td>'+allSizes+'</td></tr>';
            productSpecificationBody.empty().append(specification);

            $("#myModal").modal('show');
        }
    </script>
@endsection
