@foreach($available_locales as $available_locale)
@if($available_locale === $current_locale)
<li class="nav-item switcher">
    <a class="nav-link" href="#">{{ $available_locale }}</a>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/language/{{ $available_locale }}">
        <span>{{ $available_locale }}</span>
    </a>
</li>
@endif
@endforeach
</li>

<style>
    .switcher {
        background-color: #e8e8e8;
    }
</style>
