<<<<<<< HEAD
@foreach ($fits as $fit)


<div class="modal fade" id="modal-primary{{$fit->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Fit Suit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <div class="modal-body">
                {{$fit->id}}
                @foreach ($fits as $fit)
                <div class="" id="app">
                    <edit-fit-suit link="{{url('formSubmit')}}" editID="{{$fit->id}}"></edit-fit-suit>
                </div>
                @endforeach

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" @click="update_fit_suit">Save changes</button>
            </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
=======

    <div class="" id="app">
        <edit-fit-suit link="{{url('formSubmit')}}"></edit-fit-suit>
    </div>

>>>>>>> 4e6057903adcaea8a6a97d3e9ed1211696cab722
@push('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endpush
