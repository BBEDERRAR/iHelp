<button class="btn btn-primary btn-block " onclick="nav()" id="right-menu-btn">
    <i class="fa fa-list" aria-hidden="true"></i>
</button>
<div class="right-menu">
    <div class="card card-1 panel panel-default p-2" style="min-height: 300px">
        <div class="panel-body text-center">
            <h3 class="btn btn-danger btn-block">تابعنا عبر الفيسبوك</h3>
            <hr>
            <div class="fb-page"
                 data-href="https://www.facebook.com/وجهني-موقع-التوجيه-الجامعي-الأول-في-الجزائر-2008550396077363"
                 data-width="380"
                 data-hide-cover="false"
                 data-show-facepile="false"></div>
            <br>
            <hr>
            <div class="fb-share-button center-block" data-href="http://www.wejehni.com" data-layout="button_count" data-size="large"
                 data-mobile-iframe="true"><a target="_blank"
                                              href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.wejehni.com%2F&amp;src=sdkpreparse"
                                              class="fb-xfbml-parse-ignore"></a></div>
        </div>

        <br>

        <h3 class="btn btn-danger btn-block">الأكثر قراءة</h3>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                   aria-controls="home"
                   aria-selected="true"> الأسبوع</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false"> الشهر</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">الكل</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-1" id="home" role="tabpanel" aria-labelledby="home-tab">
                @foreach(Counter::mostViews('article',8,6) as $art)
                    <div class="row m-0">
                        <div class="col-md-4 p-0 post-thumb justify-content-center align-items-center">
                            <img class="img img-responsive" style="width: 100%"
                                 src="{{asset('articles_img/'.$art->img)}}" alt="{{$art->title}}">
                        </div>
                        <div class="col-md-8 p-1 text-center">
                            <a href="{{url('article/'.str_replace(' ','-',$art->title).'/'.$art->id)}}">{{$art->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="tab-pane fade pt-1" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @foreach(Counter::mostViews('article',31,6) as $art)
                    <div class="row m-0">
                        <div class="col-md-4 p-0 post-thumb justify-content-center align-items-center">
                            <img class="img img-responsive" style="width: 100%"
                                 src="{{asset('articles_img/'.$art->img)}}" alt="{{$art->title}}">
                        </div>
                        <div class="col-md-8 p-1 text-center">
                            <a href="{{url('article/'.str_replace(' ','-',$art->title).'/'.$art->id)}}">{{$art->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="tab-pane fade pt-1" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                @foreach(Counter::mostViews('article',NULL,6) as $art)
                    <div class="row m-0">
                        <div class="col-md-4 p-0 post-thumb justify-content-center align-items-center">
                            <img class="img img-responsive" style="width: 100%"
                                 src="{{asset('articles_img/'.$art->img)}}" alt="{{$art->title}}">
                        </div>
                        <div class="col-md-8 p-1 text-center">
                            <a href="{{url('article/'.str_replace(' ','-',$art->title).'/'.$art->id)}}">{{$art->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <h3 class="btn btn-danger btn-block">الأسئلة الشائعة</h3>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="question-week-tab" data-toggle="tab" href="#question-week"
                   role="tab"
                   aria-controls="home"
                   aria-selected="true"> الأسبوع</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="question-month-tab" data-toggle="tab" href="#question-month" role="tab"
                   aria-controls="profile" aria-selected="false"> الشهر</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="question-all-tab" data-toggle="tab" href="#question-all" role="tab"
                   aria-controls="contact" aria-selected="false">الكل</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-1" id="question-week" role="tabpanel"
                 aria-labelledby="home-tab">
                @foreach(Counter::mostViews('question',7,6) as $question)
                    <div class="row m-0">
                        <div class="col-md-12 p-1 text-center">
                            <a href="{{url('question/'.$question->title.'/'.$question->id)}}">{{$question->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="tab-pane fade pt-1" id="question-month" role="tabpanel" aria-labelledby="profile-tab">
                @foreach(Counter::mostViews('question',30,6) as $question)
                    <div class="row m-0">
                        <div class="col-md-12 p-1 text-center">
                            <a href="{{url('question/'.$question->title.'/'.$question->id)}}">{{$question->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="tab-pane fade pt-1" id="question-all" role="tabpanel" aria-labelledby="contact-tab">
                @foreach(Counter::mostViews('question',null,6) as $question)
                    <div class="row m-0">
                        <div class="col-md-12 p-1 text-center">
                            <a href="{{url('question/'.$question->title.'/'.$question->id)}}">{{$question->title}}</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<script data-cfasync='false' type='text/javascript'
        src='//p280135.clksite.com/adServe/banners?tid=280135_542258_2&type=slider&size=26'></script>
