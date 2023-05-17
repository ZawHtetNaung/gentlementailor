<div class="ready__filter--items" id="style-filter">
  <p class="ready__filter--title mb-3 text-uppercase">style</p>
  <div class="ready__filter--item">
    @foreach($style_cates as $style_cate)
    <div class="ready__input--group">
      <input type="checkbox" name="style_check" id="{{$style_cate->id}}" value="{{$style_cate->id}}" class="form-check-input me-3" onclick="getstyle(this.value,0)">
      <label for="{{$style_cate->id}}">{{$style_cate->name}}</label>
    </div>
    @endforeach
    {{-- <div class="ready__input--group mb-2">
      <input type="checkbox" id="wedding" class="form-check-input me-3">
      <label for="wedding">Wedding</label>
    </div> --}}
    {{-- <div class="ready__input--group mb-2">
      <input type="checkbox" id="graduation" class="form-check-input me-3">
      <label for="graduation">Graduation</label>
    </div>
    <div class="ready__input--group mb-2">
      <input type="checkbox" id="casual" class="form-check-input me-3">
      <label for="casual">Casual</label>

    </div> --}}


  </div>
  <a id="see-more">See More...</a>
</div>
<div class="ready__filter--items" id="fabric-filter">
  <p class="ready__filter--title mb-3 text-uppercase">Fabric</p>
  <div class="ready__filter--item">
    @foreach($main_textures as $main_texture)
    <div class="ready__input--group">
      <input type="checkbox" id="{{$main_texture->id}}1" value="{{$main_texture->id}}"
             class="form-check-input me-3" onclick="getstyle(0,this.value,0)">
      <label for="{{$main_texture->id}}1">{{$main_texture->name}}</label>
    </div>
    @endforeach
    {{-- <div class="ready__input--group mb-2">
      <input type="checkbox" id="cotton" class="form-check-input me-3">
      <label for="cotton">Cotton</label>
    </div>
    <div class="ready__input--group mb-2">
      <input type="checkbox" id="linen" class="form-check-input me-3">
      <label for="linen">Linen</label>
    </div>
    <div class="ready__input--group mb-2">
      <input type="checkbox" id="cashmere" class="form-check-input me-3">
      <label for="cashmere">Cashmere</label>
    </div> --}}

  </div>
  <a id="see-more">See More...</a>
</div>
<div class="ready__filter--items" id="price-filter">
  <p class="ready__filter--title mb-3 text-uppercase">Price</p>
  <div class="ready__filter--item">
    @foreach($packages as $package)
    <div class="ready__input--group">
      <div class="row g-0">
        <div class="col-1">
          <input type="checkbox" id="{{$package->id}}2" value="{{$package->id}}"
                 class="form-check-input me-3" onclick="getstyle(0,0,this.value)">
        </div>
        <div class="col-11 ps-4">
          <label for="{{$package->id}}2">{{$package->title}} ($300 - $500)</label>
        </div>
      </div>
    </div>
    @endforeach
    {{-- <div class="ready__input--group mb-2">
      <div class="row g-0">
        <div class="col-1">
          <input type="checkbox" id="legacy" class="form-check-input me-3">
        </div>
        <div class="col-11 ps-4">
          <label for="legacy">Legacy ( $600 - $900 )</label>
        </div>
      </div>
    </div>
    <div class="ready__input--group mb-2">
      <div class="row g-0">
        <div class="col-1">
          <input type="checkbox" id="premium" class="form-check-input me-3">
        </div>
        <div class="col-11 ps-4">
          <label for="premium">Premium ($1000 - $1500)</label>
        </div>
      </div>
    </div> --}}
  </div>
</div>

<script>
$(document).ready(function(){
  console.log("ready to wear page");
})


</script>
