<section class="footer">
    <div class="row justify-content-center">


        <div class="col-md-6">
            <span class="primary-color title">Social Media</span>
            <br><br>
            <ul class="list-unstyled titre col-link">
                <li><a href="mailto:contact@ihelp.com?Subject=إستفسار" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        E-mail
                    </a>
                </li>
                <li><a href="https://www.facebook.com/ihelp/"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</a></li>
                <li><a href="{{url('contact')}}"><i class="fa  fa-home" aria-hidden="true"></i>Contact</a></li>
                <div class="social-icons social-body">
                    <a data-tracker="FACEBOOK" class="facebook " target="_blank" rel="noopener"
                       href="https://www.facebook.com/ihelp/">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="youtubeIcon" href="#"
                       target="_blank" rel="noopener">
                        <i class="fa fa-youtube"></i>
                    </a>

                </div>
            </ul>
        </div>
        <div class="col-md-6">
            <span class="primary-color title">Our News</span>
            <br><br>
            <form action="{{url('addEmail')}}" method="post">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button  class="btn btn-outline-primary" type="submit">
                            save
                        </button>
                    </div>
                    <input type="email" class="form-control" placeholder="email@example.com" aria-label=""
                           aria-describedby="basic-addon1" required>
                </div>
            </form>
        </div>
        <div class="col-md-12  text-center">
            <p class="titre-footer"> copyright:<a href="{{'/'}}">iHelp</a></p>
        </div>
    </div>
</section>
