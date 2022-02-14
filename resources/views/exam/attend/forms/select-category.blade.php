<form action="{{ route('category-wise-participant') }}" id="form" method="POST">
<div class="row">

        @csrf
        <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control select2" name="category_id" onchange="examList()">
                    <option value="">Select Category </option>
                    @foreach(categories() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
{{--                    <option value="all">{{ 'All Category' }}</option>--}}
                </select>
            </div>
        </div>

    <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control select2" name="question_paper_id">
                    <option value="">Select Exam </option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col">
{{--                    <button type="submit" class="btn btn-block btn-primary">Get List</button>--}}
                    <button type="button" onclick="getParticipantList()" class="btn btn-block btn-primary">Get Count</button>
                </div>
                {{--            <div class="col-md-6">--}}
                {{--                <button type="button" class="btn btn-block btn-success">Download List</button>--}}
                {{--            </div>--}}
            </div>
        </div>
</div>
</form>
