@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fabric & Texture's SubCategory List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-left: 33vw">
            <a  href="{{route('add_main_texture_sub')}}" type="button" class="btn btn-primary">Create</a>
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
                    <th>Name</th>

                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                      @foreach($textures as $texture)
                      @foreach($mains as $main)
                      @if($main->id == $texture->main_texture_id)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$main->name}}</td>
                        <td>{{$texture->name}}</td>

                        <td>
                        <div style="
                            display: flex;
                        ">
                           <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary{{$texture->id}}" style="
                              width: 40%;
                          ">

                           <span class="fa fa-edit"></span>
                           </a>
                          <a type="button" onclick="delete_confirm('{{$texture->id}}')" class="btn btn-block btn-danger" style="
                              width: 40%;
                              margin-top: 0rem;
                              margin-left: 0.3rem;
                          "><span class="fa fa-trash"></span></a>
                        </div>

                        </td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Category</th>
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
    @include('layouts.main_texture_sub_popup')

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
                    url:'delete_main_texture_sub',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "texture_sub_id": value,
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
</script>

@endsection
