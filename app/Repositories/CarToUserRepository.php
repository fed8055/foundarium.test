<?php


namespace App\Repositories;

use App\Models\CarToUser;

class CarToUserRepository extends BaseRepository
{
    /**
     * @param $arData
     * @return bool
     */
    public function create($arData){
        if(!is_null($arData['user_id']) && !is_null($arData['car_id'])){
            $double = CarToUser::where('user_id', $arData['user_id'])
                ->where('car_id', $arData['car_id'])
                ->get()
                ->toArray();
            if(count($double) == 0){
                $record = new CarToUser();
                $record->user_id = $arData['user_id'];
                $record->car_id = $arData['car_id'];
                return $record->save();
            }
        }
        return false;
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id){
        return CarToUser::where('id', $id)->delete();
    }

    /**
     * Возвращает все записи, включая удалённые
     * При указании пользователя вернёт только записи пользователя
     *
     * @param null $user_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHistory($user_id = null){
        return CarToUser::withTrashed()
            ->when(!is_null($user_id), function ($query, $user_id){
                return $query->where('user_id', $user_id);
            })->get();
    }
}
