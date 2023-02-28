@include('layouts.header')

<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Appointments</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                    <ol class="breadcrumb p-0 mb-0 pl-1">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Today's Appointment
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Appointments</h4>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>No. of Persons</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Preferred Food</th>
                                            <th>Occasion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($appointments as $item)
                                        <tr>
                                            <td>{{ucfirst($item->name)}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{!!$item->contact!!}</td>
                                            <td>{{$item->no_of_person}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->time}}</td>
                                            <td>{{$item->preferred_food}}</td>
                                            <td>{{$item->occasion}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>
</div>
</div>


@include('layouts.footer')
