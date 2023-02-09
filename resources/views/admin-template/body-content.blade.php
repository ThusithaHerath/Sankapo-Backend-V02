<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">

        {{-- {{ session('id') }} --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i class="icofont icofont-people"></i></div>
                                <div class="media-body"><span class="m-0">Total Users</span>
                                    <h4 class="mb-0 counter">{{ $users }}</h4><i class="icon-bg"
                                        data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-secondary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                                <div class="media-body"><span class="m-0">Products</span>
                                    <h4 class="mb-0 counter">{{ $products }}</h4><i class="icon-bg"
                                        data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i class="icofont icofont-building-alt"></i>
                                </div>
                                <div class="media-body"><span class="m-0">Properties</span>
                                    <h4 class="mb-0 counter">{{ $properties }}</h4><i class="icon-bg"
                                        data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i
                                        class="icofont icofont-chart-flow-alt-1"></i></div>
                                <div class="media-body"><span class="m-0">Categories</span>
                                    <h4 class="mb-0 counter">{{ $categories }}</h4><i class="icon-bg"
                                        data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i class="icofont icofont-people"></i></div>
                                <div class="media-body"><span class="m-0">Approved Products</span>
                                    <h4 class="mb-0 counter">{{ $approvedProducts }}</h4><i class="icon-bg"
                                        data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-secondary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                                <div class="media-body"><span class="m-0">Approved Properties</span>
                                    <h4 class="mb-0 counter">{{ $approvedProperties }}</h4><i class="icon-bg"
                                        data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i class="icofont icofont-building-alt"></i>
                                </div>
                                <div class="media-body"><span class="m-0">New <br> Products</span>
                                    <h4 class="mb-0 counter">{{ $newProducts }}</h4><i class="icon-bg"
                                        data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i
                                        class="icofont icofont-chart-flow-alt-1"></i></div>
                                <div class="media-body"><span class="m-0">New Properties</span>
                                    <h4 class="mb-0 counter">{{ $newProperties }}</h4><i class="icon-bg"
                                        data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
