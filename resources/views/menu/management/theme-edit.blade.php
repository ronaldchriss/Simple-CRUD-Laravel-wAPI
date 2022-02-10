@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Edit Theme</b></h5>
                    </div>
                </div>
                <form action="{{route('thm.update', $theme->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group mb-4">
                            <label for="inputState">Title Theme</label>
                            <input type="text" class="form-control" id="title_thm" value="{{$theme->title_thm}}" name="title_thm" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Image Theme</label>
                            <input type="file" class="form-control" id="img_thm" placeholder="Image Theme" name="img_thm" required onchange="readURL(this);">
                            <br>
                            <center>
                                <img src="{{asset('images/'.$theme->img_thm)}}" id="img_preview" width="200px" height="200px" />
                            </center>
                            
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Description Theme</label>
                            <textarea class="form-control" name="desc_thm" id="konten">{{$theme->desc_thm}}</textarea>
                        </div>
                        @method('PUT')
                    </div>
                    <div class="modal-footer md-button">
                        <a class="btn" href="{{ url()->previous() }}"><i class="flaticon-cancel-12"></i> Discard</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</div>

@endsection

@section('script')

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    
@endsection

