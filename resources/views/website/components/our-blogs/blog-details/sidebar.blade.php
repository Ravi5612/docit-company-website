<div class="col-lg-4 widget-area sidebar-right">
    @php
        $blogsgrid = App\Models\Blog::where('status', 'active')->latest()->get();
    @endphp

    <aside class="widget widget-recent-post with-title">
        <h3 class="widget-title">Trending Posts</h3>
        <ul class="widget-post cmt-recent-post-list">
            @forelse($blogsgrid as $blogs)
                <li>
                    <div class="post-detail">
                        <span class="post-date"><i class="icon-calendar"></i>{{ date('d', strtotime($blogs->date)) }}
                            <span class="month">
                                {{ date('F', strtotime($blogs->date)) }}
                            </span></span>
                        <a
                            href="{{ route('blog-details', $blogs->slug) }}">{{ \Illuminate\Support\Str::limit($blogs->title ?? 'No description found yet', 30) }}</a>
                    </div>
                </li>
            @empty
                <p> No Blog Found</p>
            @endforelse


        </ul>
    </aside>

</div>