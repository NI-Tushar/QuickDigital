@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Software Order</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Software Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success_message'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success_message') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="max-width:1000px;margin:auto;border-top:5px solid rgb(1, 164, 167);border-radius:10px;">
                            <!-- _________ -->
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    @if (Session::has('error_message'))
                                    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
                                    </div>
                                    @endif
                                    @if (Session::has('success_message'))
                                    <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Well done!</strong> {{ Session::get('success_message') }}
                                    </div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form name="product" id="productForm" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="">
                                    
                                    @csrf
                                        <div class="form-body">


                                            <style>
                                                .img_section{
                                                    background-color:rgba(0, 0, 0, 0.07);
                                                    border-radius:5px;
                                                    padding:5px;
                                                }
                                                .img_section .preview_img{
                                                    display:flex;
                                                    gap:5px;
                                                }
                                                .img_section .preview_img input{
                                                    border-radius:5px;
                                                }
                                                .price_section{
                                                    display:flex;
                                                    width: 100%;
                                                    gap:5px;
                                                }
                                                .price_section .form-group{
                                                    width: 100%;
                                                }
                                                label{
                                                    font-weight:600;
                                                }
                                                .form-group p{
                                                    border:1px solid rgb(210, 210, 210);
                                                    padding:10px;
                                                    background-color:#f2f2f2;
                                                    border-radius:7px;
                                                    font-weight:600;
                                                }
                                                .form-group ul {
                                                    border:1px solid rgb(210, 210, 210);
                                                    background-color:#f2f2f2;
                                                    padding:10px;
                                                    padding-left:35px;
                                                    border-radius:7px;
                                                }
                                                .form-group ul li{
                                                    list-style:decimal;
                                                    line-height:2.5;
                                                    border-bottom:1px solid rgb(210, 210, 210);
                                                }
                                            </style>


                                            <div class="form-group">
                                                <label>Order Id</label>
                                                <p>QDL1232154563</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Software Title</label>
                                                <p>Clients Custome FeatureClients Custome FeatureClients Custome Feature</p>
                                            </div>

                                            <div class="form-group">
                                                <label>Software Description</label>
                                                <p>Clients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome FeatureClients Custome </p>
                                            </div>

                                            <div class="form-group">
                                                <label>Clients Custome Feature</label>
                                                <ul>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                    <li>Clients Custome FeatureClients Custome FeatureClients Custome Feature</li>
                                                </ul>
                                            </div>
                                            
                                            
                                            
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Order Date:</label>
                                                    <p>Custome Feature</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Order Type:</label>
                                                   <p>Custome Feature</p>
                                                </div>
                                            </div>
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Start Date:</label>
                                                    <p>Custome Feature</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Last Renew:</label>
                                                   <p>Custome Feature</p>
                                                </div>
                                            </div>
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Start Date:</label>
                                                    <p>Custome Feature</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Last Renew:</label>
                                                   <p>Custome Feature</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Last Renew:</label>
                                                   <p>Custome Feature</p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Enter Prodict File (Zip)</label>
                                                <input style="border-radius:5px;" type="file" id="name" class="form-control round" placeholder="Enter Product file (zip)" accept=".zip,.rar" name="zip_file" value="" >
                                            </div>

                                            <!-- ___________________________ thumbnail start -->
                                             <div class="img_section">
                                                 <div class="form-group">
                                                    <label for="image_1">Thumbnail Image</label>
                                                    <input style="border-radius:5px;" type="file" id="poster_image" class="form-control round" name="thumbnail" accept="image/*">
                                                </div>
                                            </div>
                                            <!-- ___________________________ thumbnail end -->
    


                                            <div class="form-actions center">
                                                <a href="" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- _________ -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
