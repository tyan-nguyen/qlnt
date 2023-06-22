<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class ShowStatus extends Widget{
    public $status;
    public $text;
    
    public function init(){
        parent::init();
    }
    
    public function run(){
       // return Html::encode($this->message);
        $rText = explode('|', $this->text);
        $result = '<span class="badge rounded-pill text-bg-'.($this->status==1?'primary':'danger').'">'
            . ($this->status==0?$rText[0]:$rText[1])
            .'</span>';
        return  $result;
    }
}
?>