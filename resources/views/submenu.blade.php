@if ((count($menu->children) > 0) AND ($menu->parent_id > 0))
<li class="nav-item dropdown">
    <a href="{{ url($menu->route) }}" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
        {{ $menu->title }}
        @if(count($menu->children) > 0) 
            <i class="fa fa-caret-right"></i>
        @endif
    </a>
    @else
<li class="nav-item @if($menu->parent_id === 0 && count($menu->children) > 0) dropdown @endif">
    <a href="{{ url($menu->route) }}" 
        class="nav-link @if(count($menu->children) > 0) dropdown-toggle @endif" @if(count($menu->children) > 0) data-bs-toggle="dropdown" @endif>
        {{ $menu->title }}
        @if(count($menu->children) > 0) 
            <i class="fa fa-caret-down"></i>
        @endif
    </a>
    @endif
    @if (count($menu->children) > 0)
        <ul class="@if($menu->parent_id !== 0 && (count($menu->children) > 0)) submenu @endif dropdown-menu" aria-labelledby="dropdownBtn">
            @foreach($menu->children as $menu)
            @include('submenu', $menu)
            @endforeach
        </ul>
    @endif
</li>