<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Uploaded File List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Details</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $file->title }}<br>
                                <a target="_blank" href="{{ asset($file->url) }}">{{ asset($file->url) }}</a>
                            </td>

                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $file->status==1?'success':'warning' }} font-size-12">{{ $file->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $file }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-file-status',['id'=>$file->id]) }}" class="btn btn-{{ $file->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $file->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('file-delete',['id'=>$file->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
