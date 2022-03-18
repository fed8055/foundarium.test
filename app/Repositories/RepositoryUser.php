<?php


namespace App\Repositories;


use App\Models\User;

class RepositoryUser extends BaseRepository
{
    /**
     * @param array $arData
     * @return bool
     */
    public function create(array $arData){
        $user = new User();

       return $this->save($user, $arData);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(int $id){
        return User::with('cars')->where('id', $id)->first();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return User::all();
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

        $user = $this->getById($id);

        return $this->save($user, $arData);
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id){
        $user = $this->getById($id);
        return $user->delete();
    }

}
