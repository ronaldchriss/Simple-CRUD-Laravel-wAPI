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
                <form action="{{route('theme.update', $theme->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group mb-4">
                            <label for="inputState">Title Theme</label>
                            <input type="text" class="form-control" id="title_thm" placeholder="Title theme" name="title_thm" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Link Video</label>
                            <input type="text" class="form-control" id="video_thm" placeholder="Link Video" name="video_thm" required>
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


    
@endsection

