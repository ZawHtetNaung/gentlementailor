<div class="" id="upper_measure_space">
  <p class="h6 mb-3 mt-2 d-none d-md-block">Jacket/Vest</p>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="neck" class="d-block form-label m-0">Neck</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
        <input type="number" min="0" id="neck" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="neck" value="{{$upper->neck}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="chest" class="d-block form-label m-0">Chest</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="hidden" value="0" id="upperID">
      <input type="number" min="0" id="chest" class="form-control" onmouseup="change_text()">
      @else
      <input type="hidden" value="{{$upper->id}}" id="upperID">
      <input type="number" min="0" id="chest" value="{{$upper->chest}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="waist" class="d-block form-label m-0">Waist</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="waist" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="waist" value="{{$upper->waist}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="hips" class="d-block form-label m-0">Hips</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="hips" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="hips" value="{{$upper->hips}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="shoulder" class="d-block form-label m-0">Shoulder</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="shoulder" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="shoulder" value="{{$upper->shoulder}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="sleeve" class="d-block form-label m-0">Sleeve</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="sleeve" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="sleeve" value="{{$upper->sleeve}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="front" class="d-block form-label m-0">Front Chest</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="front" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="front" value="{{$upper->front}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="back_back" class="d-block form-label m-0">Back</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="back_back" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="back_back" value="{{$upper->back}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="jlength" class="d-block form-label m-0">Jacket Length</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
        <input type="number" min="0" id="jlength" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="jlength" value="{{$upper->jacket_length}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
 {{-- <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="r_low" class="d-block form-label m-0">R.Low</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="r_low" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="r_low" value="{{$upper->r_low}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="l_low" class="d-block form-label m-0">L.Low</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $upper == null)
      <input type="number" min="0" id="l_low" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="l_low" value="{{$upper->l_low}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div> --}}


</div>
