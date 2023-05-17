 <!-- /.modal -->
 @foreach ($mains as $main)
    <div class="modal fade" id="modal-primary{{$main->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Main Additinal Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_main_additional',$main->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Additional Category Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$main->name}}">
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
    <!-- /.modal -->
