@extends('layouts.app_user')
@include('layouts.userdashboardnavbar')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration" id="order">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Id</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Phone date</th>
                                                    <th>Address</th>
                                                    <th>Created At</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                            </tbody>
                                        </table>
                                    </div>
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
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#order').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        order: [
            [0, "desc"]
        ],
        "ajax": {
            "url": "{{route('user.getorders')}}",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: "{{ csrf_token() }}"
            }
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "order_id"
            },
            {
                "data": "fname"
            },
             {
                "data": "lname"
            },
            {
                "data": "email"
            },
            {
                "data": "phone"
            },
            {
                "data": "address"
            },
            {
                "data": "created_at"
            },
            
        ]

    });
});

</script>
@endsection
