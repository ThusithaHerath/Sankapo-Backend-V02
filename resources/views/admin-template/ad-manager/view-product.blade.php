<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{url('assets/images/favicon.svg" type="image/x-icon')}}">
    <link rel="shortcut icon" href="{{url('assets/images/favicon.svg" type="image/x-icon')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Sankapo.com - Products</title>
    @include('admin-template.css')
  </head>
  <body onload="startTime()">
    @include('admin-template.body-without-content')
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
           <div class="page-body">
            @if(session('approved'))
            <h5 class="alert alert-success">{{session('approved')}}</h5>
            @endif
            @if(session('declined'))
            <h5 class="alert alert-danger">{{session('declined')}}</h5>
            @endif
            <section style="background-color: #eee;">
              <div class="container py-5">
                <div class="row justify-content-center mb-3">
                  <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 "> 
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                              {{-- product card carosal--}}
                              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <?php  $product_images = json_decode($data->images);?>
                                    <img height="200px" width="350px" src="{{ asset('uploads/products/'. $product_images[0]) }}"/>
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                          {{-- product card carosal--}}
                            </div>
                          </div>
                          <div class="col-md-3 border-start">
                            <h5>{{$data->title}}</h5>
                            <div>
                             <div class="">Category:&nbsp&nbsp&nbsp<span class="text-success">{{$data->p_category->category}}</span></div>
                             <div class="">Condition:&nbsp&nbsp&nbsp<span class="text-danger">{{$data->condition}}</span></div>
                             <div class="">Seller Name&nbsp&nbsp&nbsp<span class="text-danger">{{$data->sellerName}}</span></div>
                             <div class="">Province&nbsp&nbsp&nbsp<span class="text-danger">{{$data->province}}</span></div>
                             <div class="">City&nbsp&nbsp&nbsp<span class="text-danger">{{$data->city}}</span></div>
                             <div class="">Town&nbsp&nbsp&nbsp<span class="text-danger">{{$data->town}}</span></div>
                            </div>
                           <div class="">Description: 
                            <p class="text-truncate mb-4 mb-md-0">
                              {{$data->description}}
                            </p>
                           </div>
                          </div>
                          <div class="col-md-3  border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                              <h4 class="mb-1 me-1">${{$data->buy}}</h4>
                            </div>
                            {{-- <h6 class="text-success">Free shipping</h6> --}}
                            <div class="d-flex flex-column mt-4">
                             <a class="btn btn-success btn-lg" type="submit"  href="{{url('approve-product/'.$data->id)}}">Approve</a>
                             <a class="btn btn-danger btn-lg mt-2" type="submit" href="{{url('decline-product/'.$data->id)}}">Decline</a>
                             <a class="btn btn-warning btn-lg mt-2" type="submit" href="{{url('http://127.0.0.1:8000/products')}}">Back</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>     
              </div>
            </section>
           </div>
        </div>
    </div>

    @include('admin-template.script')
    @include('admin-template.footer')
    <script src="{{url('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>

