 <!-- /.modal -->
 @foreach ($textures as $texture)
    <div class="modal fade" id="modal-primary{{$texture->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Texture's SubCategory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_main_texture_sub',$texture->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                        <div class="form-group">
                            <label>Choose Category</label>
                            <select class="form-control" name="main_texture_id">
                                <option selected hidden value="{{$texture->main_texture_id}}">Choose Category</option>
                                @foreach($mains as $main)
                                <option value="{{$main->id}}">{{$main->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fabric & Texture's SubCategory Name</label>
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
