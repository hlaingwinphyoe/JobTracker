<li class="nav-item">
    <a class="nav-link {{ request()->url() == $link ? 'active' : '' }}" href="{{ $link }}">
        {{ $title }}
    </a>
</li>
