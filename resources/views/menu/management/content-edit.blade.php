@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Edit Content </b></h5>
                    </div>
                </div>
                <form action="{{route('content.update', $content->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        
                        <div class="form-group mb-4">
                            <label for="inputState">Title Content</label>
                            <input type="text" class="form-control" id="title" placeholder="Title Content" name="title" value="{{$content->title}}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Theme Content</label>
                            <select class="selectpicker form-control" data-live-search="true" required name="theme" id="theme_content">
                                <!--<option value="{{$content->theme}}">{{$content->themes->title_thm}}</option>-->
                                @foreach ($theme as $theme)
                                    @if($content->theme == $theme->id)
                                        <option selected value="{{$theme->id}}">{{$theme->title_thm}}</option>
                                    @else
                                        <option value="{{$theme->id}}">{{$theme->title_thm}}</option>
                                    @endif
                                    
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Link Video</label>
                            <input type="text" class="form-control" id="video" placeholder="Name" value="{{$content->video}}" name="video" onchange="readURL(this);" required>
                        </div>
                        <br>
                        <center>
                            <iframe style="display: block" width="420" height="315" src="{{$content->video}}" frameborder="0" allowfullscreen id="video_preview"></iframe>
                        </center>
                        <div class="form-group mb-4">
                            <label for="inputState">Description Content</label>
                            <textarea class="form-control" name="desc" id="konten">{{$content->desc}}</textarea>
                        </div>
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

<script type="text/javascript">
    function readURL(input) {
        console.log(input.value);
        var video_url_params = input.value;
        var url = video_url_params.replace("watch?v=", "embed/");
        $('#video_preview').attr('src', url);
        return false;
    }
</script>
    
@endsection

