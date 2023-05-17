@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customize Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="{{route('update_customize_cate',$customize_cate->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="file" value="{{$customize_cate->photo}}">
                    <div class="card card-default">
                        {{-- <div class="card-header">
                          <h3 class="card-title">Customize Category</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$customize_cate->name}}" placeholder="Enter Category Name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  {{-- <label>Main Texture Name</label> --}}
                                  <div class="row">
                                  <div class="col-6">
                                  <label>Photo</label>
                                  <input type="file" name="file" class="form-control" style="padding-bottom: 40px">
                                  </div>
                                  <div class="col-6">
                                  <label>Old Photo:</label>
                                  <img class="rounded-5 shadow-sm" src="{{'/assets/images/customize_category/'. $customize_cate->file}}" alt="" width="150px" height="60px" style="
                                        margin-top: 4%;
                                    "/>
                                  </div>

                                </div>
                                  @error('photo')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
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
