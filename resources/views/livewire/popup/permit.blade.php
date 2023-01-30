<x-navtab-item ><!-- formTab -->
    <x-navtab-link class="rounded-0">
        <span class="d-none d-md-block">권환</span>
    </x-navtab-link>

    <x-form-hor>
        <x-form-label>Role</x-form-label>
        <x-form-item>
            {!! xCheckbox()
                ->setWire('model.defer',"forms.role")
            !!}
            <div>사용자 Role권한을 적용합니다.</div>
        </x-form-item>
    </x-form-hor>

    {{-- role 테이블 선택--}}
    @php
        $roles = DB::table("roles")->get();
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th >Name</th>
                <th width='100'>Permit</th>
                <th width='100'>Create</th>
                <th width='100'>Read</th>
                <th width='100'>Update</th>
                <th width='100'>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
            <tr >
                <td>{{$item->name}}</td>
                <td width='100'>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.roles.".$item->name.".permit")
                    !!}
                </td>
                <td width='100'>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.roles.".$item->name.".create")
                    !!}
                </td>
                <td width='100'>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.roles.".$item->name.".read")
                    !!}
                </td>
                <td width='100'>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.roles.".$item->name.".update")
                    !!}
                </td>
                <td width='100'>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.roles.".$item->name.".delete")
                    !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-navtab-item>