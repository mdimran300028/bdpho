<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Past Paper List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Event</th>
                            <th class="">Round</th>
                            <th class="">Category</th>
                            <th class="">Description</th>
                            <th class="">Link</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($papers as $paper)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paper->event->code }}</td>
                            <td>{{ $paper->round_id != 999? $paper->round->name : 'All Round' }}</td>
                            <td>{{ $paper->round_id != 999? $paper->category->name : 'All Category' }}</td>
                            <td>{{ $paper->title }}</td>
                            <td>
                                <a target="_blank" href="{{ asset($paper->file_url) }}">Open File</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $paper->status==1?'success':'warning' }} font-size-12">{{ $paper->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button onclick="edit({{ $paper }})" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-past-paper-status',['id'=>$paper->id]) }}" class="btn btn-{{ $paper->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $paper->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('past-paper-delete',['id'=>$paper->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
