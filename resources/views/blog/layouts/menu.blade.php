<nav class="menu-desktop menu-sticky" style="background: #c1c5c7;border-radius: 0">

    <ul class="tada-menu">
        @foreach ($category as $value)
        @if (count($value->kind)>0)
        <li>
            <a style="padding: 30px 0px 30px 20px;" href="#">
                {{$value->title}}
                <i class="icon-arrow-down8"></i>
            </a>
            <ul class="submenu">
                @foreach ($value->kind as $value)
                <li>
                    <a href="{{ asset('') }}blog/kind/{{$value->id}}/{{$value->thumbnail}}.html">
                        {{$value->title}}
                    </a>
                </li>
                @endforeach

            </ul>
        </li>
        @endif
        @endforeach
    </ul>        
</nav>