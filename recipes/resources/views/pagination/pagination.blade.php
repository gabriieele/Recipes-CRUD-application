
<ul class="pagination justify-content-center my-4">
    <li class="page-item me-2 {{ $recipes->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $recipes->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a>
    </li>

    @for ($i = 1; $i <= $recipes->lastPage(); $i++)
        <li class="page-item me-2 {{ $recipes->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link" href="{{ $recipes->url($i) }}{{ isset($keyword) ? '&q=' . $keyword : '' }}">{{ $i }}</a>
        </li>
    @endfor

    <li class="page-item {{ $recipes->currentPage() == $recipes->lastPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $recipes->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a>
    </li>
</ul>