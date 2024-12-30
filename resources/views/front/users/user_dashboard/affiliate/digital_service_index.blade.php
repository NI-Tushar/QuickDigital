
@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url ('front/styles/software.css') }}">
@push('css')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">

@endpush
@section('content')


  <section class="home-section">

      <div class="home-content">

        <div class="software_section">

        <div class="centered_list">
          <div class="soft_heading">
              <h3>Digital Services</h3>

              <div class="card mt-3">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('affiliate.digialservice.create') }}">Create Order</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Order Date</th>
                                <th>Order Number</th>
                                <th>Client Name</th>
                                <th>Client Phone</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr style="cursor: pointer" class="showOrderData" data-toggle="modal" data-target="#orderViewModla" data-id="{{ $order->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $order->created_at->format('F j, Y') }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->start_date }}</td>
                                    <td>{{ $order->end_date }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
              </div>
          </div>

    </div>
</div>


<!-- Order View Modal -->
<div class="modal fade" id="orderViewModla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </table>

                        <div class="card p2">
                            <button class="btn btn-success" id="convertAffiliator" data-id="">Convert to Affiliator </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>

<div id="preview_section" class="preview_section">
  <div class="center_preview">
      <div class="close_icon" onclick="closePreview()"><p>x</p></div>
       <!-- _______________ -->
       <div class="slider">
            <div class="slide_viewer">
            <div id="slide_group" class="slide_group">
                <div class="slide">
                <img id="slider1" src="" alt="slider1">
                </div>
                <div class="slide">
                <img id="slider2" src="" alt="slider2">
                </div>
                <div class="slide">
                <img id="slider3" src="" alt="slider3">
                </div>
            </div>
            </div>
        </div><!-- End // .slider -->

        <div class="directional_nav">
            <div class="previous_btn" title="Previous">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                    <g>
                        <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                        c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z" />
                        <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z" />
                    </g>
                    </g>
                </svg>
            </div>
            <div class="next_btn" title="Next">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                    <g>
                        <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z" />
                        <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z" />
                    </g>
                    </g>
                </svg>
            </div>
        </div><!-- End // .directional_nav -->

       <!-- _______________ -->
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>
    // __________________________show preview
    function showPreview(image_1,image_2,image_3){
      console.log(image_1,image_2,image_3);
      document.getElementById("slider1").src = image_1;
      document.getElementById("slider2").src = image_2;
      document.getElementById("slider3").src = image_3;

      document.getElementById("preview_section").style.display="flex";
    }
    // __________________________close preview
    function closePreview(image_1,image_2,image_3){

      document.getElementById("preview_section").style.display="none";
    }



    $('.slider').each(function() {
      var $this = $(this);
      var $group = $this.find('.slide_group');
      var $slides = $this.find('.slide');
      var bulletArray = [];
      var currentIndex = 0;
      var timeout;

      function move(newIndex) {
        var animateLeft, slideLeft;
        advance();
        if ($group.is(':animated') || currentIndex === newIndex) {
          return;
        }
        bulletArray[currentIndex].removeClass('active');
        bulletArray[newIndex].addClass('active');
        if (newIndex > currentIndex) {
          slideLeft = '100%';
          animateLeft = '-100%';
        } else {
          slideLeft = '-100%';
          animateLeft = '100%';
        }
        $slides.eq(newIndex).css({
          display: 'block',
          left: slideLeft
        });
        $group.animate({
          left: animateLeft
        }, function() {
          $slides.eq(currentIndex).css({
            display: 'none'
          });
          $slides.eq(newIndex).css({
            left: 0
          });
          $group.css({
            left: 0
          });
          currentIndex = newIndex;
        });
      }

      function advance() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
          if (currentIndex < ($slides.length - 1)) {
            move(currentIndex + 1);
          } else {
            move(0);
          }
        }, 4000);
      }
      $('.next_btn').on('click', function() {
        if (currentIndex < ($slides.length - 1)) {
          move(currentIndex + 1);
        } else {
          move(0);
        }
      });
      $('.previous_btn').on('click', function() {
        if (currentIndex !== 0) {
          move(currentIndex - 1);
        } else {
          move(3);
        }
      });
      $.each($slides, function(index) {
        var $button = $('<a class="slide_btn">&bull;</a>');
        if (index === currentIndex) {
          $button.addClass('active');
        }
        $button.on('click', function() {
          move(index);
        }).appendTo('.slide_buttons');
        bulletArray.push($button);
      });
      advance();
    });
  </script>


        </div>
      </div>

  </section>

  @endsection
  @push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>

        $( '.select2' ).select2( {
            theme: 'bootstrap-5',
            'placeholder': 'Select Your Services'
        } );

        // Show Order data
        // $('.showOrderData').click(function(event) {

        //     var orderId = $(this).data("id"); // Retrieve the data-id

        //     $.ajax({
        //         url: '/affiliate/digital-service/' + orderId + '/show',
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(res) {
        //             //Populate Organization Information
        //             $('#creator_name').text(res.name || 'N/A');
        //                 const date = new Date(res.created_at);
        //                 const formattedDate = date.toLocaleDateString('en-US', {
        //                     weekday: 'long',
        //                     year: 'numeric',
        //                     month: 'long',
        //                     day: 'numeric'
        //                 });
        //             $('#insert_date').text(formattedDate)
        //             $('#name').text(res.name || 'N/A');
        //             $('#email').text(res.email || 'N/A');
        //             $('#phone').text(res.phone || 'N/A');
        //             $('#profession').text(res.profession || 'N/A');
        //             $('#institute').text(res.institute  || 'N/A');
        //             $('#gender').text(res.gender  || 'N/A');

        //             let interests = res.interests ? JSON.parse(res.interests) : [];
        //             if (interests.length > 0) {
        //                 let badges = interests.map(interest => `<span class="badge bg-primary me-1">${interest}</span>`).join('');
        //                 $('#interests').html(badges);
        //             } else {
        //                 $('#interests').text('N/A');
        //             }

        //             $('#division').text(res.division  || 'N/A');
        //             $('#district').text(res.district  || 'N/A');
        //             $('#address').text(res.address  || 'N/A');
        //             $('#convertAffiliator').data('id', res.id || 'N/A'); // Updates the jQuery data cache

        //             // Show the modal
        //             const modal = new bootstrap.Modal(document.getElementById('bootcampViewModla'));
        //             modal.show();
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(xhr.responseText);
        //         }
        //     });
        // });

    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
        });
    </script>
    @endif


@endpush
