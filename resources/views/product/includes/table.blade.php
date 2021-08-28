<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">All Product Info Goes Here</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th class="text-center">Sl.</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Colors</th>
                        <th>Sizes</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>@foreach($product->colors as $color) {{ $color->name }} @endforeach</td>
                        <td>@foreach($product->sizes as $size) {{ $size->name }} @endforeach</td>
                        <td class="text-center">
                            <a class="image-popup-no-margins" href="{{ asset($product->image) }}">
                                <img class="img-fluid" alt="Image" src="{{ asset($product->image) }}" width="50">
                            </a>
                        </td>
                        <td class="text-center">
                            <span class="badge badge-soft-{{ $product->status==1?'success':'warning' }} font-size-12">{{ $product->status==1?'Published':'Unpublished' }}</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-dark" onclick="productDetails([
                            {{ json_encode($product) }},
                            {{ json_encode($product->category) }},
                            {{ json_encode($product->subCategory) }},
                            {{ json_encode($product->brand) }},
                            {{ json_encode($product->colors) }},
                            {{ json_encode($product->sizes) }},
                            {{ json_encode($product->subImages) }}])"><i class="fas fa-eye"></i></button>
                            @if($product->status==1)
                                <a href="{{ route('product-status-update',['id'=>$product->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-arrow-up"></i></a>
                            @else
                                <a href="{{ route('product-status-update',['id'=>$product->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-arrow-down"></i></a>
                            @endif
                                <a href="{{ route('product-edit',['id'=>$product->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                <form class="d-inline" action="{{ route('product-delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}"/>
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); confirmationAlert(this)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
