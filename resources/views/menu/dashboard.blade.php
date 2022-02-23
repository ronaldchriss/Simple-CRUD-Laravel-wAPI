@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top 3 Content by View</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Title</div>
                                    </th>
                                    <th>
                                        <div class="th-content">View</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['view']['view'] as $view)
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><img src="assets/img/90x90.jpg"
                                                alt="avatar"><span>{{$view->title}}</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-brand text-primary">{{$view->view}}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top 3 Content by Like</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Title</div>
                                    </th>
                                    <th>
                                        <div class="th-content">View</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['view']['like'] as $view)
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><img src="assets/img/90x90.jpg"
                                                alt="avatar"><span>{{$view->title}}</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-brand text-primary">{{$view->like}}</div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top 3 Content by Dislike</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Theme</div>
                                    </th>
                                    <th>
                                        <div class="th-content">View</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['view']['dislike'] as $view)
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><img src="assets/img/90x90.jpg"
                                                alt="avatar"><span>{{$view->title}}</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-brand text-primary">{{$view->dislike}}</div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top 3 Province Register</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Province</div>
                                    </th>
                                    <th>
                                        <div class="th-content">User</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['location']['province'] as $loc)
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><img src="assets/img/90x90.jpg"
                                                alt="avatar"><span>{{$loc->province}}</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-brand text-primary">{{$loc->count}}</div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top 3 City Register</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">City</div>
                                    </th>
                                    <th>
                                        <div class="th-content">User</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['location']['city'] as $loc)
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><img src="assets/img/90x90.jpg"
                                                alt="avatar"><span>{{$loc->city}}</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-brand text-primary">{{$loc->count}}</div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-three">
                <div class="widget-heading">
                    <h5 class="">Gender</h5>

                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                            </a>


                        </div>
                    </div>

                </div>
                <div class="widget-content">

                    <div class="order-summary">
                        @php
                            $man = $data['user']['gender'][0]->man;
                            $woman = $data['user']['gender'][0]->woman;
                            $pman = $man/($man+$woman)*100;
                            $pwoman = $woman/($man+$woman)*100;
                        @endphp
                        <div class="summary-list">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Man</h6>
                                    <p class="summary-count">{{$man}}</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                            style="width: {{$pman}}%" aria-valuenow="{{$man}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="summary-list">

                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Woman</h6>
                                    <p class="summary-count">{{$woman}}</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar"
                                            style="width: {{$pwoman}}%" aria-valuenow="{{$pwoman}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-three">
                <div class="widget-heading">
                    @php
                        $first = $data['user']['old'][0]->first;
                        $second = $data['user']['old'][0]->second;
                        $third = $data['user']['old'][0]->third;
                        $total = $first + $second + $third;
                        $a = $first/$total * 100;
                        $b = $second/$total * 100;
                        $c = $third/$total * 100;
                    @endphp
                    <h5 class="">Old</h5>

                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="widget-content">

                    <div class="order-summary">

                        <div class="summary-list">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>10 - 15</h6>
                                    <p class="summary-count">{{$first}}</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar"
                                            style="width: {{$a}}%" aria-valuenow="{{$a}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>15 - 25</h6>
                                    <p class="summary-count">{{$second}}</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                            style="width: {{$b}}%" aria-valuenow="{{$b}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>> 25</h6>
                                    <p class="summary-count">{{$third}}</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar"
                                            style="width: {{$c}}%" aria-valuenow="{{$c}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>





    </div>

</div>
@endsection
