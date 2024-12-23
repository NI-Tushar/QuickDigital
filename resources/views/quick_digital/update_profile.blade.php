@extends('quick_digital.layout.layout')
@section('content')
    <section class="max-width container custom-padding py-5">

        <div class="row justify-content-md-center gap-5">
            <div class="col-md-8 order-md-2">
                <div class="card bg-white shadow">
                    <div class="card-content collpase show">
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
                            <form class="form form-horizontal striped-rows" method="POST"
                                action="{{ url('user/update_user_details') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card" style="background-color: #fff !important; border: none;">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                                    @if (Auth::guard('user')->check())
                                                        @php
                                                            $user = Auth::guard('user')->user();
                                                        @endphp
                                                        @if ($user->subscription_id && $user->subscription_expire_date > \Carbon\Carbon::now())
                                                            <div class="mb-5 p-5 bg-warning-subtle">
                                                                <p>আপনার প্যাকেজ:
                                                                    @if ($user->subscription_id == 1)
                                                                        <span class="fw-bold fs-5 "> সিলভার</span>
                                                                    @elseif ($user->subscription_id == 2)
                                                                        <span class="fw-bold fs-5 "> গোল্ড</span>
                                                                    @else
                                                                        <span class="fw-bold fs-5 "> প্ল্যাটিনাম</span>
                                                                    @endif
                                                                </p>
                                                                <p>প্যাকেজের মেয়াদ: <span class="fw-bold">{{ $user->subscription_expire_date }}</span></p>
                                                                @if ($user->download_count > 0)
                                                                    <p class="m-0">এই প্যাকেজের আওতায় আরো ডাউনলোড করতে
                                                                        পারবেন <span
                                                                            class="fw-bold">{{ $user->download_count }}
                                                                            টি</span> ই-বুক। </p>
                                                                @else
                                                                    <p class="m-0">আপনার ডাউনলোড লিমিট শেষ হয়ে গেছে।
                                                                        দয়া করে পুনরায় প্যাকেজ কিনুন।</p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <div class="media d-flex gap-3">
                                                        @if (!empty(Auth::guard('user')->user()->image))
                                                            <a href="{{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }}"
                                                                target="blank">
                                                                <img class="border"
                                                                    src="{{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }}"
                                                                    class="rounded mr-75" alt="profile image" height="64"
                                                                    width="64">
                                                            </a>
                                                        @else
                                                            <a href="{{ asset('admin/images/user_images/no_image.jpg') }}"
                                                                target="blank">
                                                                <img class="border"
                                                                    src="{{ asset('admin/images/user_images/no_image.jpg') }}"
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
                                                                <input type="file" id="user_image" name="user_image"
                                                                    accept="image/*" hidden>
                                                                <button
                                                                    class="btn btn-sm btn-secondary ml-50 mx-3">রিসেট</button>
                                                            </div>
                                                            <p class="text-muted ml-75 mt-50"><small>আমরা JPG, GIF বা
                                                                    PNG ফরমেট গ্রহণ করি। সর্বোচ্চ 800kB গ্রহনযজ্ঞ</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <form class="form form-horizontal striped-rows" method="POST"
                                                        action="{{ url('user/update_user_details') }}"
                                                        enctype="multipart/form-data" novalidate>@csrf
                                                        <div class="row">
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_email">ইমেইল</label>
                                                                        <input type="email" class="form-control"
                                                                            style="background-color: #E8E8E8;"
                                                                            id="user_email"
                                                                            value="{{ Auth::guard('user')->user()->email }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_name">নাম</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_name" name="user_name"
                                                                            value="{{ Auth::guard('user')->user()->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_mobile">মোবাইল</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_mobile" name="user_mobile"
                                                                            value="{{ Auth::guard('user')->user()->mobile }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_address">ঠিকানা</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_address" name="user_address"
                                                                            value="{{ Auth::guard('user')->user()->address }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_city">শহর</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_city" name="user_city"
                                                                            value="{{ Auth::guard('user')->user()->city }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_state">বিভাগ</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_state" name="user_state"
                                                                            value="{{ Auth::guard('user')->user()->state }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_country">দেশ</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_country" name="user_country"
                                                                            value="{{ Auth::guard('user')->user()->country }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 py-3">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="user_zipcode">জিপকোড / পোস্টাল
                                                                            কোড</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user_zipcode" name="user_zipcode"
                                                                            value="{{ Auth::guard('user')->user()->zipcode }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-12 d-flex flex-sm-row flex-column justify-content-around mt-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 d-flex align-items-center gap-2"> <svg
                                                                        height="16px" width="16px"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M20.9998 7L16 2H3.9985C3.44749 2 3 2.44405 3 2.9918V21.0082C3 21.5447 3.44476 22 3.9934 22H12.3414C12.1203 21.3744 12 20.7013 12 20C12 16.6863 14.6863 14 18 14C19.0928 14 20.1174 14.2922 20.9999 14.8026L20.9998 7ZM14.4646 19.4647L18.0001 23.0002L22.9498 18.0505L21.5356 16.6362L18.0001 20.1718L15.8788 18.0505L14.4646 19.4647Z">
                                                                        </path>
                                                                    </svg> সেভ
                                                                    করুন</button>
                                                                <a href="{{ url('user/index') }}"
                                                                    class="btn btn-light mr-1 bg-warning d-flex align-items-center gap-2">
                                                                    <svg height="16px" width="16px"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z">
                                                                        </path>
                                                                    </svg> বাতিল করুন
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-9">
                            </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 order-md-1">
                @include('quick_digital.layout.sidebar')
            </div>
        </div>
    </section>
@endsection
