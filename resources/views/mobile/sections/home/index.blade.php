@extends('mobile.layouts.master')

@section('title', 'doanluatsudanang')

@section('contents')

@foreach ($categories as $category)
@php ($posts = $category->posts->sortByDesc('published_at')->take(3))
@continue($posts->count() <= 0)
<div class="news_column">
	<div class="panel panel-default clearfix">
		<div class="panel-heading">
			<ul class="list-inline pull-left" style="margin: 0">
				<li>
                    <h2>
                        <a title="{{ $category->name }}" href="{{ route('category.posts.get', ['category' => $category]) }}">
                            <span>{{ $category->name }}</span>
                        </a>
                    </h2>
                </li>
			</ul>
			<div class="clearfix"></div>
		</div>

		<div class="panel-body">
			<div class="row">
                @php($first_post = $posts->shift())
                @php($post_url = route('post.detail', ['category' => $category, 'post' => $first_post]))
				<div class="{{ $posts->count() > 0 ? 'col-md-16' : 'col-md-24' }}">
                    <a title="{{ $first_post->title }}" href="{{ $post_url }}">
                        @if ($first_post->thumbnail)
                        <img src="{{ $first_post->thumbnail }}" alt="{{ $first_post->title }}" width="60" 
                        class="img-thumbnail pull-left imghome"></a>
                        @else
                        <img src="{{ asset('images/placeholders/placeholder.png') }}" alt="" width="60" 
                        class="img-thumbnail pull-left imghome"></a>
                        @endif
                    </a>
					<h3>
						<a title="{{ $first_post->title }}" href="{{ $post_url }}">{{ $first_post->title }}</a>
					</h3>
					<div class="text-muted">
						<ul class="list-unstyled list-inline">
							<li><em class="fa fa-clock-o">&nbsp;</em> {{ $first_post->published_at->format('d/m/Y H:i') }}</li>
							<li><em class="fa fa-eye">&nbsp;</em> {{ $first_post->view_count }}</li>
							<li><em class="fa fa-comment-o">&nbsp;</em> 0</li>
						</ul>
					</div>
                    {{ $first_post->description }}
				</div>

                @if ($posts->count() > 0)
                <div class="col-md-8">
                    <ul class="related">
                        @foreach ($posts as $post)
                        <li class="icon_list">
                            <a class="show" href="{{ route('post.detail', ['category' => $category, 'post' => $post]) }}" 
                            title="{{ $post->title }}" data-rel="tooltip" data-placement="bottom">
                                {{ $post->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection