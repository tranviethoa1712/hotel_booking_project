<footer>
    <div class="footer">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{ __('home.contact.title') }}</h3>
                <ul class="conta">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{__('home.footer.address')}}</li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                    <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>{{__('home.footer.title_menu_link')}}</h3>
                <ul class="link_menu">
                    <li class=" {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{url('/')}}">{{__('home.header.home')}}</a>
                    </li>
                    <li class=" {{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{url('about')}}">{{__('home.header.about')}}</a>
                    </li>
                    <li class=" {{ Request::is('our_rooms') ? 'active' : '' }}">
                        <a href="{{url('our_rooms')}}">{{__('home.header.our_room')}}</a>
                    </li>
                    <li class=" {{ Request::is('our_galleries') ? 'active' : '' }}">
                        <a href="{{url('our_galleries')}}">{{__('home.header.gallery')}}</a>
                    </li>
                    <li class=" {{ Request::is('contact_view') ? 'active' : '' }}">
                        <a href="{{url('contact_view')}}">{{__('home.header.contact')}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>{{__('home.footer.news_letter.title')}}</h3>
                <form class="bottom_form">
                    <input class="enter" placeholder="{{__('home.footer.news_letter.placeholder')}}" type="text" name="Enter your email">
                    <button class="sub_btn">{{__('home.footer.news_letter.submit')}}</button>
                </form>
                <ul class="social_icon">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    
                    <p>
                    © 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
                    <br><br>
                    Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                    </p>

                </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>