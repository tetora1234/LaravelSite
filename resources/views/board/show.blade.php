<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mx-3 my-1">
                    <div class="flex">
                        <img src="http://localhost/storage/profile-photos/69vk0ZgZ3GVJTP1Zm5rQ7R3iENZbAcESrK98Fu6j.jpg"
                            style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p class="h2">{!! nl2br(e(Str::limit($board->title, 15, '...'))) !!}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p><i class="fa-solid fa-user"></i>{{ $board->user->name }}　　<i
                                            class="fa-solid fa-clock"></i>{{
                                        $board->user->created_at }}　　<i class="fa-solid fa-comment"></i>0　　<i
                                            class="fa-solid fa-bookmark"></i></i>議論
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>{{ $board->text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="d-inline-flex">
                                    <p class="border rounded px-1 py-1 bg-light mx-1"><i
                                            class="fa-solid fa-tag"></i>登録タグ</p>
                                </div>
                                <div class="d-inline-flex">
                                    <p class="border rounded-start px-1 py-1"><i class="fa-solid fa-heart"
                                            style="color: #E9546B;"></i>
                                    </p>
                                    <p class="border rounded-end px-1 py-1 bg-light">タグ1</p>
                                </div>
                                <div class="d-inline-flex">
                                    <p class="border rounded-start px-1 py-1"><i class="fa-solid fa-heart"
                                            style="color: #E9546B;"></i>
                                    </p>
                                    <p class="border rounded-end px-1 py-1 bg-light">タグ2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-app-layout>