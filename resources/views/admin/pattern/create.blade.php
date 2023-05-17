@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Fabric Pattern</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <form action="{{route('store_fabric_pattern')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        {{-- <div class="card-header">
                          <h3 class="card-title"></h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choose Main Category</label>
                                    <select class="form-control" name="main_texture_id" id="main" onchange="get_subcategory()">
                                        <option selected hidden value="0">Choose Category</option>
                                        @foreach($mains as $main)
                                        <option value="{{$main->id}}">{{$main->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('main_texture_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" id="sub-space">
                                  <label>Choose Sub Category</label>
                                  <select class="form-control" name="sub_category_id" disabled>
                                      <option selected hidden value="0">Choose SubCategory</option>



                                  </select>
                                  @error('sub_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="forn-group">
                                  <label>Pattern Name</label>
                                  <input type="text" name="pattern" class="form-control">
                                  @error('pattern')
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
function get_subcategory()
  {
    var cate_id = $('#main').val();
    $.ajax({
      type: 'POST',
      url: '/get_sub_data_ajax',
      data: {
        "_token": "{{csrf_token()}}",
        "category_id": cate_id,
      },
      success: function (data) {
        console.log(data.subs);
        var html = "";
        var i=0;
        html+=`
        <label>Choose Sub Category</label>
        <select class="form-control" name="sub_category_id">
          <option selected hidden value="0">Choose SubCategory</option>
        `;
        for(i=0;i<data.subs.length;i++)
        {
        html+=`
            <option value="${data.subs[i].id}">${data.subs[i].name}</option>
        `;
        }
        html+=`</select>`;
        $('#sub-space').html(html);
      }
    });
  }
</script>
@endpush
@push('script_tag')
<script>

</script>
@endpush
