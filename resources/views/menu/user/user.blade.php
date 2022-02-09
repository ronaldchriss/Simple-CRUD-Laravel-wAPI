@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Data User </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#AddUser"
                            data-whatever="@mdo">Add User</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="no-content">Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($user as $item)
                        
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            @if ($item->role == "admin")
                                <td><span class="badge badge-primary"> Admin </span></td> 
                            @else
                                <td><span class="badge badge-secondary"> User </span></td> 
                            @endif
                            @if ($item->status == 1)
                                <td><span class="badge badge-success"> On </span></td> 
                            @else
                                <td><span class="badge badge-danger"> Off </span></td> 
                            @endif
                            <td>
                                <a class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#Edit{{$item->id}}"
                                    data-whatever="@mdo">
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
                                        <h5 class="modal-title">Are you sure want delete user {{$item->name}} ?</h5>
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
                                        <a href="{{route('user.delete', $item->id)}}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="Edit{{$item->id}}" class="modal fade" role="dialog">
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
                                        <form action="{{route('user.update', $item->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group mb-4">
                                                <label for="inputState">Name User</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{$item->name}}" name="name" required>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputState">Phone User</label>
                                                <input type="text" class="form-control" id="phone"
                                                    value="{{$item->phone}}" name="phone" required>
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
                        </div>
                        @php
                            $no++
                        @endphp
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
                <h5 class="modal-title">Form Add  User</h5>
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
                <form action="{{route('user.make')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group mb-4">
                        <label for="inputState">Name User</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Phone User</label>
                        <input type="text" class="form-control" id="phone" placeholder="0813xxxxx" name="phone" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email@email.com" name="email"
                            required>
                    </div>
                    <div id="password-field" class="form-group mb-4">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Password">
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
