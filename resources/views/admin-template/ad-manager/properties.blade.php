<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/vendors/datatables.css')}}">
    <title>Sankapo.com - Properties</title>
    @include('admin-template.css')
  </head>
  <body onload="startTime()">
    @include('admin-template.body-without-content')
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="advance-4">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Rent/Sale</th>
                                            <th>Seller</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $properties)
                                            <tr>
                                                <td>{{$properties->tittle}}</td>
                                                <td>{{$properties->isRentOrSale}}</td>
                                                <td>{{$properties->sellerName}}</td>
                                                <td>{{$properties->city}}</td>
                                                <td>
                                                    @if($properties->isApprove == '0')
                                                    <p class="btn btn-primary btn-xs" >Not Approved</p>
                                                    @elseif($properties->isApprove == '1')
                                                    <p class="btn btn-success btn-xs" >Approved</p>
                                                    @elseif($properties->isApprove == '2')
                                                    <p class="btn btn-danger btn-xs" >Declined</p>
                                                    @endif
                                                </td>
                                                <td><a class="btn btn-info btn-xs" href="{{url('view-property/'.$properties->id)}}">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
    </div>

    @include('admin-template.script')
    @include('admin-template.footer')
    <script src="{{url('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/datatable/datatables/datatable.custom.js')}}"></script>

  </body>
</html>

