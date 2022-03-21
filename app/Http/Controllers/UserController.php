<?php

namespace App\Http\Controllers;

use App\Services\ServiceUser;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     title="UserController",
 *     description="UserController",
 *     @OA\Xml(
 *         name="UserController"
 *     )
 * )
 */

class UserController extends Controller
{
    private $serviceUser;

    public function __construct(){
        $this->serviceUser = new ServiceUser();
    }

    /**
     * @OA\Post(
     * path="/api/users/add",
     *   tags={"add", "user"},
     *   summary="add",
     *   operationId="userAdd",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
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
     * @param Request $request
     * @return bool
     */
    public function create(Request $request){
        return $this->serviceUser->create($request);
    }

    /**
     * @OA\Get(
     * path="/api/users/get",
     *   tags={"getById", "user"},
     *   summary="getById",
     *   operationId="userGetById",
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
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById(Request $request){
        return $this->serviceUser->getById($request);
    }

    /**
     * @OA\Get(
     * path="/api/users/getAll",
     *   tags={"getList", "user"},
     *   summary="getList",
     *   operationId="getUsersList",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(){
        return $this->serviceUser->getList();
    }

    /**
     * @OA\Post(
     * path="/api/users/update",
     *   tags={"update", "user"},
     *   summary="update",
     *   operationId="userUpdate",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
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
     * )
     * @param Request $request
     * @return bool
     */
    public function update(Request $request){
        return $this->serviceUser->update($request);
    }

    /**
     * @OA\Delete(
     *   path="/api/users/delete",
     *   tags={"delete", "user"},
     *   summary="delete",
     *   operationId="userDelete",
     *   @OA\Parameter(
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
        return $this->serviceUser->delete($request);
    }
}
