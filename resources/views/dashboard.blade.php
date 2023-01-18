<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>1 レビューを書いたリストの表示</h2>
                <a href="{{ route('dashboard.reviews') }}">レビューを書いたリストの表示</a>
                <h2>2 お気に入りリストの表示</h2>
                <a href="{{ route('dashboard.goods') }}">お気に入りリストの表示</a>
                <h2>3 投稿したスレッドの表示</h2>
            </div>
        </div>
    </div>
</x-app-layout>