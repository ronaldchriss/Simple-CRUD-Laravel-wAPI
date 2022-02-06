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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>
                                <a class="btn btn-sm btn-secondary mb-2" data-toggle="modal" data-target="#Edit"
                                    data-whatever="@mdo">
                                    Link
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#Edit"
                                    data-whatever="@mdo">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#Delete"
                                    data-whatever="@mdo">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        {{-- <div id="Delete{{$item->code_users}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Apakah User {{$item->name}} Mau Dihapus ?</h5>
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
                                        <a href="{{route('user-delete', $item->code_users)}}"
                                            class="btn btn-danger">Ya</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="Edit{{$item->code_users}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Edit User</h5>
                                        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('user-update', $item->code_users)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group mb-4">
                                                <label for="inputState">Name User</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{$item->name}}" name="name" required>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="RoleUser">Role User</label>
                                                <select id="RoleUser" class="form-control" name="roles">
                                                    @if ($item->roles == "admin")
                                                    <option value="admin" selected>Admin</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="asesor">Asesor</option>
                                                    @elseif ($item->roles == "manager")
                                                    <option value="manager" selected>Manager</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="asesor">Asesor</option>
                                                    @else
                                                    <option value="asesor" selected>Asesor</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="admin">Admin</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputState">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="{{$item->email}}" name="email" required>
                                            </div>
                                            <div id="password-field" class="form-group mb-4">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" type="password"
                                                    class="form-control" placeholder="Password">
                                            </div>
                                    </div>
                                    <div class="modal-footer md-button">
                                        <a class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Discard</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
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
                <form action="" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group mb-4">
                        <label for="inputState">No Term</label>
                        <input type="number" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Title Term</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Link Video</label>
                        <input type="number" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Email</label>
                        <textarea class="form-control" name="wysiwyg-editor" id="konten"></textarea>
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


    
@endsection

