 <!-- /.modal -->
 @foreach ($uppers as $upper)
    <div class="modal fade" id="modal-primary{{$upper->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jacket Measurement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_upper_measure',$upper->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                        <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Chest</label>
                                  <input name="chest" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->chest}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Waist</label>
                                  <input name="waist" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->waist}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Hips</label>
                                  <input name="hips" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->hips}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Shoulder</label>
                                  <input name="shoulder" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->shoulder}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Sleeve</label>
                                  <input name="sleeve" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->sleeve}}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Front</label>
                                  <input name="front" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->front}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Back</label>
                                  <input name="back" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->back}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Neck</label>
                                  <input name="neck" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->neck}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">R.low</label>
                                  <input name="r_low" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->r_low}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">L.low</label>
                                  <input name="l_low" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$upper->l_low}}">
                                </div>
                              </div>
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
