
@extends('quick_digital.layout.layout')
@section('content')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script> 


<!-- __________________ BANNER SECTION START -->
<section class="banner_section">
    <div class="banner_center">
        <h3>আমাদের সাথে যোগাযোগ করুন</h3>
        <p>নিচের দেওয়া মোবাইল নাম্বার, হোয়াটস-এপ, ই-মেইল কিংবা আমাদের ঠিকানায়</p>
    </div>
</section>
<!-- __________________ BANNER SECTION END -->

<section class="contact-page-sec">
  <div class="container">
    <div class="row card_section">

      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 11.75 7 11.75S19 14.25 19 9c0-3.87-3.13-7-7-7zm0 10.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
                </svg>
            </div>
            <div class="contact-info-text">
              <h2>ঠিকানা</h2>
              <span>বাড়িঃ ৪১৭, রোডঃ ৭, বারিধারা ডি.ও.এইচ.এস</span>
              <span>ঢাকা, বাংলাদেশ</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <rect x="3" y="5" width="18" height="14" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3 6l9 6 9-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            </div>
            <div class="contact-info-text">
              <h2>ই-মেইল</h2>
              <a class="" href="mailto:quickdigital121@gmail.com">
                <span>quickdigital121@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 5a2 2 0 012-2h2.6a1 1 0 01.95.68l1.2 3a1 1 0 01-.27 1.09L8 9.5a11 11 0 005.5 5.5l1.73-1.48a1 1 0 011.09-.27l3 1.2a1 1 0 01.68.95V19a2 2 0 01-2 2h-1c-8.84 0-16-7.16-16-16V5z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </div>
            <div class="contact-info-text">
              <h2>কল করুন</h2>
              <a href="tel:01973784959">
                <span>01973784959</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="contact-page-form" method="post">
          <h2>যোগাযোগ করুন</h2>
          <form action="contact-mail.php" method="post">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="single-input-field">
                  <input type="text" placeholder="আপনার নাম" name="name" />
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="single-input-field">
                  <input type="email" placeholder="ই-মেইল" name="email" required />
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="single-input-field">
                  <input type="text" placeholder="মোবাইল নম্বর" name="phone" />
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="single-input-field">
                  <input type="text" placeholder="বিষয়" name="subject" />
                </div>
              </div>
              <div class="col-md-12 message-input">
                <div class="single-input-field">
                  <textarea placeholder="আপনার মেসেজ লিখুন" name="message"></textarea>
                </div>
              </div>
              <div class="single-input-fieldsbtn">
                <input type="submit" value="সেন্ড করুন" />
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-page-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.13624734576308!2d90.41317409999999!3d23.812199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70045a24763%3A0x67e9cca244b37c2f!2sQuick%20Digital!5e0!3m2!1sen!2sbd!4v1734868883817!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection