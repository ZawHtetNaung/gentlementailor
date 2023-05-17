@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ready To Wear List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-left: 33vw">
            <a  href="{{route('create_ready_to_wear')}}" type="button" class="btn btn-primary">Create</a>
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
                    <th>Name</th>
                    <th>Main Texture</th>
                    {{-- <th>Sub Texture</th>
                    <th>Texture</th> --}}
                    <th>Style Category</th>
                    {{-- <th>Package</th> --}}
                    <th>Made In</th>
                    <th>Composition</th>
                    <th>Softness</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($readys as $ready)
                    <tr>
                      <td>{{$i++}}</td>
                      <td><img class="rounded-5 shadow-sm" src="{{'/assets/images/categories/ready/'. $ready->photo_one}}" alt="" width="150px" height="60px"/></td>
                      <td>{{$ready->name}}</td>
                      <td>{{$ready->main_texture->name}}</td>
                      {{-- <td>{{$ready->sub_category->name}}</td>
                      <td>{{$ready->grand->name}}</td> --}}
                      <td>{{$ready->style_id}}</td>
                      {{-- <td>{{$ready->package->title}}</td> --}}
                      <td>{{$ready->made_in}}</td>
                      <td>{{$ready->composition}}</td>
                      <td>{{$ready->softness}}</td>
                      <td>{{$ready->price}}</td>
                      <td>
                        <div style="
                            display: flex;
                        ">
                           <a href="{{route('edit_ready_to_wear',$ready->id)}}" type="button" class="btn btn-primary" style="
                              width: 40%;
                          ">

                           <span class="fa fa-edit"></span>
                           </a>
                          <a type="button" href="#" onclick="delete_texture_confirm('{{$ready->id}}')" class="btn btn-block btn-danger" style="
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
                    <th>Name</th>
                    <th>Main Texture</th>
                    {{-- <th>Sub Texture</th>
                    <th>Texture</th> --}}
                    <th>Style Category</th>
                    {{-- <th>Package</th> --}}
                    <th>Made In</th>
                    <th>Composition</th>
                    <th>Softness</th>
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
                    url:'delete_ready_to_wear',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "rtw_id": value,
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
