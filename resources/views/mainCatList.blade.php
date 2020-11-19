<ul class="nav-links__list" >
    <li class="nav-links__item" style="margin-right: 15px;">
        <a href="{{URL::to('/')}}" class="indicator__button">
            <span class="indicator__area" style="height: 73px;">
                <svg width="25px" height="25px">
                    <use xlink:href="{{asset('public/images/sprite.svg#icon-home')}}"></use>
                </svg>
            </span>
        </a>
    </li>
    @php ($i = 0)
    @foreach($categories as $cat)
        @if($i < 13)
            <li class="nav-links__item">
                <a class="nav-links__item-link" href="{{URL::to('/')}}/product/{{$cat['Id']}}">
                    <div class="nav-links__item-body">
                        {{ucwords(strtolower($cat['Name']))}}
                    </div>
                </a>
            </li>
        @endif
        @php ($i++)
    @endforeach
</ul>
