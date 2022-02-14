<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">BDPhO National Event List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Registration</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bdPhOs as $bdPhO)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bdPhO->name }}</td>
                            <td>{{ $bdPhO->code }}</td>
                            <td class="text-center">
                                <a class="image-popup-no-margins" href="{{ asset($bdPhO->logo) }}">
                                    <img class="img-fluid" alt="Image" src="{{ asset($bdPhO->logo) }}" width="25">
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $bdPhO->status==1?'success':'warning' }} font-size-12">{{ $bdPhO->status==1?'Open':'Close' }} </span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $bdPhO->registration_status==1?'success':'warning' }} font-size-12">{{ $bdPhO->registration_status==1?'Open':'Close' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({
                                    name:'{{ $bdPhO->name }}',
                                    code:'{{ $bdPhO->code }}',
                                    status:'{{ $bdPhO->status }}',
                                    registration_status:'{{ $bdPhO->registration_status }}',
                                    logo:'{{ asset($bdPhO->logo) }}',
                                    id:'{{ $bdPhO->id }}'
                                })" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a title="Event {{ $bdPhO->status == 1 ? 'Close':'Open' }}" href="{{ route('update-bdpho-status',['id'=>$bdPhO->id]) }}" class="btn btn-{{ $bdPhO->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $bdPhO->status == 1 ? 'up':'down' }}"></i>
                                </a>

                                <a title="Registration {{ $bdPhO->registration_status == 1 ? 'Close':'Open' }}" href="{{ route('update-registration-status',['id'=>$bdPhO->id]) }}" class="btn btn-{{ $bdPhO->registration_status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $bdPhO->registration_status == 1 ? 'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('bdpho-delete',['id'=>$bdPhO->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
