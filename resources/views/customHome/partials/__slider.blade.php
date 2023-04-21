@isset($slider)
    <section class="slider mt-lg-5 mt-sm-80 mb-80">
        <div class="container">
            <div class="swiffy-slider slider-indicators-round slider-nav-mousedrag slider-item-ratio
            slider-item-ratio-21x9 slider-nav-animation
            slider-nav-autoplay slider-nav-animation-fadein"
                id="swiffy-animation">
                <ul class="slider-container" id="container1">
                    @if (isset($slider->slider_image_a))
                        <li id="slide0" class="">
                            <img src="{{ $slider->slider_image_a }}" alt="..." loading="lazy">
                        </li>
                    @endif

                    @if (isset($slider->slider_image_b))
                        <li id="slide1" class="">
                            <img src="{{ $slider->slider_image_b }}" alt="..." loading="lazy">
                        </li>
                    @endif
                    
                    @if (isset($slider->slider_image_c))
                        <li id="slide2" class="">
                            <img src="{{ $slider->slider_image_c }}" alt="..." loading="lazy">
                        </li>
                    @endif
                    
                    @if (isset($slider->slider_image_d))
                        <li id="slide3" class="">
                            <img src="{{ $slider->slider_image_d }}" alt="..." loading="lazy">
                        </li>
                    @endif
                    
                    @if (isset($slider->slider_image_e))
                        <li id="slide4" class="">
                            <img src="{{ $slider->slider_image_e }}" alt="..." loading="lazy">
                        </li>
                    @endif
                </ul>
                <button type="button" class="slider-nav" aria-label="Go to
                previous"></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
                <div class="slider-indicators">
                    <button aria-label="Go to slide" class=""></button>
                    <button aria-label="Go to slide" class=""></button>
                    <button aria-label="Go to slide" class=""></button>
                    <button aria-label="Go to slide" class=""></button>
                    <button aria-label="Go to slide" class=""></button>
                </div>
            </div>
        </div>
    </section>
@endisset
