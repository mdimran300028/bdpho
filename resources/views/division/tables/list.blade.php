<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">BDPhO Division List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($divisions as $division)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $division->name }}</td>
                            <td>{{ $division->code }}</td>
                            <td>
                                <span class="badge badge-pill badge-soft-{{ $division->status==1?'success':'warning' }} font-size-12">{{ $division->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({
                                    name:'{{ $division->name }}',
                                    code:'{{ $division->code }}',
                                    status:'{{ $division->status }}',
                                    id:'{{ $division->id }}'
                                })" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-division-status',['id'=>$division->id]) }}" class="btn btn-{{ $division->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-up"></i>
                                </a>

                                <a href="{{ route('division-delete',['id'=>$division->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
