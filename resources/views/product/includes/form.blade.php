<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Add Form</h4>

                <form action="{{ route('new-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row mb-4">
                                <label for="categoryId" class="col-sm-3 col-form-label">Category </label>
                                <div class="col-sm-9">
                                    <select name="category" class="form-control" id="categoryId" onchange="getSubCategoryInfo(this.value)">
                                        <option value="">--Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="subCategoryId" class="col-sm-3 col-form-label">Sub Category </label>
                                <div class="col-sm-9">
                                    <select name="sub_category" class="form-control" id="subCategoryId">
                                        <option value="">--Select Sub Category--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="brandId" class="col-sm-3 col-form-label">Brand </label>
                                <div class="col-sm-9">
                                    <select name="brand" class="form-control" id="brandId">
                                        <option value="">--Select Brand--</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="color" class="col-sm-3 col-form-label">Color </label>
                                <div class="col-sm-9">
                                    <select name="color[]" class="select2 form-control select2-multiple" multiple="multiple" id="color" data-placeholder="Choose. . . . .">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="size" class="col-sm-3 col-form-label">Size </label>
                                <div class="col-sm-9">
                                    <select name="size[]" class="select2 form-control select2-multiple" multiple="multiple" id="size" data-placeholder="Choose. . . . .">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="code" class="col-sm-3 col-form-label">Product Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control" id="code">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row mb-4">
                                <label for="mainPrice" class="col-sm-3 col-form-label">Main Price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="main_price" id="mainPrice" class="form-control" min="0" step="0.01">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="discountPrice" class="col-sm-3 col-form-label">Discount Price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="discount_price" id="discountPrice" class="form-control" min="0" step="0.01">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="image" class="col-sm-3 col-form-label">Main Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="subImage" class="col-sm-3 col-form-label">Sub Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="sub_image[]" multiple="multiple" class="form-control" id="subImage">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="shortDescription" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" class="form-control" id="shortDescription" rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio custom-radio-success mb-2">
                                        <input type="radio" id="published" name="status" class="custom-control-input" checked value="1"/>
                                        <label class="custom-control-label" for="published">Published</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-radio-warning">
                                        <input type="radio" id="unpublished" name="status" class="custom-control-input" value="0"/>
                                        <label class="custom-control-label" for="unpublished">Unpublished</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-12">
                            <textarea name="long_description" class="summernote" id="longDescription"></textarea>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-12">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary w-md">Create New Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
