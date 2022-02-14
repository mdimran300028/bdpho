<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Role Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.roles.update',['role'=>' ']) }}" id="editForm" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="nameEdit" class="col-md-2 col-sm-3 col-form-label text-center">Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="nameEdit">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="name" class="col-md-2 col-sm-4 text-right">Permissions </label>
                        <div class="col-md-10 col-sm-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox custom-checkbox-success mb-3">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="permissionAllEdit">
                                        <label class="custom-control-label" for="permissionAllEdit">All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($permissionGroups as $permissionGroup)
                        <div class="form-group row mb-0">
                            <label for="permissionAllEdit{{ $permissionGroup[0]->group_name }}" class="col-md-2 col-sm-4 text-right text-capitalize">{{ $permissionGroup[0]->group_name }}</label>
                            <div class="col-md-10 col-sm-8">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox custom-checkbox-success mb-3">
                                            <input type="checkbox" name="permissions[]" class="custom-control-input" id="permissionAllEdit{{ $permissionGroup[0]->group_name }}">
                                            <label class="custom-control-label text-capitalize" for="permissionAllEdit{{ $permissionGroup[0]->group_name }}"> All </label>
                                        </div>
                                    </div>

                                    @foreach(permissions($permissionGroup[0]->group_name) as $permission)
                                        <div class="col-md-6 col-12">
                                            <div class="custom-control custom-checkbox custom-checkbox-primary mb-3">
                                                <input type="checkbox" name="permissions[]" class="custom-control-input {{ $permissionGroup[0]->group_name }}" id="permissionEdit{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="custom-control-label" for="permissionEdit{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <input type="hidden" name="id"/>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="d-none">reset</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    <button type="button" class="btn btn-sm btn-dark escape" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->


