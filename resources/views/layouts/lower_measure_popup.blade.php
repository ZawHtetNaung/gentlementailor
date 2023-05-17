 <!-- /.modal -->
 @foreach ($lowers as $lower)
    <div class="modal fade" id="modal-primary{{$lower->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Pant Measurement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_lower_measure',$lower->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                        <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-6">
                                {{-- <div class="form-group">
                                  <label for="exampleInputEmail1">Waist</label>
                                  <input name="waist" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->waist}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Hips</label>
                                  <input name="hips" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->hips}}">
                                </div> --}}
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Crotch</label>
                                  <input name="crotch" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->crotch}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Thights</label>
                                  <input name="thighs" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->thighs}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Length</label>
                                  <input name="length" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->length}}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Bottom</label>
                                  <input name="bottom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->bottom}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Knee</label>
                                  <input name="knee" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->knee}}">
                                </div>
                                {{-- <div class="form-group">
                                  <label for="exampleInputEmail1">Shorts</label>
                                  <input name="shorts" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->shorts}}">
                                </div> --}}
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Stomach</label>
                                  <input name="stomach" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$lower->stomach}}">
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
