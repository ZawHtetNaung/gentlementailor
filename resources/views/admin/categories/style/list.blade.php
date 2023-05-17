@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Style List</h1>
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
                        ">Style</h3> -->
                      </div>

                      <a  href="{{route('style')}}" type="button" class="btn btn-primary">Create</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Type</th>
                    {{-- <th>Category</th> --}}
                    <th>Pieces</th>
                    <th>Name</th>
                    <th>Colour</th>
                    <th>Fabric</th>
                    <th>Fabric Type</th>
                    <th>Composition</th>
                    <th>Softness</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @foreach($styles as $style)
                  <tr>
                    <td>{{$i++}}</td>
                    <td><img class="rounded-5 shadow-sm" src="{{'/assets/images/categories/style/'. $style->photo_one}}" alt="" width="150px" height="60px"/></td>
                    <td>{{$style->type}}</td>
                    {{-- <td>{{$style->category}}</td> --}}
                    <td>{{$style->pieces}}</td>
                    <td>{{$style->name}}</td>
                    <td>{{$style->colour}}</td>
                    <td>{{$style->fabric}}</td>
                    <td>{{$style->fabric_type}}</td>
                    <td>{{$style->compostition}}</td>
                    <td>{{$style->softness}}</td>
                    <td>{{$style->description}}</td>
                    <td>
                    <div style="
                        display: flex;
                    ">
                       <a href="{{route('edit_style',$style->id)}}" type="button" class="btn btn-primary" style="
                          width: 40%;
                      ">

                       <span class="fa fa-edit"></span>
                       </a>
                      <a type="button" href="#" onclick="delete_style_confirm('{{$style->id}}')" class="btn btn-block btn-danger" style="
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
                    <th>Type</th>
                    <!-- <th>Category</th> -->
                    <th>Pieces</th>
                    <th>Name</th>
                    <th>Colour</th>
                    <th>Fabric</th>
                    <th>Fabric Type</th>
                    <th>Composition</th>
                    <th>Softness</th>
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
       if(sessionStorage.getItem('reload_additional_list') == 1)
    {
      // alert();
      window.location.reload();
      sessionStorage.removeItem('reload_additional_list');
    }
    function delete_style_confirm(value){
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
                    url:'delete_style',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "style_id": value,
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

    // axios.post(`{!! url('create_style') !!}`, {
    // }).then(response => {
    //   console.log(response.data);
    // })
    // swal(
    //       'Your Item is uploaded successfully!',
    //       '',
    //       'success'
    //     )
    // $.ajax({
    //   type:'POST',
    //   url:'create_style',
    //   dataType:'json',
    //   data:{
    //     "_token": "{{ csrf_token() }}",
    //   },
    //   success: function(){

    //   }
    // })

</script>

@endsection
