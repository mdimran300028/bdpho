<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Gallery Items <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr class="">
                            <th colspan="6"><h5 class="text-primary">Gallery Images</h5></th>
                        </tr>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th class="">Description</th>
                            <th class="">Photo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $image->title }}</td>
                            <td>{{ $image->description }}</td>
                            <td>
                                <a class="image-popup-no-margins" href="{{ asset($image->source) }}">
                                    <img class="img-fluid" alt="Image" src="{{ asset($image->source) }}" width="25">
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $image->status==1?'success':'warning' }} font-size-12">{{ $image->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $image }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-gallery-status',['id'=>$image->id]) }}" class="btn btn-{{ $image->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $image->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('gallery-delete',['id'=>$image->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="6"><h5 class="text-primary">Gallery Videos</h5></th>
                        </tr>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th class="">Description</th>
                            <th class="">Thumbnail</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->description }}</td>
                                <td>
                                    <a class="image-popup-no-margins" href="{{ asset($video->thumbnail) }}">
                                        <img class="img-fluid" alt="Image" src="{{ asset($video->thumbnail) }}" width="25">
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-soft-{{ $video->status==1?'success':'warning' }} font-size-12">{{ $video->status==1?'Active':'Inactive' }} </span>
                                </td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <button onclick="edit({{ $video }})" class="btn btn-info btn-sm waves-effect waves-light">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <a href="{{ route('update-gallery-status',['id'=>$video->id]) }}" class="btn btn-{{ $video->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                        <i class="fa fa-arrow-{{ $video->status==1?'up':'down' }}"></i>
                                    </a>

                                    <a href="{{ route('gallery-delete',['id'=>$video->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
