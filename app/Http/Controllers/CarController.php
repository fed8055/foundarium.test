<?php

namespace App\Http\Controllers;

use App\Services\ServiceCars;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     title="CarController",
 *     description="CarController",
 *     @OA\Xml(
 *         name="CarController"
 *     )
 * )
 */
class CarController extends Controller
{
    private $serviceCars;

    public function __construct(){
        $this->serviceCars = new ServiceCars();
    }

    /**
     * @OA\Post(
     ** path="/api/cars/add",
     *   tags={"add"},
     *   summary="add",
     *   operationId="add",
     *
     *  @OA\Parameter(
     *      name="brand",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="model",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="reg_num",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
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
     **/
    /**
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->serviceCars->create($request);
    }

    /**
     * @OA\Get(
     ** path="/api/cars/get",
     *   tags={"getById"},
     *   summary="getById",
     *   operationId="getById",
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
     **/
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(Request $request){
        return $this->serviceCars->getById($request);
    }

    /**
     * @OA\Get(
     ** path="/api/cars/getAll",
     *   tags={"getList"},
     *   summary="getList",
     *   operationId="getList",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    /**
     * @return \App\Models\Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return $this->serviceCars->getList();
    }

    /**
     * @OA\Post(
     ** path="/api/cars/update",
     *   tags={"update"},
     *   summary="update",
     *   operationId="update",
     *
     *  @OA\Parameter(
     *      name="brand",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="model",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="reg_num",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
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
     **/
    /**
     * @param Request $request
     * @return bool
     */
    public function update(Request $request){
        return $this->serviceCars->update($request);
    }

    /**
     * @OA\Post(
     ** path="/api/cars/delete",
     *   tags={"delete"},
     *   summary="delete",
     *   operationId="delete",
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
     **/
    /**
     * @param Request $request
     * @return bool|null
     */
    public function delete(Request $request){
        return $this->serviceCars->delete($request);
    }
}
