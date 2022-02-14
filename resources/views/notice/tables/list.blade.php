<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">BDPhO Notice List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Tile</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notices as $notice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="bf-1">
                                {{ $notice->en_title }} <br>
                                {{ $notice->bn_title }}
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $notice->status==1?'success':'warning' }} font-size-12">{{ $notice->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $notice }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-notice-status',['id'=>$notice->id]) }}" class="btn btn-{{ $notice->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $notice->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('notice-delete',['id'=>$notice->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
