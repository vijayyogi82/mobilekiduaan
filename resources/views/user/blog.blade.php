@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? url()->current())

@section('content')
<main>
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h1 style="font-weight: 200; font-size: 2rem;"><b>Blog</b></h1>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row my-4">
                @if(isset($blogs))
                    @foreach($blogs as  $blog)
                    <div class="col-md-4 my-4">
                        <div class="card" style="width: 18rem; height: 100%;">
                            @if($blog->image)
                                <a href="{{ route('user.blog.detail', ['title' => Str::slug($blog->title), 'id' => $blog->id]) }}" class="text-dark" style="text-decoration: none;">
                                    <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image cap">
                                </a>
                            @endif
                            <div class="card-body">
                                <h2 class="card-title" style="font-size: 20px;">
                                    <a href="{{ route('user.blog.detail', ['title' => Str::slug($blog->title), 'id' => $blog->id]) }}" class="text-dark" style="text-decoration: none;">
                                        {!!$blog->title ?? ''!!}
                                    </a>
                                </h2>
                                <p class="card-text">
                                    {!!$blog->description ? Str::limit($blog->description, 300) : ''!!} <br>
                                        <a href="{{ route('user.blog.detail', ['title' => Str::slug($blog->title), 'id' => $blog->id]) }}">Show more</a>
                                    </p>
                                <p class="card-text"><small class="text-muted">Last updated {{ $blog->updated_at ? $blog->updated_at->diffForHumans() : ''}}
                                </small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    &nbsp;
</main>

@endsection