<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-3 my-1">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($boards as $board)
                        <div class="col">
                            <div class="card h-100">
                                <a href="{{ route('board.show', $board->id) }}">
                                    <img src="http://localhost/storage/profile-photos/69vk0ZgZ3GVJTP1Zm5rQ7R3iENZbAcESrK98Fu6j.jpg"
                                        class="card-img-top" style="width: 400px; height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $board->title }}</h5>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $board->user->name }}さん</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-center m-2">
                    <div>{{ $boards->links() }}</div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>