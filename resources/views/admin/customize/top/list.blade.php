@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tops List</h1>
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
                        ">Tops</h3> -->
                      </div>
                    
                      <a  href="{{route('add_top')}}" type="button" class="btn btn-primary">Create</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="top" class="table table-borderless">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Photo_one</th>
                    <th>Type</th>
                    <th>Style</th>
                    <th>Button</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
              
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Photo_one</th>
                    <th>Type</th>
                    <th>Style</th>
                    <th>Button</th>
                    <th>Price</th>
                    <th>Description</th>
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
//  $(function () {
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "order": [[0,'desc'],[1,'desc']],
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });


  $('#top').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getTops') }}",

                columns: [
                    {data: 'id'},
                    {data: 'photo_one'},
                    {data: 'type'},
                    {data: 'style'},
                    {data: 'color'},
                    {data: 'description'},
                    {data: 'price'},
                    {
                        data: 'action',
                        render: function (data, type) {
                            var info = `<a style="margin-right: 5px;" onclick="delete_top_confirm(:id)"  class="btn btn-sm btn-danger" href="#"><span class="fa fa-trash"></span></a>`;
                            info = info.replace(':id', data);
                            var edit = `<a class="btn btn-sm btn-primary" href="{{ route ('edit_top',['id'=>':id'])}}"><span class="fa fa-edit"></span></a>`;
                            edit = edit.replace(':id', data);
                            return info + edit;
                        }
                    },

                ],
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                paging: true,
                dom: 'Blfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print"],
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: 2},
                    {responsivePriority: 3, targets: 3},
                    {responsivePriority: 4, targets: 4},
                    {
                        'targets': [4],
                        'orderable': false,
                    },
                    {
                        'orderable': false,
                        'className': 'select-checkbox',
                        'targets': 2
                    },
                    {
                        'targets': [5],
                        'visible': false,
                        'searchable': false,
                    }
                ],
                language: {
                    "search": '<i class="fa-solid fa-search"></i>',
                    "searchPlaceholder": 'Search...',
                    paginate: {
                        next: '<i class="fa fa-angle-right"></i>', // or '→'
                        previous: '<i class="fa fa-angle-left"></i>' // or '←'
                    }
                },


                "order": [[6, "desc"]],

            });
</script>
@endpush
@section('js')
<script>
    function delete_top_confirm(value){
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
                    url:'delete_top',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "top_id": value,
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

