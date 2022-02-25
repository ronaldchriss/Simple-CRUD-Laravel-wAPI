@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Data Reply {{Str::ucfirst($title->title)}} </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-outline-danger" href="{{ url()->previous() }}">Back</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name User</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($reply as $item)
                            <tr>
                                <td>{{$no}}</td>
                                
                                <td>{{$item->owner->name}}</td>
                                <td>{{$item->review}}</td>
                            </tr>
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

@endsection


