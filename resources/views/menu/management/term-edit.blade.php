@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Edit Term Sign Language </b></h5>
                    </div>
                </div>
                <form action="{{route('term.update', $term->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        
                        
                        <div class="form-group mb-4">
                            <label for="inputState">No Term</label>
                            <input type="number" class="form-control" id="priority" placeholder="No" name="priority" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Title Term</label>
                            <input type="text" class="form-control" id="title_trm" placeholder="Title Term" name="title_trm" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Link Video</label>
                            <input type="text" class="form-control" id="video_trm" placeholder="Name" name="video_trm" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputState">Description Term</label>
                            <textarea class="form-control" name="desc_trm" id="konten">{{$term->desc_trm}}</textarea>
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

