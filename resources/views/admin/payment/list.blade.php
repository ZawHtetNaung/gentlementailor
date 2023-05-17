@extends('layouts.dashboard')
@section('title','Customer Order Lists')
@push('css')
<style>
  .deliveried {
  text-decoration-line: line-through;
  text-decoration-color: red;
  text-decoration-style: wavy;
 }
</style>
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payment Testing List</h1>
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
                  <div class="col-10">
                      <h3 class="card-title" style="
                          margin-bottom: 10px;
                      ">Payment</h3>
                    </div>
                </div>

              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    {{-- <th>Tran ID</th> --}}
                    <th>Name</th>
                    <th>Payer Email</th>
                    <th>Amount</th>

                    <th>Currency</th>
                    <th>Status</th>
                    <th>Order Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @foreach($payments as $pay)
                  <tr>
                    @if($pay->order_status === "DELIVERIED")
                     <td class="deliveried">{{$i++}}</td>
                     @else
                     <td>{{$i++}}</td>
                    @endif
                    @if($pay->order_status === "DELIVERIED")
                      <td class="deliveried">{{$pay->pay_name}}</td>
                    @else
                      <td>{{$pay->pay_name}}</td>
                   @endif
                   @if($pay->order_status === "DELIVERIED")
                     <td class="deliveried">{{$pay->payer_email}}</td>
                   @else
                     <td>{{$pay->payer_email}}</td>
                   @endif

                   @if($pay->order_status === "DELIVERIED")
                     <td class="deliveried">{{$pay->amount}}</td>
                   @else
                     <td>{{$pay->amount}}</td>
                   @endif      
                   @if($pay->order_status === "DELIVERIED")
                    <td class="deliveried">{{$pay->currency}}</td>
                   @else
                    <td>{{$pay->currency}}</td>
                   @endif
                   @if($pay->order_status === "DELIVERIED")
                    <td class="deliveried">{{$pay->status}}</td>
                   @else
                   <td>{{$pay->status}}</td>
                  @endif      
                  @if($pay->order_status === "DELIVERIED")
                   <td class="deliveried">{{$pay->order_status}}</td>
                  @else
                   <td>{{$pay->order_status}}</td>
                  @endif
                    
                    <td>
                       <div class="w-100 d-flex">
                        <a href="{{ route('order.detail', $pay->id)}}" class="btn btn-primary">
                          <i class="fas fa-eye"></i>
                        </a>
                        @if($pay->order_status === "DELIVERIED")
                        <form action="{{ route('order.delivery.update',$pay->id )}}" method="post" class="ml-2">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger">
                           Cancel Delivery
                         </button>
                        </form>
                        @else
                        <form action="{{ route('order.delivery.update',$pay->id )}}" method="post" class="ml-2">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-warning">
                            Delivery
                         </button>
                        </form>
                        @endif

                       </div>
    
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tran ID</th>
                    {{-- <th>Order Code</th> --}}
                    <th>Payer Email</th>
                    <th>Amount</th>
                    <th>Paypal Fee</th>
                    <th>Net Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
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
                    url:'delete_payment',
                    dataType:'json',
                    data:{
                      "_token": "{{ csrf_token() }}",
                      "payment_id": value,
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
