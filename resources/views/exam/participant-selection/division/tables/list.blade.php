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
{{--                            <th>Name</th>--}}
{{--                            <th>School</th>--}}
{{--                            <th>District</th>--}}
                            <th>Mark</th>
{{--                            <th>Mobile</th>--}}
                            <th class="text-center"><input type="checkbox" id="all"> All</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($participants as $participant)
                            <tr>
                                <td>{{ $i++ }}</td>
{{--                                <td>{{ $participant->reg_no }}</td>--}}
                                <td>{{ $participant['info']->participant->reg_no }}</td>
                                <td>{{ $participant['mark'] }}</td>
                                <td class="text-center">
                                    <input type="checkbox" class="check" name="participants[{{ $participant['info']->student_id }}]" value="{{ $participant['mark'] }}"/>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <button class="btn btn-sm btn-block btn-success">Submit</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

{{--<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>--}}
<script>
  $("#all").change(function () {
    if ($(this).prop('checked')){
      $('.check').prop('checked',true);
    }else {
      $('.check').prop('checked',false);
    }
  });
</script>
