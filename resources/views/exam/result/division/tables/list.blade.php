<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>Total: Participant in the exam : {{ $total }}</h3>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Reg. No.</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Class</th>
                            <th>District</th>
                            <th>Mark</th>
                            <th>Mobile</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($participants as $participant)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $participant->reg_no }}</td>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->school }}</td>
                                <td>{{ $participant->class_name }}</td>
                                <td>{{ $participant->district }}</td>
                                <td>{{ $participant->mark }}</td>
                                <td>{{ $participant->mobile }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-secondary" target="_blank" href="{{ route('open-script',['id'=>$participant->id]) }}"><i class="fa fa-eye"></i> View</a>
                                    <button onclick="deleteScript({
                                        script_id:'{{ $participant->id }}',
                                        category_id:'{{ $data->category_id }}',
                                        question_paper_id:'{{ $data->question_paper_id }}'
                                    })" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
