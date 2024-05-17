<label for="{{ $id }}" class="form-label fw-medium">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control" value="{{ $value ? $value : old($name) }}" @if($required) required @endif {{ $attributes }}>
