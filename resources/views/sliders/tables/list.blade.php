<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Slider List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th class="">Description</th>
                            <th class="">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td><img style="height: 30px; width: auto" src="{{ asset($slider->file) }}" alt="Slide"></td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $slider->status==1?'success':'warning' }} font-size-12">{{ $slider->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $slider }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-slider-status',['id'=>$slider->id]) }}" class="btn btn-{{ $slider->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $slider->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('slider-delete',['id'=>$slider->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
