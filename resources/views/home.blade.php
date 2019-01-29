@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach (App\Models\Tenant\Blog::all() as $item)
                       <p> {{ $item->title }}</p>
                    @endforeach
                    <form method="POST" action="/blog">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" placeholder="Enter your title">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body" placeholder="Enter your title"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
