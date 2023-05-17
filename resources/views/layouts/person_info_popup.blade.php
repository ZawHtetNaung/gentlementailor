 <!-- /.modal -->
 @foreach ($infos as $info)
    <div class="modal fade" id="modal-primary{{$info->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Personal information Measurement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_user_info_measure',$info->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                        <div class="col-sm-12">

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Age</label>
                                  <input name="age" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$info->age}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">weight</label>
                                  <input name="weight" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$info->weight}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Height</label>
                                  <input name="height" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$info->height}}">
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
