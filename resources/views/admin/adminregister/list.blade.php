@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin List</h1>
          </div><!-- /.col -->

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
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- <h3 class="card-title">Admin</h3> -->
                  </div>
                  <div class="col-sm-6" style="padding-left:30vw">
                    <a href="{{route('create_admin_register')}}" class="btn btn-warning" >Create</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @foreach($admins as $admin)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                    <div style="
                        display: flex;
                    ">  
                     @php
                    $auth = Auth::guard('admin')->user()->id;
                    @endphp
                    @if($auth === $admin->id)
                       <a type="button" class="btn btn-primary"  href="{{route('edit_admin',$admin->id)}}" style="
                          width: 40%;
                      ">

                       <span class="fa fa-edit"></span>
                       </a>
                      @endif
                      <!-- <a type="button" onclick="delete_banner_confirm('{{$admin->id}}')" class="btn btn-block btn-danger" style="
                          width: 40%;
                          margin-top: 0rem;
                          margin-left: 0.3rem;
                      "><span class="fa fa-trash"></span></a> -->
                    </div>

                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
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
   

@endsection

@push('datatables-scripts')
<script>
 $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
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
    function delete_banner_confirm(value){
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
                    url:'delete_admin_register',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "admin_id": value,
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

    // swal({
    //     title: "Your Item was uploaded successfully!",
    //     text: "",
    //     type: "success",
    //     icon: "success"
    // })
</script>

<!-- @if (Session::has('success')) -->
<!-- @endif -->
@endsection



@push('alert-script')
<!-- @if (session()->has('success'))
<script>
   swal({
        title: "Your Item was uploaded successfully!",
        text: "",
        type: "success",
        icon: "success"
    })
</script>
@endif -->
@if (session('success'))
    <script>
        $( document ).ready(function(){
          swal({
        title: "Your Item was uploaded successfully!",
        text: "",
        type: "success",
        icon: "success"
       })
        });
    </script>
@endif
@endpush



