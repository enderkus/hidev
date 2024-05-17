<label for="{{ $id }}" class="form-label fw-medium">{{ $label }}</label>
<div class="input-group">
    <span class="input-group-text" id="{{ $id }}">{{ $groupText }}</span>
    <input type="text" name="{{ $name }}" class="form-control" value="{{ $value ? $value : old($name) }}" aria-describedby="{{ $id }}" {{$attributes}} @if($required) required @endif>
</div>
