@extends('admin.layout.layout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">{{ $title }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/subscription') }}">Subscription Packages</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
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
                                    <form name="subscriptionForm" id="subscriptionForm" @if(empty($subscription['id'])) action="{{ url('admin/add-edit-subscription') }}" @else action="{{ url('admin/add-edit-subscription/'.$subscription['id']) }}" @endif method="POST">@csrf
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label for="name">Subscription Package Name</label>
                                                <input type="text" id="name" class="form-control round" placeholder="Enter Package Name" name="name" value="{{ old('name', $subscription->name ?? '') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" id="price" class="form-control round" placeholder="Enter Package Price" name="price" value="{{ old('price', $subscription->price ?? '') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="count">Download limit (in english number)</label>
                                                <input type="number" id="count" class="form-control round" placeholder="Enter total download limit" name="count" value="{{ old('count', $subscription->count ?? '') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="duration">Duration (In Month's)</label>
                                                <input type="text" id="duration" class="form-control round" placeholder="Enter Package duration" name="duration" value="{{ old('duration', $subscription->duration ?? '') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="features">Features</label>
                                                <div id="features-container">
                                                    @if (isset($subscription->features) && is_array($subscription->features))
                                                        @foreach ($subscription->features as $index => $feature)
                                                            <div class="input-group mb-2">
                                                                <input type="text" name="features[]" class="form-control" value="{{ old('features.' . $index, $feature) }}">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-danger remove-feature">X</button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="features[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-feature">X</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" id="add-feature" class="btn btn-secondary">Add Feature</button>
                                            </div>
                                        </div>

                                        <div class="form-actions center">
                                            <a href="{{ url('admin/subscription') }}" class="btn btn-warning mr-1">
                                                <i class="feather icon-x"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </button>
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
