<x-admin-master>
    @section('content')
    <h1>All Posts!</h1>
    @if(session('success'))
    <div class="alert alert-danger">{{session('success')}}</div>
    @elseif(session('updated'))
    <div class="alert alert-success">{{session('updated')}}</div>
    @endif
    @if(session('post-created-message'))
    <div class="alert alert-success">{{session('post-created-message')}}</div>
    @endif
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="postsTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                    <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td><img src="{{$post->post_image}}" alt=""></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        @can('view',$post)
                        <td><form action="{{route('post.destroy', $post->id)}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
                        @endcan
                    </tr>
                    @endforeach
                  </tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="mx-auto">
        {{$posts->links()}}
        </div></div>
    @endsection
    @section('scripts')
    <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Page level custom scripts
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
    @endsection
</x-admin-master>