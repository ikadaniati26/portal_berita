 <!-- Start Youtube -->
 <div class="youtube-area video-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="video-items-active">
                    @foreach ($berita_video as $item)
                        <div class="video-items text-center">
                            <iframe src="{{$item->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="video-info">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-caption">
                        <div class="top-caption">
                            <span class="color1">Politics</span>
                        </div>
                        <div class="bottom-caption">
                            <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testmonial-nav text-center">
                        @foreach ($berita_video as $item)
                        <div class="single-video">
                            <iframe  src="{{$item->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>{{$item->judul}}</h4>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="single-video">
                            <iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
<div id="category"></div>

    </div>
</div> 
<!-- End Start youtube -->