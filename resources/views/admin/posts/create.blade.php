@extends('layouts.admin.main')

@section('title')
    Create Posts
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title text-center">
                    <h3 class="mt-3">Create new Post</h3>
                </div>
                <hr>
                <div class="card-body p-3">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title_en" class="col-sm-3 col-form-label">
                                        Title En*
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title_en" placeholder="title en"
                                            class="form-control @error('title_en') is-invalid @enderror"
                                            value="{{ old('title_en') }}">
                                        @error('title_en')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title_fr" class="col-sm-3 col-form-label">
                                        Title Fr*
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title_fr" placeholder="title fr"
                                            class="form-control @error('title_fr') is-invalid @enderror"
                                            value="{{ old('title_fr') }}">
                                        @error('title_fr')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title_en" class="col-sm-3 col-form-label">
                                        Category*
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option selected disabled>Choose a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title_en" class="col-sm-3 col-form-label">
                                        Body En*
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea name="body_en" placeholder="body en" class="form-control @error('body_en') is-invalid @enderror"
                                            value="">{{ old('body_en') }}
                                        </textarea>
                                        @error('body_en')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title_en" class="col-sm-3 col-form-label">
                                        Body Fr*
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea name="body_fr" placeholder="body fr" class="form-control @error('body_fr') is-invalid @enderror"
                                            value="">{{ old('body_fr') }}
                                        </textarea>
                                        @error('body_fr')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="photo" class="col-sm-3 col-form-label">
                                        Image*
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" name="photo" placeholder="title en"
                                            class="form-control @error('photo') is-invalid @enderror">
                                        @error('photo')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="form-check d-flex justify-content-center">
                                    <label for="tags" class="form-check-label">
                                        Tags :
                                    </label>
                                    @foreach ($tags as $tag)
                                        <input type="checkbox" name="tags[]" id="tags" class="form-check-input mx-2"
                                            value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
