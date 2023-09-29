<div class="span2">

    <h5>Your Account</h5>
    @foreach($links as $link)
    <a href="/pages/{$link->slug}">{{$link->title}}</a><br>
    @endforeach
</div>