<?php


namespace App\Repositories;


use App\Models\Car;

class RepositoryCars extends BaseRepository
{
    /**
     * @param array $arData
     * @return bool
     */
    public function create(array $arData){
        $car = new Car();

       return $this->save($car, $arData);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(int $id){
        return Car::with('cars')->where('id', $id)->first();
    }

    /**
     * @return Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return Car::all();
    }

    /**
     * @param $arData
     * @param null $id
     * @return bool
     */
    public function update($arData, $id = null){
        if(is_null($id) && isset($arData['id'])){
            $id = $arData['id'];
        } else {
            return false;
        }

        $car = $this->getById($id);

        return $this->save($car, $arData);
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id){
        $car = $this->getById($id);

        return $car->delete();
    }

}
