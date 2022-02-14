<option value="">Select Exam </option>
@foreach($qps as $qp)
    <option value="{{ $qp->id }}">{{ $qp->title }}</option>
@endforeach
