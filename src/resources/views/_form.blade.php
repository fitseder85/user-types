<div>
    <div class="form-group row" id="name-group">
        <label class="col-sm-2 col-form-label" for="name">{{ __("name") }} <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="{{ __("name") }}" value="{{ old('name', $userType?->name) }}" required>
            @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="form-group row" id="description-group">
        <label class="col-sm-2 col-form-label" for="description">{{ __("description") }} <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __("description") }}" required>{{ old('description', $userType?->description) }}</textarea>
            @error('description') <span class="error invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
