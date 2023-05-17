@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jacket/Vest Measurement List</h1>
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
                    <th>Customer</th>
                    {{-- <th>Name</th> --}}
                    <th>Neck</th>
                    <th>Chest</th>
                    <th>Waist</th>
                    <th>Hips</th>
                    <th>Shoulder</th>
                    <th>Sleeve Right</th>
                    <th>Sleeve Left</th>
                    <th>Stomach</th>
                    <th>Biceps</th>
                    <th>Forearm</th>
                    <th>Cuffs</th>
                    <th>Chest Front/Back Width</th>
                    <th>Jacket Front/Back Length</th>
                    <th>Vest Length</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($uppers as $upper)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$upper->user->name}}</td>
                      {{-- <td>{{$upper->top_id}}</td> --}}
                      <td>{{$upper->neck}}{{$upper->measure_type}}</td>
                      <th>{{$upper->chest}}{{$upper->measure_type}}</th>
                      <th>{{$upper->waist}}{{$upper->measure_type}}</th>
                      <th>{{$upper->hips}}{{$upper->measure_type}}</th>
                      <th>{{$upper->shoulder}}{{$upper->measure_type}}</th>
                      <th>{{$upper->sleeve_length_right}}{{$upper->measure_type}}</th>
                      <th>{{$upper->sleeve_length_left}}{{$upper->measure_type}}</th>
                      <th>{{$upper->stomach}}{{$upper->measure_type}}</th>
                      <td>{{$upper->biceps}}{{$upper->measure_type}}</td>
                      <th>{{$upper->forearm}}{{$upper->measure_type}}</th>
                      <th>{{$upper->cuffs}}{{$upper->measure_type}}</th>
                      <th>{{$upper->chest_front_width}}/{{$upper->chest_back_width}} {{$upper->measure_type}}</th>
                      <th>{{$upper->jacket_front_length}}/{{$upper->jacket_back_length}} {{$upper->measure_type}}</th>
                      <th>{{$upper->vest_length}}{{$upper->measure_type}}</th>



                      <td>
                      <div style="
                          display: flex;
                      ">
                         {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary{{$upper->id}}" style="
                            width: 40%;
                        ">

                         <span class="fa fa-edit"></span>
                         </a> --}}
                        <a type="button" onclick="delete_confirm('{{$upper->id}}')" class="btn btn-block btn-danger" style="
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
                    <th>Customer</th>
                    <th>Neck</th>
                    <th>Chest</th>
                    <th>Waist</th>
                    <th>Hips</th>
                    <th>Shoulder</th>
                    <th>Sleeve Right</th>
                    <th>Sleeve Left</th>
                    <th>Stomach</th>
                    <th>Biceps</th>
                    <th>Forearm</th>
                    <th>Cuffs</th>
                    <th>Chest Front/Back Width</th>
                    <th>Jacket Front/Back Length</th>
                    <th>Vest Length</th>
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
    @include('layouts.upper_measure_popup')


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
                    url:'delete_upper',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "upper_id": value,
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
