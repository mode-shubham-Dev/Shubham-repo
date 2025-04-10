<div class="mb-3">
    <label for="inputName" class="form-label"><strong>Title:</strong></label>
    <input 
        type="text" 
        name="title" 
        value="{{ isset($category) ? $category->title : old('title') }}"
        class="form-control @error('title') is-invalid @enderror" 
        id="inputName" 
        placeholder="Title">
    @error('title')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
