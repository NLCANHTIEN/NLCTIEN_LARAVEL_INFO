<div class="well np">
    <div id="myCarousel" class="carousel slide homCar">
        <div class="carousel-inner">
            @foreach($images as $image)
            @if ($loop->first)
            <div class="item active">
                @else
                <div class="item">
                    @endif
                    <img style="width:100%" src="/upload/images/{{$image->image}}" alt="bootstrap ecommerce templates">
                    <div class="carousel-caption">
                        <h4></h4>
                        <p><span></span></p>
                    </div>
                </div>
                @endforeach


            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>