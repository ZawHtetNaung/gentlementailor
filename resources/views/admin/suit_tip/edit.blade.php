@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Suit Tip</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="{{route('update_suit_tip',$suit_tip->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="photo" value="{{$suit_tip->photo}}">
                    <div class="card card-default">
                        {{-- <div class="card-header">
                          <h3 class="card-title">Customize Category</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-6">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control" style="padding-bottom: 40px">
                                    </div>
                                    <div class="col-6">
                                    <label>Old Photo:</label>
                                    <img class="rounded-5 shadow-sm" src="{{'/assets/images/suit_tip/'. $suit_tip->photo}}" alt="" width="150px" height="60px" style="
                                          margin-top: 4%;
                                      "/>
                                    </div>

                                  </div>
                                
                                
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input name="brand" type="text" class="form-control" id="exampleInputEmail1" value="{{$suit_tip->brand}}" placeholder="Enter Brand Name">
                                    @error('brand')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{$suit_tip->title}}" placeholder="Enter Title Name">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" value="{{$suit_tip->description}}" placeholder="Enter Description Name">{{$suit_tip->description}}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-sm-6">
                              <!-- checkbox -->
                              <div class="form-group">
                                <div class="form-check">
                                  @if($suit_tip->feature === "Yes")
                                  <input name="feature" class="form-check-input" value="yes" type="checkbox" checked>
                                  @else
                                  <input name="feature" class="form-check-input" value="no" type="checkbox">
                                  @endif
                                  <label class="form-check-label">Add this to Featured Posts</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <button type="submit" class="btn btn-primary" style="margin-bottom: 10%;">Submit</button>
                            </div>
                            </div>
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                         
                        </div>
                    </div>
                </form>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection
@push('input-file-scripts')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
