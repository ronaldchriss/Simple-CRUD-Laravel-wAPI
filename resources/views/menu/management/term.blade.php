@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Data Term Sign Language </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#AddUser"
                            data-whatever="@mdo">Add Term</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>Video</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($term as $item)
                        <tr>
                            <td>{{$item->priority}}</td>
                            <td>{{$item->title_trm}}</td>
                            <td>{!! Str::limit($item->desc_trm, 10)!!}</td>
                            <td>
                                <a class="btn btn-sm btn-secondary mb-2" href="{{$item->video_trm}}" target="_blank">
                                    Link
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning mb-2" href="{{route('term.edit', $item->id)}}">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#Delete{{$item->id}}"
                                    data-whatever="@mdo">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <div id="Delete{{$item->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure want delete this term ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-footer md-button">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Cancel</button>
                                            
                                        <a href="{{route('term.destroy', $item->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
            </tbody>
            </table>
        </div>
    </div>

</div>

</div>

<div id="AddUser" class="modal fade show" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Term</h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{route('term.make')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="video_trm" placeholder="Link Video Term" name="video_trm" required onchange="readURL(this);">
                        <br>
                        <center>
                            <iframe style="display: none" width="420" height="315" src="//www.youtube.com/embed/BstTBw6BLrE" frameborder="0" allowfullscreen id="video_preview"></iframe>
                        </center>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Description Term</label>
                        <textarea class="form-control" name="desc_trm" id="konten"></textarea>
                    </div>
            </div>
            <div class="modal-footer md-button">
                <a class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    function readURL(input) {
        document.getElementById("video_preview").style.display="block";
        if(input.value == null || input.value == ''){
            document.getElementById("video_preview").style.display="none";
        }
        var video_url_params = input.value;
        var url = video_url_params.replace("watch?v=", "embed/");
        $('#video_preview').attr('src', url);
        return false;
    }
</script>
    
@endsection

