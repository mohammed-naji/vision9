<div class="mb-3">
    <label>Title</label>
    <input type="text" placeholder="Title" name="title" class="form-control @error('title')
        is-invalid
    @enderror" value="{{ old('title', $post->title) }}" />
    @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" multiple name="image" class="form-control @error('image')
        is-invalid
    @enderror" />
    @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    <img width="100" src="{{ asset('uploads/posts/'.$post->image) }}" alt="">
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea placeholder="Content" name="content" class="form-control @error('content')
        is-invalid
    @enderror" rows="5">{{ old('content', $post->content) }}</textarea>
    @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
