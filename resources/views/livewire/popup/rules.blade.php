<div>
    <!-- Super 관리자만 화면을 재구성할 수 있습니다. -->
    @if(is_admin_super())
        {{-- loading 화면 처리 --}}

        <div class="d-flex p-2 bg-gray-300">
            <button class="btn btn-secondary btn-sm" wire:click="popupRuleOpen">Rules</button>
        </div>



        <x-loading-indicator/>

        <style>

        </style>

        <!-- 팝업 Rule 수정창 -->
        @if ($popupRule)
        <x-dialog-modal wire:model="popupRule" maxWidth="2xl">
            <x-slot name="content">
                <x-navtab class="mb-3 nav-bordered">

                    <x-navtab-item><!-- Action 정보 -->
                        <x-navtab-link class="rounded-0">
                            <span class="d-none d-md-block">정보</span>
                        </x-navtab-link>

                        <fieldset>
                            <legend class="px-2 text-xs">Argument</legend>
                            <x-form-hor>
                                <x-form-label>타이틀</x-form-label>
                                <x-form-item>
                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.title")
                                    !!}
                                </x-form-item>
                            </x-form-hor>

                            <x-form-hor>
                                <x-form-label>서브타이틀</x-form-label>
                                <x-form-item>
                                    {!! xTextarea()
                                        ->setWire('model.defer',"forms.subtitle")
                                    !!}
                                </x-form-item>
                            </x-form-hor>
                        </fieldset>

                        <fieldset>
                            <legend class="px-2 text-xs">Blade Resource</legend>

                            <x-form-hor>
                                <x-form-label>View_title </x-form-label>
                                <x-form-item>
                                    {!! xCheckbox()
                                        ->setWire('model.defer',"forms.view_title_check")
                                    !!}

                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.view_title")
                                        ->setWidth("standard")
                                    !!}
                                </x-form-item>
                            </x-form-hor>

                        </fieldset>


                    </x-navtab-item>


                    <x-navtab-item class="show active"><!-- formTab -->
                        <x-navtab-link class="rounded-0 active">
                            <span class="d-none d-md-block">목록</span>
                        </x-navtab-link>

                        <fieldset>
                            <legend class="px-2 text-xs">Blade Resource</legend>

                            <x-form-hor>
                                <x-form-label>view_main</x-form-label>
                                <x-form-item>
                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.view_main")
                                        ->setWidth("standard")
                                    !!}

                                </x-form-item>
                            </x-form-hor>

                            <x-form-hor>
                                <x-form-label>view_main layout</x-form-label>
                                <x-form-item>
                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.view_main_layout")
                                        ->setWidth("standard")
                                    !!}

                                </x-form-item>
                            </x-form-hor>

                            <x-form-hor>
                                <x-form-label>view_filter</x-form-label>
                                <x-form-item>
                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.view_filter")
                                        ->setWidth("standard")
                                    !!}
                                </x-form-item>
                            </x-form-hor>

                            <x-form-hor>
                                <x-form-label>view_list</x-form-label>
                                <x-form-item>
                                    {!! xInputText()
                                        ->setWire('model.defer',"forms.view_list")
                                        ->setWidth("standard")
                                    !!}
                                </x-form-item>
                            </x-form-hor>

                        </fieldset>
                    </x-navtab-item>

                    <x-navtab-item ><!-- formTab -->
                        <x-navtab-link class="rounded-0">
                            <span class="d-none d-md-block">입력폼</span>
                        </x-navtab-link>

                        <x-form-hor>
                            <x-form-label>view_form</x-form-label>
                            <x-form-item>
                                {!! xInputText()
                                    ->setWire('model.defer',"forms.view_form")
                                    ->setWidth("standard")
                                !!}
                            </x-form-item>
                        </x-form-hor>

                        <x-form-hor>
                            <x-form-label>view_edit</x-form-label>
                            <x-form-item>
                                {!! xInputText()
                                    ->setWire('model.defer',"forms.view_edit")
                                    ->setWidth("standard")
                                !!}
                            </x-form-item>
                        </x-form-hor>
                    </x-navtab-item>


                    @include("actions::livewire.popup.file")

                    @include("actions::livewire.popup.database")

                    @include("actions::livewire.popup.menu")

                    @include("actions::livewire.popup.permit")

                    @include("actions::livewire.popup.memo")
                    

                </x-navtab>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-between">
                @if (isset($actions['id']))
                    <div>
                    </div>
                    <div>
                        <x-button secondary wire:click="popupRuleClose">취소</x-button>
                        <x-button success wire:click="save">수정</x-button>
                    </div>
                @else
                    <div></div>
                    <div class="text-right">
                        <x-button secondary wire:click="popupRuleClose">취소</x-button>
                        <x-button primary wire:click="save">저장</x-button>
                    </div>
                @endif
                </div>
            </x-slot>
        </x-dialog-modal>
        @endif



        @if ($popupResourceEdit)
        <x-dialog-modal wire:model="popupResourceEdit" maxWidth="2xl">
            <x-slot name="content">
                {!! xTextarea()
                    ->setWire('model.defer',"content")
                !!}
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-between">
                    <div></div>
                    <div class="text-right">
                        <x-button secondary wire:click="returnRule">취소</x-button>
                        <x-button primary wire:click="update">수정</x-button>
                    </div>
                </div>
            </x-slot>
        </x-dialog-modal>
        @endif

    @endif

</div>
