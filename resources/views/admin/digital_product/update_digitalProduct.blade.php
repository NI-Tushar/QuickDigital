@extends('admin.layout.layout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0"></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Digital Product</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="column">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <div class="card-text">
                                        <p>“You Can Change What You Do, But You Can’t Change What You Want.” <code>~Thomas Shelby</code> </p>
                                    </div>
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

                                    <form name="product" id="productForm" action="{{ url('admin/updating-digProduct/') }}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                                    
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
                                            </style>


                                            <div class="form-group">
                                                <label for="name">Product Title</label>
                                                <input style="border-radius:5px;" type="text" id="name" class="form-control round" placeholder="Enter Product Title" name="title" value="{{ $product['title'] }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Product Description</label>
                                                <textarea style="border-radius:5px;" id="desc" class="form-control round" placeholder="Enter Product Description" name="description" required>{{ $product['description'] }}</textarea>
                                            </div>

                                            
                                            @if($product->features!='')
                                            <div class="form-group">
                                                <label for="features">Features</label>
                                                @php
                                                    $product['features'] = json_decode($product['features'], true);
                                                @endphp

                                                @foreach ($product['features'] as $feature)
                                                <div id="features-container">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="features[]" class="form-control" placeholder="Enter Software Feature" value="{{$feature}}">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger remove-feature">X</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <button type="button" id="add-feature" class="btn btn-secondary">Add Feature</button>
                                            </div>
                                            @endif

                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label for="actual_price">Price</label>
                                                    <input style="border-radius:5px;" type="number" id="actual_price" class="form-control round" placeholder="Enter Price" name="price"
                                                    value="{{ $product['price'] }}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="actual_price">Affiliator Commission</label>
                                                    <input style="border-radius:5px;" type="number" id="star_rating" class="form-control round" placeholder="Enter Affiliator Commission (%)" name="affiliator_commission"
                                                    value="{{ $product['affiliator_commission'] }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Enter Prodict File (Zip)</label>
                                                <input style="border-radius:5px;" type="file" id="name" class="form-control round" placeholder="Enter Product file (zip)" accept=".zip,.rar" name="zip_file" value="{{ $product['zip_file'] }}" >
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        var container = document.getElementById('features-container');
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-2');

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'features[]';
        input.classList.add('form-control');

        var inputGroupAppend = document.createElement('div');
        inputGroupAppend.classList.add('input-group-append');

        var button = document.createElement('button');
        button.type = 'button';
        button.classList.add('btn', 'btn-danger', 'remove-feature');
        button.textContent = 'X';

        inputGroupAppend.appendChild(button);
        inputGroup.appendChild(input);
        inputGroup.appendChild(inputGroupAppend);
        container.appendChild(inputGroup);

        button.addEventListener('click', function() {
            container.removeChild(inputGroup);
        });
    });

    document.querySelectorAll('.remove-feature').forEach(function(button) {
        button.addEventListener('click', function() {
            var inputGroup = button.parentElement.parentElement;
            var container = document.getElementById('features-container');
            container.removeChild(inputGroup);
        });
    });
</script>
@endsection
