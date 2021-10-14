<div class="with-filter">
    <div>
        <div class="form-floating mb-3 user-search">
            <input type="text" wire:model="search" class="form-control" id="floatingInput" placeholder="Search">
            <label for="floatingInput">Search <i class="fas fa-search"></i></label>
        </div>
    </div>
    <div class="posts-wrapper">
        @forelse ($users as $user)
            <div class="card">
                <div class="card-body">
                    <div class="post-header d-flex align-items-end with-image">
                        <h3 class="card-title">
                            <a href="{{ url('user/' . $user->id . '/profile') }}">
                                {{ $user->name }}
                            </a>
                        </h3>
                    @empty(!$user->profile->image)
                        <div class="img-box">
                            <a href="{{ url('user/' . $user->id . '/profile') }}">
                                <img src="{{ url('storage', $user->profile->image) }}" alt="logo">
                            </a>
                        </div>
                    @endempty
                </div>
                <p class="card-text mb-3 show-all">
                <ul>
                    <li>Email: {{ $user->email }}</li>
                    <li>Articles: {{ $user->posts->count() }}</li>
                </ul>
                </p>
                <div class="d-flex justify-content-between align-items-end">
                    <a href="{{ url('user', $user->id) }}" class="btn btn-primary">User's articles</a>
                </div>
            </div>
        </div>
    @empty
        <div class="message">Nothing found</div>
    @endforelse
</div>
</div>
