@extends('admin.layout.layout')
@push('css')
<style>
    .badge {
        display: inline-block;
        padding: 0.5em 0.75em;
        font-size: 0.875em;
        font-weight: 600;
        color: #fff;
        background-color: #007bff;
        border-radius: 0.25rem;
    }
    .me-1 {
        margin-right: 0.25rem;
    }
</style>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Affiliator LIST</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Affiliator List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                                <!-- ___________________ search box start -->
                                 <style>
                                     .search_box{
                                         padding:10px;
                                         width:100%;
                                         display:flex;
                                         justify-content:right;
                                         gap:15px;
                                         position: relative;
                                        }
                                        .search_box .total{
                                            margin:0;
                                            position: absolute;
                                            left:0px;
                                            font-size:17px;
                                            font-weight:600;
                                        }
                                        .search_box button{
                                        height:100%;
                                        padding:10px;
                                        border-radius:5px;
                                        border:0.5px solid black;
                                        width: 150px;
                                        font-weight:700;
                                    }
                                    .search_box button:hover{
                                        background-color:aliceblue;
                                    }
                                    .search_box form{
                                        width: 50%;
                                    }
                                    .search_box input{
                                        padding:10px;
                                        border-radius:5px;
                                        border:0.5px solid black;
                                        width: 100%;
                                    }
                                 </style>
                                <div class="search_box">
                                    <p class="total">Total Affiliator: {{$totalCount}}</p>
                                    <a href="{{ route('bootcamp.affiliators') }}"><button>Reset</button></a>
                                <form action="{{ route('affill.search') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                        <input type="search" name="email_phone" id="" placeholder="Search | Enter Email or Phone number">
                                    </form>
                                </div>
                                <!-- ___________________ search box end -->

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bootcamps as $bootcamp)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $bootcamp->name }}</td>
                                                <td>{{ $bootcamp->phone }}</td>
                                                <td>{{ $bootcamp->email }}</td>
                                                <td>{{ $bootcamp->profession }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <a href="#" class="showBootcamp btn btn-sm btn-info" data-toggle="modal" data-target="#bootcampViewModla" data-id="{{ $bootcamp->id }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('bootcamp.destroy', $bootcamp->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="show_confirm btn btn-sm btn-danger"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination Links -->
                                <div class="d-flex justify-content-end">
                                    {{ $bootcamps->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Affiliator View Modal -->
            <div class="modal fade" id="bootcampViewModla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="">
                                <h4 class="modal-title" id="myLargeModalLabel">View Details - <span id="creator_name"></span></h4>
                                <span id="insert_date" style="display: block"></span>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body dark-modal">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Fill Name</th>
                                            <td id="name">N/A</td>
                                            <th style="text-transform: uppercase; width:200px">Contact Number</th>
                                            <td id="phone">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Gender</th>
                                            <td id="gender">N/A</td>
                                            <th style="text-transform: uppercase; width:200px">Email Address</th>
                                            <td id="email">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Profession</th>
                                            <td id="profession">N/A</td>
                                            <th style="text-transform: uppercase; width:200px">Division</th>
                                            <td id="division">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Institute</th>
                                            <td id="institute">N/A</td>
                                            <th style="text-transform: uppercase; width:200px">District</th>
                                            <td id="district">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Interests</th>
                                            <td id="interests" colspan="3">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Full Address</th>
                                            <td id="address" colspan="3">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">UserID</th>
                                            <td id="user_id" style="color:red;">N/A</td>
                                        </tr>
                                        <tr>
                                            <th style="text-transform: uppercase; width:200px">Password</th>
                                            <td id="password" style="color:red;">N/A</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        // Show Bootcamp data
        $('.showBootcamp').click(function(event) {

            var bootcampId = $(this).data("id"); // Retrieve the data-id

            $.ajax({
                url: '/admin/bootcamp/' + bootcampId + '/show',
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    //Populate Organization Information
                    $('#creator_name').text(res.name || 'N/A');
                        const date = new Date(res.created_at);
                        const formattedDate = date.toLocaleDateString('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                    $('#insert_date').text(formattedDate)
                    $('#name').text(res.name || 'N/A');
                    $('#email').text(res.email || 'N/A');
                    $('#phone').text(res.phone || 'N/A');
                    $('#profession').text(res.profession || 'N/A');
                    $('#institute').text(res.institute  || 'N/A');
                    $('#gender').text(res.gender  || 'N/A');

                    let interests = res.interests ? JSON.parse(res.interests) : [];
                    if (interests.length > 0) {
                        let badges = interests.map(interest => `<span class="badge bg-primary me-1">${interest}</span>`).join('');
                        $('#interests').html(badges);
                    } else {
                        $('#interests').text('N/A');
                    }

                    $('#division').text(res.division  || 'N/A');
                    $('#district').text(res.district  || 'N/A');
                    $('#user_id').text(res.email  || 'N/A');
                    $('#password').text(res.password  || 'N/A');
                    $('#address').text(res.address  || 'N/A');
                    $('#convertAffiliator').data('id', res.id || 'N/A'); // Updates the jQuery data cache

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('bootcampViewModla'));
                    modal.show();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

</script>

    <script>

        $('.show_confirm').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this).closest("form"); // Get the closest form

            Swal.fire({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                dangerMode: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                }
            });
        });
    </script>
@endpush
