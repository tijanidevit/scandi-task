<?php
namespace App\Traits;

/**
 * Trait Class 
 * For Handling Response
 */
trait ResponseTrait
{
    public function successResponse( $message,$data = [], int $status = 200)
    {
        return response([
            "success" => true,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public function errorResponse( $message,int $status = 404)
    {
        return response([
            "success" => true,
            "message" => $message
        ], $status);
    }

    public function resourceRetrieved($data)
    {
        return $this->successResponse("Resource successfully retrieved", $data);
    }

    public function collectionRetrieved($data)
    {
        return $this->successResponse( "Collection successfully retrieved", $data);
    }

    public function resourceCreated()
    {
        return $this->successResponse("Resource successfully created",[], 201);
    }

    public function resourceDeleted()
    {
        return $this->successResponse("Resource successfully deleted");
    }

    public function collectionDeleted()
    {
        return $this->successResponse("Collection successfully deleted");
    }



    public function notFound()
    {
        return $this->errorResponse("Resource not found",404);
    }
}
