@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <form action="{{route('store_category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Code</label>
                                <input name="code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Code">
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" style="padding-bottom: 40px">
                              </div>
                              <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group" style="
                                    margin-top: 2rem;
                                    margin-bottom: 0rem;
                                ">
                                <div class="card-body">
                                    <input type="checkbox" name="main_status" checked data-bootstrap-switch>
                                </div>
                              </div>
                              <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
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
@section('js')

@endsection
@push('input-file-scripts')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
@push('switch-scripts')
<script>
$(function () {
 $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
})
</script>
@endpush
