<div class="row">
    <div class="col-md col-sm-12">
        <div class="form-group">
            <select class="form-control select2" name="round_id">
                <option value="">Select Round </option>
                @foreach(rounds() as $round)
                    <option value="{{ $round->id }}">{{ $round->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md col-sm-12">
        <div class="form-group">
            <select class="form-control select2" name="division_id">
                <option value="">Select Division </option>
                @foreach(divisions() as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
                <option value="all">All Division</option>
            </select>
        </div>
    </div>

    <div class="col-md col-sm-12">
        <div class="form-group">
            <select class="form-control select2" name="category_id">
                <option value="">Select Category </option>
                @foreach(categories() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md col-sm-12">
        <div class="row">
            <div class="col">
                <button type="button" onclick="getParticipantList()" class="btn btn-block btn-primary">Get List</button>
            </div>
        </div>
    </div>

    <div class="col-md col-sm-12">
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-block btn-success"><i class="fa fa-download"></i> Download Result</button>
            </div>
        </div>
    </div>
</div>
