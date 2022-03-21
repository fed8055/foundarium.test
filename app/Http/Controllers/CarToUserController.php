<?php

namespace App\Http\Controllers;

use App\Services\ServiceCarToUser;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     title="CarToUserController",
 *     description="CarToUserController",
 *     @OA\Xml(
 *         name="CarToUserController"
 *     )
 * )
 */

class CarToUserController extends Controller
{
    private $serviceCarToUser;

    public function __construct(){
        $this->serviceCarToUser = new ServiceCarToUser();
    }

    /**
     * @OA\Post(
     * path="/api/users/newCar",
     *   tags={"create"},
     *   summary="create",
     *   operationId="carToUserCreate",
     *
     *  @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="car_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->serviceCarToUser->create($request);
    }

    /**
     * @OA\Delete(
     *   path="/api/users/deleteCar",
     *   tags={"delete"},
     *   summary="delete",
     *   operationId="carToUserDelete",
     *
     *  @OA\Parameter(
     *      name="id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     * @param Request $request
     * @return bool|null
     */
    public function delete(Request $request){
        return $this->serviceCarToUser->delete($request);
    }

    /**
     * @OA\Get (
     *   path="/api/users/history",
     *   tags={"history"},
     *   summary="history",
     *   operationId="carToUserHistory",
     *
     *  @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHistory(Request $request){
        return $this->serviceCarToUser->getHistory($request);
    }
}
