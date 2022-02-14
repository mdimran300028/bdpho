@extends('master')
@section('title') User role @endsection
@section('page-title') role Permission Edit: {{ $role->name }} @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') User role @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $role) }}" id="editForm" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label for="nameEdit" class="col-md-2 col-sm-3 col-form-label text-right">Name</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" name="name" class="form-control" id="nameEdit" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="name" class="col-md-2 col-sm-4 text-right">Permissions </label>
                            <div class="col-md-10 col-sm-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox custom-checkbox-success mb-3">
                                            <input type="checkbox" {{ count(allPermissions()) == count(allPermissions($role->id)) ? 'checked':'' }} class="custom-control-input" id="permissionAllEdit">
                                            <label class="custom-control-label" for="permissionAllEdit">All</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($permissionGroups as $permissionGroup)
                            @php($groupName = $permissionGroup[0]->group_name)
                            <div class="form-group row mb-0">
                                <label for="permissionAllEdit{{ $groupName }}" class="col-md-2 col-sm-4 text-right text-capitalize">{{ $groupName }}</label>
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox custom-checkbox-success mb-3">
                                                <input
                                                    type="checkbox" {{ count(permissions($groupName)) == count(permissions($groupName,$role->id)) ? 'checked':'' }}
                                                    class="custom-control-input"
                                                    id="permissionAllEdit{{ $groupName }}"
                                                />
                                                <label class="custom-control-label text-capitalize" for="permissionAllEdit{{ $groupName }}"> All </label>
                                            </div>
                                        </div>

                                        @foreach(permissions($groupName) as $permission)
                                            <div class="col-md-6 col-12">
                                                <div class="custom-control custom-checkbox custom-checkbox-primary mb-3">
                                                    <input
                                                        type="checkbox"
                                                        name="permissions[]" {{ $role->hasPermissionTo($permission->name)? 'checked':'' }}
                                                        class="custom-control-input {{ $groupName }}"
                                                        id="permissionEdit{{ $permission->id }}"
                                                        value="{{ $permission->name }}"
                                                        onclick="checkGroupPermissions({
                                                            groupPermissionCount:'{{ count(permissions($groupName)) }}',
                                                            totalPermissionCount:'{{ count(allPermissions()) }}',
                                                            permissions:JSON.parse('{{ permissions($groupName) }}'),
                                                            allPermissions:JSON.parse('{{ allPermissions() }}'),
                                                            groupName:'{{ $groupName }}'
                                                        })"
                                                    />
                                                    <label class="custom-control-label" for="permissionEdit{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row mb-0">
                            <div class="col-md-2 col-sm-4"></div>
                            <div class="col-md-10 col-sm-8">
                                <button type="submit" class="btn btn-success btn-block"> Permission Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    @include('users.role.includes.script')
@endsection
