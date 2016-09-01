<?php

namespace App\Http\Controllers;

use App\Vuejs;
use Illuminate\Http\Request;

use App\Http\Requests;

class VueController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getData()
    {
        $data = Vuejs::all()->toArray();
        return $data;
    }

    public function destroy($id)
    {
        $member = Vuejs::find($id);

        $member->delete();
    }

    public function update($id)
    {
        $sql = Vuejs::where('id', '=', $id)->get();
        return $sql;
    }

    public function getMembers() {
        return view('welcome');
    }

    public function show($id) {
        $sql = Vuejs::where('id', '=', $id)->get();
        return $sql;
    }

    public function store(Requests\CurdRequest $request) {
        Vuejs::create(array(
           'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'occupation' => $request->input('occupation')
        ));
    }

}
