<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">BDPhO Syllabus List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Category</th>
                            <th class="">Classes</th>
                            <th class="">File</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($syllabuses as $syllabus)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $syllabus->category->name }}</td>
                            <td>
                                @foreach($syllabus->category->classes as $class)
                                    {{ $class->name }} {{ count($syllabus->category->classes) == $loop->iteration ? ' ':', ' }}
                                @endforeach
                            </td>
                            <td>
                                <a target="_blank" href="{{ asset($syllabus->file_url) }}">Open File</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $syllabus->status==1?'success':'warning' }} font-size-12">{{ $syllabus->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $syllabus }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-syllabus-status',['id'=>$syllabus->id]) }}" class="btn btn-{{ $syllabus->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $syllabus->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('syllabus-delete',['id'=>$syllabus->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
