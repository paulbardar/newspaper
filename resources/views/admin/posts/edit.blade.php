@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="control-label" for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" />
                        @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->get('title')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user">Author</label>
                        <select name="user" class="form-control">
                            <option value="" disabled >Select author...</option>
                            @foreach($users as $user)
                                <option @if($user->id == $post->author_id) selected @endif value="{{ $user->id }}">{{ $user->profile->firstname." ".$user->profile->lastname }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user'))
                            <span class="text-danger">{{ $errors->get('user')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" />
                        @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->get('image')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            <option value="" disabled >Select category...</option>
                            @foreach($categories as $category)
                                <option @if($category->id == $post->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                            <span class="text-danger">{{ $errors->get('category')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="postcontent">Content</label>
                        <textarea name="postcontent" id="postcontent" class="form-control">{{ $post->content }}</textarea>
                        @if($errors->has('content'))
                            <span class="text-danger">{{ $errors->get('postcontent')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <select name="published" class="form-control">
                            <option value="" selected disabled >Is it published...</option>
                            <option @if($post->published == 0) selected @endif value="0">Not published</option>
                            <option @if($post->published == 1) selected @endif value="1">Published</option>
                        </select>
                        @if($errors->has('published'))
                            <span class="text-danger">{{ $errors->get('published')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Save post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
