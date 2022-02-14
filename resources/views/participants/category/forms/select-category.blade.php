<form action="{{ route('category-wise-participant') }}" method="POST">
<div class="row">

        @csrf
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control select2" name="category_id">
                    <option value="">Select Category </option>
                    @foreach(categories() as $category)
                        <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                    <option value="all">{{ 'All Category' }}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col">
{{--                    <button type="submit" class="btn btn-block btn-primary">Get List</button>--}}
                    <button type="button" onclick="getParticipantList()" class="btn btn-block btn-primary">Get List</button>
                </div>
                {{--            <div class="col-md-6">--}}
                {{--                <button type="button" class="btn btn-block btn-success">Download List</button>--}}
                {{--            </div>--}}
            </div>
        </div>
</div>
</form>
