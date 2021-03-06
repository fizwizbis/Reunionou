<div class="column is-3">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img alt="" src="https://placehold.it/300x225">
            </figure>
        </div>
        <div class="card-content">
            <div class="content">
                <span class="tag is-dark subtitle">{{ $event->title }}</span>
                <p>{{ $event->description }}</p>
            </div>
        </div>
        <footer class="card-footer">
            <a href="{{ route('event.detail', $event) }}" class="card-footer-item card-footer-item-hoover">Details</a>
            @if($event->isAuthor())
                <a href="{{ route('event.manage', $event) }}" class="card-footer-item card-footer-item-hoover">Manage</a>
            @endif
        </footer>
    </div>
    <br>
</div>
