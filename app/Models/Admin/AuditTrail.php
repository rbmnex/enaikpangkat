<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;
    protected $table = 'audit_trail';
    private $initobj = NULL;
    private $modiobj = NULL;

    public function setInitialObj($intial) {
        $this->initobj = $intial;
    }

    public function getInitialObj() {
        return $this->initobj;
    }

    public function setModifyObj($modify) {
        $this->modiobj = $modify;
    }

    public function getModifyObj() {
        return $this->modiobj;
    }

    public function capture($nokp,$operation,$module) {
        $model = $this;

        $model->nokp = $nokp;
        $model->operation = $operation;
        $model->module = $module;
        $model->intial = json_encode($this->getInitialObj());
        $model->modify = json_encode($this->getModifyObj());
        if($this->getModifyObj()) {
            $model->table_name = get_class($this->getModifyObj());
        }

        $model->save();
    }

    public static function audit($nokp,$operation,$module,$intial = NULL,$modify = NULL) {
        $model = new self;

        $model->nokp = $nokp;
        $model->operation = $operation;
        $model->module = $module;
        $model->intial = $intial;
        $model->modify = $modify;

        $model->save();
    }
}
