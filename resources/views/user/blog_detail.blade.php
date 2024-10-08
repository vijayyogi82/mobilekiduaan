@extends('layouts.app')
@section('content')
<main>
    <section class="ftco-section">
        <div class="container">
            <div class="row my-4">
                @if(isset($blog))
                <div class="col-12 my-4">
                    @if($blog->image)
                    <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title" style="font-weight: 200; font-size: 2rem;">{!!$blog->title ?? ''!!}</h1>
                        <p class="card-text">
                            {!!$blog->description ?? ''!!}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                Last updated
                                {{ $blog->updated_at ? $blog->updated_at->diffForHumans() : ''}}
                            </small>
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    &nbsp;
</main>

@endsection