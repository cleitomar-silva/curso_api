<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Real_State;
use App\Http\Requests\RealStateRequest;
use App\Api\ApiMessages;

class RealStateController extends Controller
{
    private $real_state;

    public function __construct(Real_State $real_state)
    {
        $this->real_state = $real_state;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_state = $this->real_state->paginate('10');

        return response()->json($real_state, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RealStateRequest $request)
    {
        $data = $request->all();
        try{
            $real_state = $this->real_state->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel cadastrado com sucesso!'
                ]
            ], 200);

        }catch(\Exception $e){
            $message = new ApiMessages($e->getMEssage());
            return response()->json($message->getMEssage());
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
        try{
            $real_state = $this->real_state->find($id);

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel encontrado com sucesso!',
                    'data' => $real_state
                ]
            ], 200);

        }catch(\Exception $e){
            $message = new ApiMessages($e->getMEssage());
            return response()->json($message->getMEssage());
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RealStateRequest $request, $id)
    {
        $data = $request->all();
        try{
            $real_state = $this->real_state->find($id);
            $real_state->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel atualizado com sucesso!'
                ]
            ], 200);
        }catch(\Exception $e){
            $message = new ApiMessages($e->getMEssage());
            return response()->json($message->getMEssage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $real_state = $this->real_state->find($id);
            $real_state->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel removido com sucesso!'
                ]
            ], 200);
        }catch(\Exception $e){
            $message = new ApiMessages($e->getMEssage());
            return response()->json($message->getMEssage());
        }
    }
}
