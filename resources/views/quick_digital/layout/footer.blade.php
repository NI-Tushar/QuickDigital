<link rel="stylesheet" href="{{ url('front/styles/footer.css') }}">

<footer class="bg-black text-white py-5">
    <div class="container max-width custom-padding">
        <div class="row justify-content-between">

            <div class="col-12 col-lg-3 footer-elements">
                <div class="footer-logo-container d-flex justify-content-start">
                    <img class="footer-logo" src="{{ asset('front/assets/images/primary_logo2.png') }}" alt="logo">
                </div>
                <p class="footer-text py-3">
                    যে কোনো প্রশ্ন বা কোনো তথ্য জানতে আমাদের কল কিংবা এসএমএস করুন এই নম্বরে
                    <span style="color: #ffffff;">
                        <a class="text-decoration-none" style="color: #ffffff;" href="tel:01973784959">০১৯৭৩৭৮৪৯৫৯</a>
                    </span>(সকাল ১০টা – রাত ১০টা)
                    অথবা ইমেইল করুন এই এড্রেসে 
                    <span style="color: #ffffff;">
                        <a class="text-decoration-none" style="color: #ffffff;" href="mailto:quickdigital121@gmail.com">quickdigital121@gmail.com</a>
                    </span>
                </p>
            </div>

            <div class="col-12 col-lg-3 footer-elements">
                <h5 class="text-white fs-4 text-start">কোম্পানি</h5>
                <div class="pt-2 footer_link">
                    <a class="text-decoration-none footer-link" href="/#about">
                         আমাদের সম্পর্কে
                    </a>
                    <a class="text-decoration-none footer-link" href="{{ url('quick-digital/privacy-policy') }}">
                        প্রাইভেসি পলিসি 
                    </a>
                    <a class="text-decoration-none footer-link" href="{{ url('quick-digital/terms-condition') }}">
                        ব্যবহার শর্তাবলী
                    </a>
                    <a class="text-decoration-none footer-link" href="{{ url('quick-digital/refund-policy') }}">
                        রিফান্ড শর্তাবলী
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-3 footer-elements">
                <h5 class="text-white fs-4 text-start">নামাযের সময়</h5>
                <div class="iframe-prayer-container pt-2">
                    <iframe class="rounded" loading="lazy" src="https://timesprayer.com/widgets.php?frame=2&amp;lang=en&amp;name=dhaka&amp;avachang=true" style="border: none; overflow: hidden; width: 100%; height: 275px;" data-rocket-lazyload="fitvidscompatible" data-lazy-src="https://timesprayer.com/widgets.php?frame=2&amp;lang=en&amp;name=dhaka&amp;avachang=true" data-ll-status="loaded" class="entered lazyloaded" data-gtm-yt-inspected-181689027_68="true" data-gtm-yt-inspected-17="true"></iframe>
                </div>
            </div>
            
            <div class="col-12 col-lg-3 footer-elements">
                <h5 class="text-white fs-4 text-start">আমাদের ঠিকানা</h5>
                <p class="footer-text pt-2">
                    ঠিকানা: বারিধারা ডি.ও.এইচ.এস, ঢাকা, ১২০৬<br>মোবাইল নম্বর:
                    <span style="color: #ffffff;">
                        <a class="text-decoration-none" style="color: #ffffff;" href="tel:01973784959">০১৯৭৩৭৮৪৯৫৯</a>
                    </span><br>
                    ইমেইল:
                    <span style="color: #ffffff;">
                        <a class="text-decoration-none" style="color: #ffffff;" href="mailto:quickdigital121@gmail.com">quickdigital121@gmail.com</a>
                    </span><br>
                    ওয়েবসাইট:
                    <span style="color: #ffffff;">
                        <a class="text-decoration-none" style="color: #ffffff;" href="https://www.quickdigital.online">www.quickdigital.online</a>
                    </span>
                </p>
            </div>
        </div>
        <hr class="py-3">
        <div class="row justify-content-between" style="text-align:center;width:100%;">
            <div class="col-12 col-md-6 d-flex gap-5 social-links-top-left" style="text-align:center;width:100%;">
                <div class="text-center" style="text-align:center;width:100%;">
                    <p class="text-control-6 fw-medium" style="text-align:center;width:100%;">
                        Copyright &copy; <?php echo date("Y"); ?> - Quick Digital - All Rights Reserved.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex gap-5 social-links-top-right">
                <div class="">
                    <!-- <a class="d-flex align-items-center text-decoration-none text-white link-fb" href="https://www.facebook.com/quickdigital01973784939/">
                        {{-- <i aria-hidden="true" class="text-control-6 fs-6 fab fa-facebook"></i> --}}
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z"></path></svg>
                        <span class="text-control-6 fs-6 px-2">ফেসবুক পেজ</span>
                    </a> -->
                </div>
                <div class="">
                    <!-- <a class="d-flex align-items-center text-decoration-none text-white link-yt" href="https://www.youtube.com/@QuickkDigital">
                        {{-- <i aria-hidden="true" class="text-control-6 fs-6 fab fa-youtube"></i> --}}
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.2439 4C12.778 4.00294 14.1143 4.01586 15.5341 4.07273L16.0375 4.09468C17.467 4.16236 18.8953 4.27798 19.6037 4.4755C20.5486 4.74095 21.2913 5.5155 21.5423 6.49732C21.942 8.05641 21.992 11.0994 21.9982 11.8358L21.9991 11.9884L21.9991 11.9991C21.9991 11.9991 21.9991 12.0028 21.9991 12.0099L21.9982 12.1625C21.992 12.8989 21.942 15.9419 21.5423 17.501C21.2878 18.4864 20.5451 19.261 19.6037 19.5228C18.8953 19.7203 17.467 19.8359 16.0375 19.9036L15.5341 19.9255C14.1143 19.9824 12.778 19.9953 12.2439 19.9983L12.0095 19.9991L11.9991 19.9991C11.9991 19.9991 11.9956 19.9991 11.9887 19.9991L11.7545 19.9983C10.6241 19.9921 5.89772 19.941 4.39451 19.5228C3.4496 19.2573 2.70692 18.4828 2.45587 17.501C2.0562 15.9419 2.00624 12.8989 2 12.1625V11.8358C2.00624 11.0994 2.0562 8.05641 2.45587 6.49732C2.7104 5.51186 3.45308 4.73732 4.39451 4.4755C5.89772 4.05723 10.6241 4.00622 11.7545 4H12.2439ZM9.99911 8.49914V15.4991L15.9991 11.9991L9.99911 8.49914Z"></path></svg>
                        <span class="text-control-6 fs-6 px-2">ইউটিউব</span>
                    </a> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSTBQXZG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</footer>
