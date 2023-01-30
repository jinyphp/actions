<x-navtab-item >
    <x-navtab-link class="rounded-0">
        <span class="d-none d-md-block">메뉴</span>
    </x-navtab-link>

    <x-form-hor>
        <x-form-label>메뉴</x-form-label>
        <x-form-item>
            @if(function_exists('xMenu'))
            {!! xSelect()
                ->table('menus','code')
                ->setWire('model.defer',"forms.menu")
                ->setWidth("medium")
            !!}
            @endif
        </x-form-item>
    </x-form-hor>
</x-navtab-item>