<?php

namespace App\Http\Controllers\Api;

use App\Helpers\BaseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends BaseApiController
{
    public function __construct(Author $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = $this->model->latest()->paginate(40);
        $data = AuthorResource::collection($entries);
        //dd($entries);
        return $this->responseCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $data = $this->model->formatData($request->all());
        try {
            $this->model->create($data);
            return response()->json(['message' => 'Thêm mới thành công!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = $this->model->find($id);
        $data = new AuthorResource($entry);
        return $this->responseOne($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveImage(Request $request)
    {
        if($request->hasFile('image')){
            $save = BaseHelper::saveImage($request->file('image'), 'images');
            if($save){
                return response()->json(['update success'], 200);
            }
        }
        return response()->json(['message' => 'upload image error' ], 422);
    }
}
