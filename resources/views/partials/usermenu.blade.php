<li><a href="{{ route('dashboard') }}" class="text-decoration-none text-black fw-medium d-flex align-items-center gap-3">Dashboard <i class="bi bi-grid-1x2-fill fs-4"></i></a></li>
<li>
    <x-form action="{{ route('logout') }}">
        @csrf
        <input type="submit" class="btn btn-emerald fw-medium" value="Logout">
    </x-form>
</li>
