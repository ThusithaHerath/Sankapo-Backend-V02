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
    <title>Sankapo.com - Add new category</title>
    @include('admin-template.css')
  </head>
  <body onload="startTime()">
    @include('admin-template.body-without-content')
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h5>Add new category</h5><span>
                          </div>
                          <div class="card-body">
                            <form class="form-wizard" id="regForm" action="{{url('http://127.0.0.1:8000/api/category/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="tab">
                                <div class="mb-3">
                                  <label for="name">Category Name</label>
                                  <input class="form-control" id="category" name="category" type="text" placeholder="Electronics" required="required">
                                </div>
                                <div class="mb-3">
                                  <label for="contact">Icon</label>
                                  <input class="form-control"  name="icon" type="file" >
                                </div>
                              </div>
                                <div class="text-end btn-mb">
                                  <button class="btn btn-primary"  type="submit" >Submit</button>
                                  <a class="btn btn-success" href="{{url('/categories')}}"  type="submit" >Back</a>
                                </div>
                              </div>
                            </form>
                          </div>
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

