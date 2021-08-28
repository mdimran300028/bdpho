<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Edit Form</h4>

                <form action="{{ route('product-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row mb-4">
                                <label for="categoryId" class="col-sm-3 col-form-label">Category </label>
                                <div class="col-sm-9">
                                    <select name="category" class="form-control" id="categoryId" onchange="getSubCategoryInfo(this.value)">
                                        <option value="">--Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->id == $product->category_id? 'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="subCategoryId" class="col-sm-3 col-form-label">Sub Category </label>
                                <div class="col-sm-9">
                                    <select name="sub_category" class="form-control" id="subCategoryId">
                                        <option value="">--Select Sub Category--</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ $subCategory->id == $product->sub_category_id? 'selected':'' }}>{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="brandId" class="col-sm-3 col-form-label">Brand </label>
                                <div class="col-sm-9">
                                    <select name="brand" class="form-control" id="brandId">
                                        <option value="">--Select Brand--</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id? 'selected':'' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="unit" class="col-sm-3 col-form-label">Unit </label>
                                <div class="col-sm-9">
                                    <select name="unit" class="form-control" id="unit">
                                        <option value="">--Select Unit--</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id? 'selected':'' }}>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="color" class="col-sm-3 col-form-label">Color </label>
                                <div class="col-sm-9">
                                    <select name="color[]" class="select2 form-control select2-multiple" multiple="multiple" id="color" data-placeholder="Choose. . . . .">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" @foreach($product->colors as $productColor) {{ $color->id==$productColor->id? 'selected':'' }} @endforeach>{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="size" class="col-sm-3 col-form-label">Size </label>
                                <div class="col-sm-9">
                                    <select name="size[]" class="select2 form-control select2-multiple" multiple="multiple" id="size" data-placeholder="Choose. . . . .">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" @foreach($product->sizes as $productSize) {{ $size->id==$productSize->id? 'selected':'' }} @endforeach>{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="code" class="col-sm-3 col-form-label">Product Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control" id="code" value="{{ $product->code }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row mb-4">
                                <label for="mainPrice" class="col-sm-3 col-form-label">Main Price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="main_price" id="mainPrice" value="{{ $product->main_price }}" class="form-control" min="0" step="0.01">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="discountPrice" class="col-sm-3 col-form-label">Discount Price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="discount_price" id="discountPrice" value="{{ $product->discount_price }}" class="form-control" min="0" step="0.01">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="image" class="col-sm-3 col-form-label">Main Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="image">
                                    <img src="{{ asset($product->image) }}" class="img-thumbnail" alt="">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="subImage" class="col-sm-3 col-form-label">Sub Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="sub_image[]" multiple="multiple" class="form-control" id="subImage">
                                    <div class="row m-0">
                                        @foreach($subImages as $subImage)
                                        <div class="col p-0">
                                            <span class=""><input type="checkbox" checked name="old_sub_image[{{ $subImage->id }}]" style="position: absolute"/></span>
                                            <img src="{{ asset($subImage->image) }}" class="img-thumbnail" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="shortDescription" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" class="form-control" id="shortDescription" rows="7">{{ $product->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio custom-radio-success mb-2">
                                        <input type="radio" id="published" name="status" class="custom-control-input" {{ $product->status==1? 'checked':'' }}  value="1"/>
                                        <label class="custom-control-label" for="published">Published</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-radio-warning">
                                        <input type="radio" id="unpublished" name="status" class="custom-control-input" {{ $product->status==0? 'checked':'' }} value="0"/>
                                        <label class="custom-control-label" for="unpublished">Unpublished</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-12">
                            <textarea name="long_description" class="summernote" id="longDescription">{{ $product->long_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-12">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary w-md">Update Product Info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
