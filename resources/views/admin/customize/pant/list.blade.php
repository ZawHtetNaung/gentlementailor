@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pant List</h1>
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
                    <div class="col-10">
                        <!-- <h3 class="card-title" style="
                            margin-bottom: 10px;
                        ">Pants</h3> -->
                      </div>
                    
                      <a  href="{{route('add_pant')}}" type="button" class="btn btn-primary">Create</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Style</th>
                    <th>Pleat</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  <?php $i=1; ?>
                  @foreach($pants as $pant)
                  <tr>
                    <td>{{$i++}}</td>
                    <td><img class="rounded-5 shadow-sm" src="{{'/assets/images/customize/pant/'. $pant->photo_one}}" alt="" width="100px" height="60px"/></td>
                    <td>{{$pant->style}}</td>
                    <td>{{$pant->color}}</td>
                    <!-- <td>{{$pant->size}}</td> -->
                    <td>{{$pant->description}}</td>
                    <td>{{$pant->price}}</td>
                    <td>
                    <div style="
                        display: flex;
                    ">

                       <a href="{{route('edit_pant',$pant->id)}}" type="button" class="btn btn-primary"  style="width: 40%;">
                       <span class="fa fa-edit"></span>
                       </a>
                      <a href="#" onclick="delete_pant_confirm('{{$pant->id}}')" type="button" href="#" class="btn btn-block btn-danger" style="

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
                  <tr class="text-center">
                    <th>No</th>
                    <th>Photo</th>
                    <th>Style</th>
                    <th>Pleat</th>
                    <th>Description</th>
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
@endsection
@push('datatables-scripts')
<script>
      if(sessionStorage.getItem('reload_additional_list') == 1)
    {
      // alert();
      window.location.reload();
      sessionStorage.removeItem('reload_additional_list');
    }

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
    function delete_pant_confirm(value){
        swal({
                title: "Are You Sure Delete",
                icon:'warning',
                buttons: ["No", "Yes"]
            })

          .then((isConfirm)=>{

            if(isConfirm){

                $.ajax({
                    type:'POST',
                    url:'delete_pant',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "pant_id": value,
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

