<x-navtab-item ><!-- formTab -->
    <x-navtab-link class="rounded-0">
        <span class="d-none d-md-block">데이터베이스</span>
    </x-navtab-link>

    <x-form-hor>
        <x-form-label>테이블</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.table")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>페이징</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.paging")
            !!}
        </x-form-item>
    </x-form-hor>

    <x-form-hor>
        <x-form-label>조건</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.where")
            !!}
        </x-form-item>
    </x-form-hor>

    <hr>

    <x-form-hor>
        <x-form-label>파일명</x-form-label>
        <x-form-item>
            {!! xInputText()
                ->setWire('model.defer',"forms.filename")
            !!}
            저장할 config 파일명을 지정합니다.
        </x-form-item>
    </x-form-hor>

</x-navtab-item>