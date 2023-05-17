@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Faq Question</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="{{route('update_faq_question',$faq_question->id)}}" method="POST" enctype="multipart/form-data">
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
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$faq_question->name}}" placeholder="Enter Title Name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- select -->
                                <div class="form-group">
                                  <label>Title</label>
                                  <select class="form-control" name="title">
                                    @foreach($faq_titles as $faq_title)
                                    <option value="{{$faq_title->name}}">{{$faq_title->name}}</option>
                                    @endforeach
                                  </select>
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
