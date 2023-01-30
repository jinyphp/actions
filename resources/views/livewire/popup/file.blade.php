<x-navtab-item ><!-- formTab -->
    <x-navtab-link class="rounded-0">
        <span class="d-none d-md-block">파일관리</span>
    </x-navtab-link>

    <x-form-hor>
        <x-form-label>경로</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.path")
            !!}
        </x-form-item>
    </x-form-hor>
</x-navtab-item>