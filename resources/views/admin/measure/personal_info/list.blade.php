@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Personal Information List</h1>
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
              {{-- <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">Additional</h3>
                  </div>
                  <div class="col-sm-6" style="padding-left:30vw">
                    <a href="{{route('add_main_additional')}}" class="btn btn-info" >Create</a>
                  </div>
                </div>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($infos as $info)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$info->name}}</td>
                      <td>{{$info->email}}</td>
                      @if($info->age == null)
                      <td>-</td>

                      @else
                      <td>{{$info->age}}</td>

                      @endif
                      @if($info->weight == null)
                      <th>-</th>
                      @else
                      <th>{{$info->weight}} {{$info->weight_type}}</th>
                      @endif
                      @if($info->height_type == null)
                      <th>-</th>
                      @elseif($info->height_type == 'cm')
                        @if($info->height_cm == null)
                        <th>-</th>
                        @else
                        <th>{{$info->height_cm}} {{$info->height_type}}</th>
                        @endif
                      @elseif($info->height_type == 'in')
                        @if($info->height_ft == null && $info->height_in == null)
                        <th>-</th>
                        @else
                        <th>{{$info->height_ft}}.{{$info->height_in}} ft/{{$info->height_type}}</th>
                        @endif
                      @endif
                      @if($info->city != null && $info->tsp_street == null)
                      <td>{{$info->city}}</td>
                      @elseif($info->city == null && $info->tsp_street != null)
                      <td>{{$info->tsp_street}}</td>
                      @elseif($info->city != null && $info->tsp_street != null)
                      <td>{{$info->city}} / {{$info->tsp_street}}</td>
                      @else
                      <td>-</td>
                      @endif
                      <td>
                      <div style="
                          display: flex;
                      ">
                         {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary{{$info->id}}" style="
                            width: 40%;
                        ">

                         <span class="fa fa-edit"></span>
                         </a> --}}
                        <a type="button" onclick="delete_confirm('{{$info->id}}')" class="btn btn-block btn-danger" style="
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Weight</th>
                    <th>Height</th>
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
    @include('layouts.person_info_popup')



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
                    url:'delete_personalInfo',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "user_id": value,
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
