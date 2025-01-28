<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('front/styles/add_affiliator.css') }}">
    <title>Add Affiliator</title>
</head>
<body>
       <!-- ______________________________________ new designed form start -->
            <div class="affiliator_reg_section">
                <div class="centered_list">
                    <a href="{{ route('bootcamp.affiliators') }}"><div class="close">x</div></a>
                    <div class="form_wrapper">
                        <div class="form_container">
                        <div class="title_container">
                            <h2>Add Affiliator</h2>
                        </div>
                        <form action="{{ route('add.affiliator') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                        <div class="row clearfix">
                            <div class="">
                                @if (Session::has('reg_success_message'))
                                    <h3 style="font-size:15px; font-weight:600; background-color:green; color: aliceblue; text-align:center !important; width:100%; padding:7px;" role="alert">
                                        {{ Session::get('reg_success_message') }}
                                    </h3>
                                @endif
                                @if (Session::has('error_message'))
                                    <h3 style="font-size:15px; font-weight:600; color: red; text-align:center !important; width:100%; padding:7px;" role="alert">
                                        {{ Session::get('error_message') }}
                                    </h3>
                                @endif
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                    <label for="">Affiliator Name:</label>
                                    <input type="text" name="name" placeholder="Affiliator Name"  value="{{ old('name') }}"/>
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                    <label for="">Affiliator Email:</label>
                                    <input type="email" name="email" placeholder="Affiliator Email"  value="{{ old('email') }}"/>
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                    <label for="">Affiliator Phone Number:</label>
                                    <input type="number" name="phone" placeholder="Mobile Number"  value="{{ old('phone') }}"/>
                                </div>

                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <label for="">Select Gender:</label>

                                <div class="input_field radio_option">
                                    <input type="radio" name="gender" value="Male" id="rd1">
                                    <label for="rd1">Male</label>
                                    <input type="radio" name="gender" value="Female" id="rd2">
                                    <label for="rd2">Female</label>
                                </div>
                                </div>
                                <div class="buttons">
                                    <input type="reset" value="Clear">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- ______________________________________ new designed form end -->

</body>
</html>