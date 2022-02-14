<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>Total: Participant in the exam : {{ $total }}</h3>
{{--                <div class="table-responsive">--}}
{{--                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Sl.</th>--}}
{{--                            <th>Reg. No.</th>--}}
{{--                            <th>Login Status</th>--}}
{{--                            <th>Browser</th>--}}
{{--                            <th class="text-center">Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @php($i=1)--}}
{{--                        @foreach($participants as $participant)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $i++ }}</td>--}}
{{--                                <td>{{ $participant->reg_no }}</td>--}}
{{--                                <td>--}}
{{--                                    <span class="badge badge-pill badge-soft-{{ $participant->login_status == 1? 'success':'warning' }} font-size-12">{{ $participant->login_status == 1 ? 'Logged In':'Not Logged In' }}</span>--}}
{{--                                </td>--}}
{{--                                <td>{{ $participant->browser_name }}</td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <button onclick="deleteScript({--}}
{{--                                        script_id:'{{ $participant->id }}',--}}
{{--                                        category_id:'{{ $data->category_id }}',--}}
{{--                                        question_paper_id:'{{ $data->question_paper_id }}'--}}
{{--                                    })" class="btn btn-sm btn-danger">--}}
{{--                                        <i class="fa fa-trash-alt"></i> Delete--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>

{{--<script>--}}
{{--  function deleteScript(obj) {--}}
{{--    let msg = 'If you want to delete this item press OK';--}}
{{--    if(confirm(msg)){--}}
{{--      $('.loader').show();--}}
{{--      $.get("{{ route('delete-answer-script') }}",obj,function (response) {--}}
{{--        $("#ajaxResult").empty().append(response);--}}
{{--        $('.loader').hide();--}}
{{--      });--}}
{{--    }--}}
{{--  }--}}
{{--</script>--}}
