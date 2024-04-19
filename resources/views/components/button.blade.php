<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary rounded']) }}>
    {{ $slot }}
</button>
