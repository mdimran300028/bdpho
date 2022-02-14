<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="division_id">
                <option value="">Select Division </option>
                @foreach(divisions() as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="category_id">
                <option value="">Select Old Category </option>
                @foreach(categories() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="new_category_id">
                <option value="">Select New Category </option>
                @foreach(categories() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <div class="col-md-12">
                <button type="button" onclick="getParticipantList()" class="btn btn-block btn-primary">Get List</button>
            </div>
        </div>
    </div>
</div>
