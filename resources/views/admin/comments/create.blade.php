@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/admin/comments" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="user">Author</label>
                        <select name="user" class="form-control">
                            <option value="" selected disabled >Select author...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->profile->firstname." ".$user->profile->lastname }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user'))
                            <span class="text-danger">{{ $errors->get('user')[0] }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="post">Post</label>
                        <select name="post" class="form-control">
                            <option value="" selected disabled >Select post...</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('post'))
                            <span class="text-danger">{{ $errors->get('post')[0] }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="postcontent">Comment</label>
                        <textarea name="comment" id="comment" class="form-control">{{ old('comment') }}</textarea>
                        @if($errors->has('comment'))
                            <span class="text-danger">{{ $errors->get('comment')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <select name="published" class="form-control">
                            <option value="" selected disabled >Is it published...</option>
                            <option value="0">Not published</option>
                            <option value="1">Published</option>
                        </select>
                        @if($errors->has('published'))
                            <span class="text-danger">{{ $errors->get('published')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Save comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

