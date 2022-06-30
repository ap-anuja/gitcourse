<x-admin-master>
    @section('content')
    @if(session('updated'))
    <div class="alert alert-primary">{{session('updated')}}</div>
    @endif
    <h1>EDIT ROLES : {{$role->name}}</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route('roles.update', $role->id)}}" enctype="multiplart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if($permissions->isNotEmpty())
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($permissions as $permissions)
                                <tr>
                                    <td><input type="checkbox" @foreach($role->permissions as $role_permission)
                                        @if($role_permission->slug == $permissions->slug)
                                        checked
                                        @endif
                                        @endforeach></input></td>
                                    <td>{{$permissions->id}}</td>
                                    <td>{{$permissions->name}}</a></td>
                                    <td>{{$permissions->slug}}</td>
                                    <td>{{$permissions->created_at}}</td>
                                    <td>{{$permissions->updated_at}}</td>
                                    <td>
                                        <form action="{{route('role.permission.attach', $role->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="permission" value="{{$permissions->id}}">

                                            <button class="btn btn-primary" @if($role->permissions->contains($permissions))
                                                disabled
                                                @endif
                                                >Attach</button>
                                        </form>
                                    </td>
                                    <td>
                                    <form action="{{route('role.permission.detach', $role->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="permission" value="{{$permissions->id}}">

                                            <button class="btn btn-danger" @if(!$role->permissions->contains($permissions))
                                                disabled
                                                @endif
                                                >Detach</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection
</x-admin-master>