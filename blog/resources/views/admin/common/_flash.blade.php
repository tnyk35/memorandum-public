@if (session('flash_message'))
<div class="alert alert-{{ session('flash_class') }}">
  <p class="mb-0">{{ session('flash_message') }}</p>
</div>
@endif
