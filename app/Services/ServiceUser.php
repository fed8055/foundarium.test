<?php


namespace App\Services;


use App\Repositories\RepositoryUser;
use Illuminate\Http\Request;

class ServiceUser
{
    private $repositoryUser;

    public function __construct(){
        $this->repositoryUser = new RepositoryUser();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->repositoryUser->create($request->all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(Request $request){
        return $this->repositoryUser->getById($request->input('id'));
    }

    /**
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return $this->repositoryUser->getList();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function update(Request $request){
        return $this->repositoryUser->update($request->all());
    }

    /**
     * @param Request $request
     * @return bool|null
     */
    public function delete(Request $request){
        return $this->repositoryUser->delete($request->input('id'));
    }
}
