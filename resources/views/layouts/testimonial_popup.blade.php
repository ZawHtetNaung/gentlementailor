 <!-- /.modal -->
 @foreach ($testimonials as $test)
    <div class="modal fade" id="modal-primary{{$test->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Testimonial</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_testimonial',$test->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="photo" value="{{$test->photo}}">
                <div class="modal-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input  name="photo" type="file" class="form-control" id="exampleInputFile" value="{{$test->photo}}" style="padding-bottom: 40px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="from-control" name="description" cols="60" rows="8">{{$test->description}}</textarea>
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
