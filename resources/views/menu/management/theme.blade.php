@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Data Theme </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#AddUser"
                            data-whatever="@mdo">Add Theme</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($theme as $item)
                            <tr>
                                <td>{{ $item->title_thm }}</td>
                                <td>
                                    {!! $item->desc_thm !!}
                                </td>
                                <td>
                                    <img src="{{asset('images/'.$item->img_thm)}}" id="img_preview" width="70px" height="70px" />
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning mb-2" href="{{route('thm.edit', $item->id)}}">
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
                                            <h5 class="modal-title">Are you sure want delete this theme ?</h5>
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
                                                Tidak</button>
                                            <a href="{{route('thm.destroy', $item->id)}}"
                                                class="btn btn-danger">Ya</a>
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
                <h5 class="modal-title">Form Add Theme</h5>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group mb-4">
                        <label for="inputState">Title Theme</label>
                        <input type="text" class="form-control" id="title_thm" placeholder="Title Theme" name="title_thm" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Image Theme</label>
                        <input type="file" class="form-control" id="img_thm" placeholder="Image Theme" name="img_thm" required onchange="readURL(this);">
                        <br>
                        <center>
                            <img src="{{asset('assets/img/200x200.jpg')}}" id="img_preview" width="200px" height="200px" />
                        </center>
                        
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Description Theme</label>
                        <textarea class="form-control" name="desc_thm" id="theme"></textarea>
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

