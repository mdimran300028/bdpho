<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} User Roles <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th class="text-center" style="width: 80px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
{{--                            <td>{{ $region->code }}</td>--}}
{{--                            <td>--}}
{{--                                <script>let districtId = []</script>--}}
{{--                                @foreach($region->districts as $district)--}}
{{--                                    {{ $district->name }}{{ $loop->iteration==count($region->districts)? '':', ' }}--}}
{{--                                    <script> districtId[districtId.length] = Number({{ $district->id }}) </script>--}}
{{--                                @endforeach</td>--}}
{{--                            <td>--}}
{{--                                <span class="badge badge-pill badge-soft-{{ $region->status==1?'success':'warning' }} font-size-12">{{ $region->status==1?'Active':'Inactive' }} </span>--}}
{{--                            </td>--}}
                            <td class="text-center">
                                <!-- Button trigger modal -->
{{--                                <button onclick="edit({--}}
{{--                                    name:'{{ $role->name }}',--}}
{{--                                    id:'{{ $role->id }}',--}}
{{--                                    permissions:JSON.parse('{{ $role->permissions }}')--}}
{{--                                    })" class="btn btn-info btn-sm waves-effect waves-light">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </button>--}}

                                <a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-info btn-sm waves-effect waves-light" >
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('admin.roles.destroy',$role->id) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
