<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>Total: Participant Selected : {{ $total }}</h3>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Reg. No.</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>District</th>
                            <th>Mark</th>
{{--                            <th>Mobile</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($participants as $participant)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $participant->participantInfo->reg_no }}</td>
                                <td>{{ $participant->participantInfo->name }}</td>
                                <td>{{ $participant->participantInfo->school }}</td>
                                <td>{{ $participant->participantInfo->district->name }}</td>
                                <td>{{ $participant->obtain_mark }}</td>
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
