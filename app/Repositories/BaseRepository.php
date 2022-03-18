<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepository {

    /**
     * @param Model $model
     * @param $arData
     * @return bool
     */
    protected function save(Model $model, $arData){
        foreach ($arData as $field => $data){
            if(in_array($field, $model->fillable)){
                $model->$field = $data;
            }
        }
        if($model->save()){
            return $model->id;
        } else {
            return false;
        }
    }
}
?>
