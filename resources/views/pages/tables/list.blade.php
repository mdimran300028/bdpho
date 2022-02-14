<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Page List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Tile</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $page->name }}</td>
                            <td class="bf-1">{{ $page->title }}</td>
                            <td class="text-center">
                                <span class="badge badge-pill badge-soft-{{ $page->status==1?'success':'warning' }} font-size-12">{{ $page->status==1?'Active':'Inactive' }} </span>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
{{--                                <button onclick="edit({{ $page }})" class="btn btn-info btn-sm waves-effect waves-light">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </button>--}}

                                <a href="{{ route('page-edit',['id'=>$page->id]) }}" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('update-page-status',['id'=>$page->id]) }}" class="btn btn-{{ $page->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $page->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('page-delete',['id'=>$page->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
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
