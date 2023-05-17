@extends('layouts.dashboard')
@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Register List</h1>
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
                      ">User Register</h3> -->
                    </div>

                    <!-- <a  href="{{route('grand_texture')}}" type="button" class="btn btn-primary">Create Texture</a> -->
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="d-flex justify-content-end my-3">
                      <div class="form-group mr-md-2">
                          <fieldset>
                          <legend>From Date</legend>
                          <input type="text" id='search_fromdate_shopact' class="shopactdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                          </fieldset>
                      </div>
                      <div class="form-group mr-md-2">
                          <fieldset>
                          <legend>To Date</legend>
                          <input type="text" id='search_todate_shopact' class="shopactdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                          </fieldset>
                      </div>
                      <div class="pr-md-4">
                          <input type='button' id="shopact_search_button" value="Search" class="btn bg-info" style="margin-top: 42px;">
                      </div>
                  </div>
                <table id="userregister_table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created_date</th>
                  </tr>
                  </thead>

                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created_date</th>
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
@push('userregister-datatable-script')
<script type="text/javascript">
     var userregister_table = $('#userregister_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      "url": "{{ route('get_registerlog') }}",
      'data': function(data){
            // Read values
            var from_date = $('#search_fromdate_shopact').val() ? $('#search_fromdate_shopact').val() + " 00:00:00" : null;
            var to_date = $('#search_todate_shopact').val() ? $('#search_todate_shopact').val() + " 23:59:59" : null;

            // Append to data
            data.searchByFromdate = from_date;
            data.searchByTodate = to_date;
        }
      },
      columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'created_at'}

      ],

      responsive: true,
      lengthChange: true,
      autoWidth: false,
      paging: true,
      dom: 'Blfrtip',
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 2 },
      ],
      language: {
        "searchPlaceholder": 'Search ...',
        paginate: {
          next: '<i class="fa fa-angle-right"></i>', // or '→'
          previous: '<i class="fa fa-angle-left"></i>' // or '←'
        }
      },
      "order": [[ 3, "desc" ]],

  });
</script>
<script>
   $(document).ready(function() {
    $( ".shopdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#shop_search_button').click(function(){
      if($('#search_fromdate_shop').val() != null && $('#search_todate_shop').val() != null) {
        shopsTable.draw();
      }
    });

    $( ".shopactdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#shopact_search_button').click(function(){
      if($('#search_fromdate_shopact').val() != null && $('#search_todate_shopact').val() != null) {
        userregister_table.draw();
      }
    });
  });
</script>
@endpush
