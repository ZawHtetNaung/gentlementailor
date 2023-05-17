@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Grand Texture List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-left: 33vw">
            <a  href="{{route('grand_texture')}}" type="button" class="btn btn-primary">Create</a>
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
                  <div class="col-10">
                      <h3 class="card-title" style="
                          margin-bottom: 10px;
                      ">Grand Texture</h3>
                    </div>

                    <a  href="{{route('grand_texture')}}" type="button" class="btn btn-primary">Create</a>
                </div>

              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @foreach($textures as $texture)
                  <tr>
                    <td>{{$i++}}</td>
                    <td><img class="rounded-5 shadow-sm" src="{{'/assets/images/categories/texture/'. $texture->photo_one}}" alt="" width="150px" height="60px"/></td>
                    <td>{{$texture->main_texture->name}}</td>
                    <td>{{$texture->sub_category->name}}</td>
                    <td>{{$texture->name}}</td>
                    <td>{{$texture->price}}</td>
                    <td>
                    <div style="
                        display: flex;
                    ">
                       <a href="{{route('edit_texture',$texture->id)}}" type="button" class="btn btn-primary" style="
                          width: 40%;
                      ">

                       <span class="fa fa-edit"></span>
                       </a>
                      <a type="button" href="#" onclick="delete_texture_confirm('{{$texture->id}}')" class="btn btn-block btn-danger" style="
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
                    <th>Photo</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Name</th>
                    <th>Price</th>
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
@section('js')
<script>
  if(sessionStorage.getItem('reload_texture_list') == 1)
  {
    window.location.reload();
    sessionStorage.setItem('reload_texture_list',0)
  }
  else if(sessionStorage.getItem('reload_texture_list') == 0)
  {
    
  }
    function delete_texture_confirm(value){
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
                    url:'delete_texture',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "texture_id": value,
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
