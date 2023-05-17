@extends('layouts.dashboard')
@section('content')
<style>
    #edit:hover{
        background-color: rgba(25, 55, 222, 0.658);
    }
    #delete:hover{
        background-color: rgba(222, 28, 25, 0.658);
    }
</style>
<h4 class="text-info" style="font-weight: bold">Banner List</h4>
<div class="container mt-3">
    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-hover my-2">
                <thead class="text-center bg-primary text-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Text</th>
                    <th scope="col">Button Text</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i=1; ?>
                    @foreach($banners as $banner)
                  <tr>
                    <th scope="row" class="text-muted">{{$i++}}</th>
                    <td><img class="rounded-5 shadow-sm" src="{{'/frontend/images/'. $banner->photo}}" alt="" width="150px" height="50px"/></td>
                    <td class="text-muted" style="font-size: 14px">{{$banner->text}}</td>
                    <td class="text-muted" style="font-size: 14px">{{$banner->button_text}}</td>
                    <td><div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-arrow-down-short-wide"></i>
                        </button>
                        <ul class="dropdown-menu rounded-2">
                          <li><a class="dropdown-item" href="#" id="edit" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$banner->id}}"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a></li>
                          <li><a class="dropdown-item" href="{{route('delete_banner',$banner->id)}}" id=delete><i class="fa-solid fa-trash me-2"></i>Delete</a></li>
                        </ul>
                      </div></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
{{-- edit modal --}}
<!-- Modal -->
@foreach ($banners as $banner)

<div class="modal fade" id="edit{{$banner->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Banner</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('update_banner',$banner->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label text-info">Photo</lsabel>
                    <input type="file" class="dropify" name="photo" data-height="150"/>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="control-label text-info">Text</label>
                        <input type="text" class="form-control" id="text" name="text" value="{{$banner->text}}">
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="control-label text-info">Button Text</label>
                        <select class="form-select" aria-label="Default select example" name="btn_text" id="btn_text">
                            <option selected hidden>Choose Button Text</option>
                            <option value="customize">Customize</option>
                            <option value="explore">Explore</option>
                            <option value="shop now">Shop Now</option>
                        </select>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  @endforeach
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $('.dropify').dropify();
    $(document).ready(function(){


    })
</script>
@endsection
