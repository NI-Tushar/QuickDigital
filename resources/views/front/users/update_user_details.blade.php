@extends('front.users.layout.layout')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title" id="striped-row-layout-card-center">Update User Details</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="card-content collpase show">
                    <div class="card-body">

                        {{-- <div class="card-text">
                            <p>“Don’t waste your time looking back. You’re not going that way.” <code>~Vikings</code> </p>
                        </div> --}}
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
                        <form class="form form-horizontal striped-rows" method="POST"
                            action="{{ url('user/update_user_details') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                                    <div class="media">
                                                        @if (!empty(Auth::guard('user')->user()->image))
                                                            <a href="{{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }}"
                                                                target="blank">
                                                                <img src="{{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }}"
                                                                    class="rounded mr-75" alt="profile image" height="64"
                                                                    width="64">
                                                            </a>
                                                        @else
                                                            <a href="{{ asset('admin/images/user_images/no_image.jpg') }}"
                                                                target="blank">
                                                                <img src="{{ asset('admin/images/user_images/no_image.jpg') }}"
                                                                    class="rounded mr-75" alt="profile image" height="64"
                                                                    width="64">
                                                            </a>
                                                        @endif
                                                            <div class="media-body mt-75">
                                                                <div
                                                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label
                                                                        class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                        for="user_image">নতুন ছবি আপলোড করুন</label>
                                                                    <input type="file" id="user_image"
                                                                        name="user_image" accept="image/*" hidden>
                                                                    <button
                                                                        class="btn btn-sm btn-secondary ml-50">রিসেট</button>
                                                                </div>
                                                                <p class="text-muted ml-75 mt-50"><small>আমরা JPG, GIF বা
                                                                    PNG ফরমেট গ্রহণ করি। সর্বোচ্চ 800kB গ্রহনযজ্ঞ</small></p>
                                                            </div>
                                                    </div>
                                                    <hr>
                                                    <form class="form form-horizontal striped-rows" method="POST"
                            action="{{ url('user/update_user_details') }}" enctype="multipart/form-data" novalidate>@csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_email">ইমেইল</label>
                                                                        <input type="email" class="form-control"
                                                                            id="user_email"
                                                                            value="{{ Auth::guard('user')->user()->email }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_name">নাম</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_name" name="user_name"
                                                                            value="{{ Auth::guard('user')->user()->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_mobile">মোবাইল</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_mobile" name="user_mobile"
                                                                            value="{{ Auth::guard('user')->user()->mobile }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_address">ঠিকানা</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_address" name="user_address"
                                                                            value="{{ Auth::guard('user')->user()->address }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_city">শহর</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_city" name="user_city"
                                                                            value="{{ Auth::guard('user')->user()->city }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_state">বিভাগ</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_state" name="user_state"
                                                                            value="{{ Auth::guard('user')->user()->state }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_country">দেশ</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_country" name="user_country"
                                                                            value="{{ Auth::guard('user')->user()->country }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_zipcode">জিপকোড / পোস্টাল কোড</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_zipcode" name="user_zipcode"
                                                                            value="{{ Auth::guard('user')->user()->zipcode }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">সেভ করুন</button>
                                                                <a href="{{ url('user/index') }}"
                                                                    class="btn btn-light mr-1">
                                                                    <i class="feather icon-x"></i> বাতিল করুন
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
