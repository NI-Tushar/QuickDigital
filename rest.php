                        @foreach ($software as $soft)
                            <div class="slide">
                                <div class="slide_part img_part">
                                    <img src="{{ $soft->thumbnail ? asset($soft->thumbnail) : asset('no_image2.jpg') }}" alt="">
                                </div>
                                <div class="slide_part desc_part">
                                    <div class="soft_desc">
                                        <h3>{{ $soft->title }}</h3>
                                        <p>{{ $soft->description }}</p>
                                        <div class="review">
                                            <div class="star">★★★★☆</div>
                                            <p>(Reviews)</p>
                                        </div>
                                        <div class="price_section">
                                            <div class="left"><a href="!"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a></div>
                                            <div class="right">{{ $soft->price }}<span>/মাসিক</span></div>
                                        </div>
                                        <div class="button_section">
                                            <a href="!">কাস্টম</a>
                                            <a href="!" class="active">কিনুন</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach                            





                                                    
                        <!-- _________________________ -->
                        @foreach ($digProd as $prod)
                            <div class="digProd_slide">
                                <div class="slide_part img_part">
                                    <img src="{{ $prod->thumbnail ? asset($prod->thumbnail) : asset('no_image2.jpg') }}" alt="">
                                </div>
                                <div class="slide_part desc_part">
                                    <div class="soft_desc">
                                        <h3>{{ $prod->title }}</h3>
                                        <!-- <p>A Tourism Management System is a comprehensive platform designed to streamline the operations</p> -->
                                        <div class="details">
                                            <a href="!"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a>
                                        </div>

                                        <div class="price_section">
                                            <div class="left">On Sell</div>
                                            <div class="right">{{ $prod->price }}<span> BDT</span></div>
                                        </div>
                                        <div class="button_section">
                                            <!-- <a href="!">কাস্টম</a> -->
                                            <a href="!" class="active">কিনুন</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach