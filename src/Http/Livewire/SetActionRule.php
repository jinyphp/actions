<?php

namespace Jiny\Actions\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class SetActionRule extends Component
{
    const PATH = "actions";
    public $actions;

    public function mount()
    {
        $path = resource_path(self::PATH);
        $filename = $path.DIRECTORY_SEPARATOR.str_replace("/","_",$this->actions['route']['uri']).".json";
        //dd($filename);
        if (file_exists($filename)) {
            $rules = json_decode(file_get_contents($filename), true);

            foreach ($rules as $key => $value) {
                $this->forms[$key] = $value;
            }

        }
    }

    public function render()
    {
        return view("jiny-actions::livewire.popup.rules");
    }

    /**
     * 팝업창 관리
     */
    protected $listeners = ['popupRuleOpen','popupRuleClose'];
    public $popupRule = false;
    public function popupRuleOpen()
    {
        $this->popupRule = true;
    }

    public function popupRuleClose()
    {
        $this->popupRule = false;
    }



    public $forms = [];
    public function save()
    {
        //유효성 검사
        if (isset($this->actions['validate'])) {
            $validator = Validator::make($this->forms, $this->actions['validate'])->validate();
        }

        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        // json 포맷으로 데이터 변환
        $json = json_encode($this->forms,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $path = resource_path("actions");
        if(!is_dir($path)) mkdir($path);

        $filename = $path.DIRECTORY_SEPARATOR.str_replace("/","_",$this->actions['route']['uri']).".json";
        //dd($filename);
        //dd($json);
        file_put_contents($filename, $json);

        $this->popupRuleClose();

        // Livewire Table을 갱신을 호출합니다.
        $this->emit('refeshTable');
    }


    public $content;
    public $resourceFile;
    public $popupResourceEdit = false;
    public function resourceEdit($file)
    {
        $this->popupRuleClose();
        $this->popupResourceEdit = true;

    }

    public function returnRule()
    {
        $this->popupResourceEdit = false;
        $this->popupRuleOpen();
    }

    public function update()
    {
        $this->popupResourceEdit = false;
        $this->popupRuleOpen();
    }


}
