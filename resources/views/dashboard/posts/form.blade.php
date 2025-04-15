<div class="row">
    <!-- Category Dropdown (Left side, smaller width) -->
    <div class="mb-3 col-md-4">
        <label for="category_id" class="form-label"><strong>Category:</strong></label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ (isset($post) && $post->category_id == $category->id) ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}> 
                    {{-- editing an existing category , it autoselect the right one --}}
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Other Inputs (Right side, larger width) -->
    <div class="col-md-8">
        <!-- Tags Dropdown (Multiple Select) -->
        <div class="mb-3">
            <label for="tags" class="form-label"><strong>Tags:</strong></label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ (isset($post) && $post->tags->pluck('id')->contains($tag->id)) ? 'selected' : (in_array($tag->id, old('tags', [])) ? 'selected' : '') }}>
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- Product Name -->
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                   id="inputName" placeholder="Enter product name" 
                   value="{{ isset($post) ? $post->name : old('name') }}">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

     <!-- Thumbnail Upload -->
     <div class="mb-3">
        <label for="thumbnail" class="form-label"><strong>Thumbnail:</strong></label>
        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
        @error('thumbnail')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    
        @if(isset($post) && $post->hasMedia('thumbnails'))
            <div class="mt-3">
                <img src="{{ $post->getFirstMediaUrl('thumbnails', 'preview') }}" 
                     alt="Current thumbnail" class="img-thumbnail mb-2" 
                     style="max-width: 200px; max-height: 200px;">
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" 
                           name="remove_thumbnail" id="remove_thumbnail">
                    <label class="form-check-label text-danger" for="remove_thumbnail">
                        Remove current thumbnail
                    </label>
                </div>
            </div>
        @endif
    </div>


        <!-- Product Details -->
<div class="mb-3">
    <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
    <textarea name="detail" id="inputDetail" class="form-control @error('detail') is-invalid @enderror" rows="10"
              placeholder="Enter product details">{{ isset($post) ? $post->detail : old('detail') }}</textarea>
    @error('detail')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>

    </div>
</div>
