<?php


namespace App\Services;


use App\Repositories\CarToUserRepository;
use Illuminate\Http\Request;

class ServiceCarToUser
{
    private $carToUserRepository;

    public function __construct(){
        $this->carToUserRepository = new CarToUserRepository();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->carToUserRepository->create($request->all());
    }

    /**
     * @param Request $request
     * @return bool|null
     */
    public function delete(Request $request){
        return $this->carToUserRepository->delete($request->input('id'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHistory(Request $request){
        return $this->carToUserRepository->getHistory($request->input('user_id', null));
    }
}
