 <!-- /.modal -->
 @foreach ($textures as $texture)
    <div class="modal fade" id="modal-primary{{$texture->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Texture</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_main_texture',$texture->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fabric & Texture Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$texture->name}}">
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
