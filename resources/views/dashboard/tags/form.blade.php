<div class="mb-3">
    <label for="inputTitle" class="form-label"><strong>Title:</strong></label>
    <input 
        type="text" 
        name="title" 
        value="{{ isset($tag) ? $tag->title : old('title') }}"
        class="form-control @error('title') is-invalid @enderror" 
        id="inputTitle" 
        placeholder="Tag Title">
    @error('title')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
