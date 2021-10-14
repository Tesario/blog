<div class="with-filter">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ isset($title) ? str_replace(' | ', ' ', $title) : 'All' }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item" wire:click.prevent="changeCategory({{ $category->id }})"
                        href="#">{{ $category->name }}</a>
                </li>
            @endforeach
            @if (isset($title))
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" wire:click.prevent="changeCategory()" href="#">All</a>
                </li>
            @endif
        </ul>
    </div>
    <div>
        <div class="posts-wrapper">
            @forelse ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <div class="post-header d-flex align-items-end">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <span>&nbsp;/ {{ $post->created_at }}</span>
                        </div>
                        <p class="card-text mb-3">
                            {!! $post->text !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-end">
                            <a href="{{ url('post', $post->id) }}" class="btn btn-primary">Read more</a>
                            <a wire:click.prevent="changeCategory({{ $post->category->id }})" href="#">-
                                {{ $post->category->name }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="message">Nothing found</div>
            @endforelse
        </div>
        @if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{ $posts->links('pagination') }}
        @endif
    </div>
</div>
