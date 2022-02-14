<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
{{--                <h4 class="card-title mb-4">BDPhO Division List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>--}}
                <div class="table-responsive">
                    <table class="table table-centered table-hover table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>Reg. no.</th>
                            <th>Mobile</th>
                            <th class="text-center">All Select <input type="checkbox" id="all"/></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($participants->sortBy('reg_no') as $participant)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $participant->participant->name }}</td>
                            <td>{{ $participant->participant->className->name }}</td>
                            <td>{{ $participant->participant->gender }}</td>
                            <td>{{ $participant->reg_no }}</td>
                            <td>
                                <span class="badge badge-pill badge-soft-success font-size-12">{{ $participant->participant->mobile }}</span>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="check" name="participants[{{ $participant->participant->id }}]"/>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="7"><button type="submit" class="btn btn-sm btn-block btn-primary">Update</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<script>
    $("#all").change(function () {
      if ($(this).prop('checked')){
        $('.check').prop('checked',true);
      }else {
        $('.check').prop('checked',false);
      }
    })
</script>
