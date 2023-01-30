<x-navtab-item ><!-- formTab -->
    <x-navtab-link class="rounded-0">
        <span class="d-none d-md-block">메모</span>
    </x-navtab-link>

    <x-form-hor>
        <x-form-label>메모</x-form-label>
        <x-form-item>
            {!! xTextarea()
                ->setWire('model.defer',"forms.description")
            !!}
        </x-form-item>
    </x-form-hor>
</x-navtab-item>