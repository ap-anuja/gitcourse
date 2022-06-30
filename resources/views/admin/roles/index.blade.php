<x-admin-master>
  @section('content')
  @if(session('deleted'))
  <div class="btn btn-danger">{{session('deleted')}}</div>
  @endif
  <div class="row">
    <div class="col-sm-3">
      <form action="{{route('roles.store')}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control">
          <div>
            @error('name')
            <span><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>
      </form>
    </div>
  </div>

  <div class="col-sm-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="rolesTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Delete</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($roles as $roles)
              <tr>
                <td>{{$roles->id}}</td>
                <td><a href="{{route('roles.edit', $roles->id)}}">{{$roles->name}}</a></td>
                <td>{{$roles->slug}}</td>
                <td>{{$roles->created_at}}</td>
                <td>{{$roles->updated_at}}</td>
                <td><form action="{{route('roles.destroy', $roles->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">DELETE</button>
                </form></td>
              </tr>
              @endforeach
            </tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
</x-admin-master>