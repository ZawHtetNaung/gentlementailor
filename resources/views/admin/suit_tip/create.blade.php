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
            <form action="{{route('store_suit_tip')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        {{-- <div class="card-header">
                          <h3 class="card-title">Customize Category</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input name="photo" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter Photo Name">
                                    @error('photo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Headline</label>
                                    <input name="brand" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Headline Name">
                                    @error('brand')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title Name">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" type="text" rows="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Description Name"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- checkbox -->
                              <div class="form-group">
                                <div class="form-check">
                                  <input name="feature" class="form-check-input" value="yes" type="checkbox">
                                  <label class="form-check-label">Add this to Featured Posts</label>
                                </div>
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
