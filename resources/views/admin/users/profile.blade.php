<x-admin-master>
    @section('content')
    <h1>User Profile for : {{$user->name}}</h1>
    <div class="row">
        <div class="col-sm-6">
        <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multiplart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <img height="100" width="100" src="{{$user->avatar}}" alt="">
        </div>
		
		<div class="row">
        <div class="col-sm-12">
        ROLES
</div>
    </div>

        <div class="form-group">
            <input type="file" name="avatar">
        </div>

        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}" placeholder="Enter Username">
            @error('username')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Enter Name">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control-file" id="email" value="{{$user->email}}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="email" class="form-control" id="password" value="{{$user->email}}">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">Password Confirm</label>
            <input type="password" name="password-confirm" class="form-control" id="password-confirm">
            @error('password-confirm')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
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
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </tfoot>

                  <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td><input type="checkbox"
                            @foreach($user->roles as $user_role)
                            @if($user_role->slug == $role->slug)
                            checked
                            @endif
                            @endforeach></input></td>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->slug}}</td>
                        <td>
                            <form action="{{route('user.role.attach', $user)}}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="role" value="{{$role->id}}">
                            
                        <button class="btn btn-primary" 
                        @if($user->roles->contains($role))
                        disabled
                        @endif
                        >Attach</button>

                        </form></td>
                        <td><form action="{{route('user.role.detach', $user)}}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="role" value="{{$role->id}}">
                            
                        <button class="btn btn-danger"
                        @if(!$user->roles->contains($role))
                        disabled
                        @endif
                        >Detach</button>

                        </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
</div>
</div>

    @endsection
</x-admin-master>