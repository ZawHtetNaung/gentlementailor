 <!-- /.modal -->
 @foreach ($packages as $package)
    <div class="modal fade" id="modal-primary{{$package->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Package</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_package',$package->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="photo" value="{{$package->photo}}">
                <div class="modal-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!-- <label for="exampleInputFile">Photo</label> -->
                                <div class="input-group">
                                <div class="custom-file">
                                    <!-- <input  name="photo" type="file" class="form-control" id="exampleInputFile" value="{{$package->photo}}" style="padding-bottom: 40px"> -->
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" style="padding-bottom: 40px">
                                <label>Old Photo</label>
                                <img class="rounded-5 shadow-sm" src="{{'/frontend/package/'. $package->photo}}" alt="" width="150px" height="60px" style="
                                        margin-top: 4%;
                                    "/>
                              </div>
                              <!-- @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror -->
                              <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Title" value="{{ $package->title }}" required autocomplete="title" autofocus>
                              </div>
                              @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" value="{{ $package->description }}" required autocomplete="description" autofocus>
                                    {{$package->description}}
                                </textarea>
                              </div>
                              @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Made In</label>
                                <input name="made_in" type="text" class="form-control @error('made_in') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Made In" value="{{ $package->made_in }}" required autocomplete="made_in" autofocus>
                              </div>
                              @error('made_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Tailor</label>
                                <input name="tailor" type="text" class="form-control @error('tailor') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Tailor" value="{{ $package->tailor }}" required autocomplete="tailor" autofocus>
                              </div>
                              @error('tailor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                             <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
    <style>
    .invalid-feedback{
        display: block !important;
    }
    </style>