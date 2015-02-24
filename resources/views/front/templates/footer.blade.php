<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="newsletter">
                    <h4>Newsletter</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.
                    </p>
                    <form method="POST" action="#" id="newsletterForm">
                        <div class="input-group">
                            <input type="text" id="email" name="email" placeholder="Email Address" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    Go!
                                </button> </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Latest Tweet</h4>
                <div class="twitter" id="tweet">
                    <i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.
                    <a href="#" class="time">
                        12 Dec
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-details">
                    <h4>Contact Us</h4>
                    <ul class="contact">
                        <li>
                            <p>
                                <i class="fa fa-map-marker"></i><strong>Alamat:</strong> Jalan Raya Bengkak, Wongsorejo-Banyuwangi.
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-phone"></i><strong>Phone:</strong> (0333) 510166
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-envelope"></i><strong>Email:</strong>
                                <a href=" info@sman1-wongsorejo.com">
                                    info@sman1-wongsorejo.com
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <ul>
                        <li class="social-twitter tooltips" data-original-title="Twitter" data-placement="bottom">
                            <a target="_blank" href="http://www.twitter.com">
                                Twitter
                            </a>
                        </li>
                        <li class="social-facebook tooltips" data-original-title="Facebook" data-placement="bottom">
                            <a target="_blank" href="http://facebook.com" data-original-title="Facebook">
                                Facebook
                            </a>
                        </li>
                        <li class="social-linkedin tooltips" data-original-title="LinkedIn" data-placement="bottom">
                            <a target="_blank" href="http://linkedin.com" data-original-title="LinkedIn">
                                LinkedIn
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <a class="logo" href="{{url()}}">
                        SMAN1
                    </a>
                </div>
                <div class="col-md-7">
                    <p>
                        &copy; Copyright 2014 by Wasi Arnosa. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-4">
                    <nav id="sub-menu">
                        <ul>
                            <li>
                                <a href="{{url('berita')}}">
                                    Berita
                                </a>
                            </li>
                            <li>
                                <a href="{{url('galeri')}}">
                                    Galeri
                                </a>
                            </li>
                            <li>
                                <a href="{{url('agenda')}}">
                                    Agenda
                                </a>
                            </li>
                            <li>
                                <a href="{{url('download')}}">
                                    Download
                                </a>
                            </li>
                            <li>
                                @if(!Auth::check())
                                <a href="{{url('login')}}">
                                    Login
                                </a>
                                @else
                                <a href="{{url('logout')}}">
                                    Logout
                                </a>
                                @endif
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>