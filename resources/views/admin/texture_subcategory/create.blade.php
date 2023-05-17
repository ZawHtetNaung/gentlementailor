@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Main Fabric & Texture SubCategory</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <form action="{{route('store_main_texture_sub')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Main Fibric & Texture SubCategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choose Size</label>
                                    <select class="form-control" name="main_texture_id">
                                        <option selected hidden value="0">Choose Category</option>
                                        @foreach($main_texture as $main)
                                        <option value="{{$main->id}}">{{$main->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('main_texture_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Main Texture's SubCategory Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Fibric & Texture Name">
                                    @error('name')
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
