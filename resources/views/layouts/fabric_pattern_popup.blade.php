 <!-- /.modal -->
 @foreach ($patterns as $pattern)

    <div class="modal fade" id="modal-primary{{$pattern->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Fabric Pattern</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_fabric_pattern',$pattern->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                        <div class="form-group">
                            <label>Choose Category</label>
                            <select class='form-control' name="main_texture_id" id="main{{$pattern->id}}" onchange="get_subcategory('{{$pattern->id}}')">
                              @foreach ($mains as $main)
                              <option value='{{$main->id}}'
                              @if ($main->id == $pattern->main_texture_id)
                              selected
                              @endif
                              > {{$main->name}}</option>

                              @endforeach
                          </select>
                        </div>
                        <div class="form-group" name="sub_category_id" id="sub-space{{$pattern->id}}">
                          <label>Choose SubCategory</label>
                          <select class="form-control" name="sub_category_id">
                              <option selected hidden value="{{$pattern->sub_category_id}}">Choose SubCategory</option>

                              @foreach ($subs as $sub)
                              <option value='{{$sub->id}}'
                              @if ($sub->id == $pattern->sub_category_id)
                              selected
                              @endif
                              > {{$sub->name}}</option>

                              @endforeach
                          </select>
                      </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pattern Name</label>
                                <input name="pattern" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text" value="{{$pattern->name}}">
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
    <!-- /.modal -->
