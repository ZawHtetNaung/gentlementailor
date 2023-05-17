@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fabric Pattern List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-left: 33vw">
            <a  href="{{route('create_fabric_pattern')}}" type="button" class="btn btn-primary">Create</a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              {{-- <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">Fibric & Texture's SubCategory</h3>
                  </div>
                  <div class="col-sm-6" style="padding-left:30vw">
                    <a href="{{route('add_main_texture_sub')}}" class="btn btn-info">Create</a>
                  </div>
                </div>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($patterns as $pattern)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$pattern->main_texture->name}}</td>
                      <td>{{$pattern->sub_category->name}}</td>
                      <td>{{$pattern->name}}</td>
                      <td>
                      <div style="
                          display: flex;
                      ">
                         <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary{{$pattern->id}}" style="
                            width: 40%;
                        ">

                         <span class="fa fa-edit"></span>
                         </a>
                        <a type="button" onclick="delete_confirm('{{$pattern->id}}')" class="btn btn-block btn-danger" style="
                            width: 40%;
                            margin-top: 0rem;
                            margin-left: 0.3rem;
                        "><span class="fa fa-trash"></span></a>
                      </div>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('layouts.fabric_pattern_popup')

{{-- edit modal --}}
@endsection

@push('datatables-scripts')
<script>
 $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "order": [[0,'desc'],[1,'desc']],
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
@push('input-file-scripts')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
@section('js')
<script>
    function delete_confirm(value){
        // alert(value);
        swal({
                title: "Are You Sure Delete",
                icon:'warning',
                buttons: ["No", "Yes"]
            })

          .then((isConfirm)=>{

            if(isConfirm){

                $.ajax({
                    type:'POST',
                    url:'delete_fabric_pattern',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "pattern_id": value,
                    },

                    success: function(){

                        swal({
                            title: "Success!",
                            text : "Successfully Deleted!",
                            icon : "success",
                        });

                        setTimeout(function(){window.location.reload()}, 1000);


                    },
                });
            }
          });
    }
    function get_subcategory(value)
  {
    // alert();

    var cate_id = $('#main'+value).val();
    console.log(cate_id);
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
          <option selected hidden>Choose SubCategory</option>
        `;
        for(i=0;i<data.subs.length;i++)
        {
        html+=`
            <option value="${data.subs[i].id}">${data.subs[i].name}</option>
        `;
        }
        html+=`</select>`;
        $('#sub-space'+value).html(html);
      }
    });
  }
</script>

@endsection
