<?php


namespace App\Services;


use App\Repositories\RepositoryCars;
use Illuminate\Http\Request;

class ServiceCars
{
    private $repositoryCars;

    public function __construct(){
        $this->repositoryCars = new RepositoryCars();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->repositoryCars->create($request->all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(Request $request){
        return $this->repositoryCars->getById($request->input('id'));
    }

    /**
     * @return \App\Models\Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return $this->repositoryCars->getList();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function update(Request $request){
        return $this->repositoryCars->update($request->all());
    }

    /**
     * @param Request $request
     * @return bool|null
     */
    public function delete(Request $request){
        return $this->repositoryCars->delete($request->input('id'));
    }
}
