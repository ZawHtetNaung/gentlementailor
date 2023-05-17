 <!-- /.modal -->
 @foreach ($additionals as $additional)
    <div class="modal fade" id="modal-primary{{$additional->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Additional SubCategory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_main_additional_sub',$additional->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                        <div class="form-group">
                            <label>Choose Category</label>
                            <select class="form-control" name="main_additional_id">
                                <option selected hidden value="{{$additional->main_additional_id}}">Choose Category</option>
                                @foreach($mains as $main)
                                <option value="{{$main->id}}">{{$main->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Additional SubCategory Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$additional->name}}">
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
