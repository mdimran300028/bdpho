<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">BDPhO Region List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Region Name</th>
                            <th>Region Code</th>
                            <th>Included District</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $region->name }}</td>
                            <td>{{ $region->code }}</td>
                            <td>
                                <script>let districtId = []</script>
                                @foreach($region->districts as $district)
                                    {{ $district->name }}{{ $loop->iteration==count($region->districts)? '':', ' }}
                                    <script> districtId[districtId.length] = Number({{ $district->id }}) </script>
                                @endforeach</td>
                            <td>
                                <span class="badge badge-pill badge-soft-{{ $region->status==1?'success':'warning' }} font-size-12">{{ $region->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({
                                    districtId:districtId,
                                    name:'{{ $region->name }}',
                                    code:'{{ $region->code }}',
                                    status:'{{ $region->status }}',
                                    id:'{{ $region->id }}'
                                    })" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-region-status',['id'=>$region->id]) }}" class="btn btn-{{ $region->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-up"></i>
                                </a>

                                <a href="{{ route('region-delete',['id'=>$region->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
                                    <i class="fa fa-trash-alt"></i>
                                </a>
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
