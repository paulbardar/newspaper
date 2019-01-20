@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/admin/comments/{{ $comment->id }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="user">Author</label>
                        <select name="user" class="form-control">
                            <option value="" disabled >Select author...</option>
                            @foreach($users as $user)
                                <option @if($user->id == $comment->user_id) selected @endif value="{{ $user->id }}">{{ $user->profile->firstname." ".$user->profile->lastname }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user'))
                            <span class="text-danger">{{ $errors->get('user')[0] }}</span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-control">{{ $comment->comment }}</textarea>
                        @if($errors->has('comment'))
                            <span class="text-danger">{{ $errors->get('comment')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <select name="published" class="form-control">
                            <option value="" selected disabled >Is it published...</option>
                            <option @if($comment->published == 0) selected @endif value="0">Not published</option>
                            <option @if($comment->published == 1) selected @endif value="1">Published</option>
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
