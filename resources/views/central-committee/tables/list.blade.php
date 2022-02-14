<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Central Committee <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New Member</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Title</th>
{{--                            <th>Institute</th>--}}
{{--                            <th>Department</th>--}}
{{--                            <th class="">Description</th>--}}
                            <th class="">Photo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->title }}</td>
{{--                            <td>{{ $member->institute }}</td>--}}
{{--                            <td>{{ $member->department }}</td>--}}
{{--                            <td>{{ $member->description }}</td>--}}
                            <td>
                                <a class="image-popup-no-margins" href="{{ asset($member->photo) }}">
                                    <img class="img-fluid" alt="Image" src="{{ asset($member->photo) }}" width="25">
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $member->status==1?'success':'warning' }} font-size-12">{{ $member->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $member }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-central-member-status',['id'=>$member->id]) }}" class="btn btn-{{ $member->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $member->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('central-member-delete',['id'=>$member->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
