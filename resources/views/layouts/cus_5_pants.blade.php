<div class="" id="lower_measure_space">
  <p class="h6 mb-3 mt-2 d-none d-md-block">Pant</p>

  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pcrotch" class="d-block form-label m-0">Crotch</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
      <input type="hidden" value="0" id="lowerID">
      <input type="number" min="0" id="pcrotch" class="form-control" onmouseup="change_text()">
      @else
      <input type="hidden" value="{{$lower->id}}" id="lowerID">
      <input type="number" min="0" id="pcrotch" value="{{$lower->crotch}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pthighs" class="d-block form-label m-0">Thighs</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
      <input type="number" min="0" id="pthighs" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="pthighs" value="{{$lower->thighs}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pstomach" class="d-block form-label m-0">Stomach</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="number" min="0" id="pstomach" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="pstomach" value="{{$lower->stomach}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pbottom" class="d-block form-label m-0">Bottom</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="number" min="0" id="pbottom" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="pbottom" value="{{$lower->bottom}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row justify-content-between mb-3 mb-md-5">
    <label for="pknee" class="d-block form-label m-0">Knee</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="number" min="0" id="pknee" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="pknee" value="{{$lower->knee}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="plength" class="d-block form-label m-0">Pant Length</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
      <input type="number" min="0" id="plength" class="form-control" onmouseup="change_text()">
      @else
      <input type="number" min="0" id="plength" value="{{$lower->length}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>





{{-- <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pwaist" class="d-block form-label m-0">Waist</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="hidden" value="0" id="lowerID">
        <input type="number" min="0" id="pwaist" class="form-control" onmouseup="change_text()">
      @else
        <input type="hidden" value="{{$lower->id}}" id="lowerID">
        <input type="number" min="0" id="pwaist" value="{{$lower->waist}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="phips" class="d-block form-label m-0">Hips</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="number" min="0" id="phips" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="phips" value="{{$lower->hips}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-column flex-md-row mb-3 mb-md-5">
    <label for="pshorts" class="d-block form-label m-0">Shorts</label>
    <div class="d-flex align-items-end justify-content-center inp-grp">
      @if($user == null || $lower == null)
        <input type="number" min="0" id="pshorts" class="form-control" onmouseup="change_text()">
      @else
        <input type="number" min="0" id="pshorts" value="{{$lower->shorts}}" class="form-control" onmouseup="change_text()">
      @endif
      <span class="unit">cm</span>
    </div>
  </div> --}}
</div>
