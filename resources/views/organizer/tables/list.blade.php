<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Organizer List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th class="">Description</th>
                            <th class="">Photo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($organizers as $organizer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $organizer->name }}</td>
                            <td>{{ $organizer->title }}</td>
                            <td>{{ $organizer->description }}</td>
                            <td>
                                <a class="image-popup-no-margins" href="{{ asset($organizer->photo) }}">
                                    <img class="img-fluid" alt="Image" src="{{ asset($organizer->photo) }}" width="25">
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $organizer->status==1?'success':'warning' }} font-size-12">{{ $organizer->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $organizer }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-organizer-status',['id'=>$organizer->id]) }}" class="btn btn-{{ $organizer->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $organizer->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('organizer-delete',['id'=>$organizer->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
