@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Package</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <form action="{{route('store_package')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                          <!-- <h3 class="card-title">Package</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" style="padding-bottom: 40px">
                              </div>
                              @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                              </div>
                              @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('description') }}" rows="3" required autocomplete="description" autofocus placeholder="Enter Text">{{old('description')}}</textarea>
                              </div>
                              @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Made In</label>
                                <input name="made_in" type="text" class="form-control @error('made_in') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Made In" value="{{ old('made_in') }}" required autocomplete="made_in" autofocus>
                              </div>
                              @error('made_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Tailor</label>
                                <input name="tailor" type="text" class="form-control @error('tailor') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Tailor" value="{{ old('tailor') }}" required autocomplete="tailor" autofocus>
                              </div>
                              @error('tailor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                              </div>
                              @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                              <div class="form-group">
                                <label>Link</label>
                                <input name="link" type="text" class="form-control @error('link') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Link" value="{{ old('link') }}" required autocomplete="link" autofocus>
                              </div>
                              @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                             <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                              <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        
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
<style>
    .invalid-feedback{
        display: block !important;
    }
</style>