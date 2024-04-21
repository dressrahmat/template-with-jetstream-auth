<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary rounded btn-sm']) }}>
    {{ $slot }}
</button>
