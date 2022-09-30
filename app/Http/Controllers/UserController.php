<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{

    protected $user;
    private $OrderRepository;
    public function __construct()
    {
        $this->OrderRepository = new OrderRepository(new Order());
        $this->user = auth()->user();
    }
    
    public function index()
    {
        return \response()->json(['users' => User::all()]);
    }

    
    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        $response = $this->OrderRepository->create($request->all());
        return Utilities::wrap( $response);
    }

    
    public function show($id)
    {
    }

   
    public function edit($id)
    {
    }

    
    public function update(Request $request, $id)
    {
    }

    
    public function destroy($id)
    {
    }

    private function validateRequest( $request, $options = ''  ){

        return $this->validate($request,[
            'status' => $options.'required|integer',
            'driver_id' => 'integer|nullable',
            'items' => $options.'required|json',
            'details' => $options.'required|json',
            'provider' => $options.'required|json',
            'customer' => $options.'required|json',
        ]);
    }
}
