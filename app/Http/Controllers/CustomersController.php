<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Illuminate\Container\Container;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('customer.index');
    }


    public function showTable(Request $request)
    {
        $customer = !$request->search ? User::whereHas('customer') :  User::whereHas('customer', function($query) use($request) {
            $query->where('address', 'like', '%'.$request->search.'%');
        });

        if($request->search) {
            $customer = $customer->orWhere('first_name', 'like', '%'.$request->search.'%')
            ->orWhere('last_name', 'like', '%'.$request->search.'%')
            ->orWhere('phone', 'like', '%'.$request->search.'%');
        }


        
        $items = $customer->with('customer')->orderBy('first_name', 'asc')->paginate(10);
        
        return view('customer.show-table', compact(['items']));
    }

    public function store(Request $request)
    {
        $dataForm = Arr::except($request->all(), ['_method', '_token']);
        $faker = Container::getInstance()->make(Faker::class);

        $dataUser = [
            'first_name' => $dataForm['first_name'],
            'phone' => $dataForm['phone'],
            'password' => Hash::make('password'),
            'email' => $faker->unique()->email
        ];

        $dataCustomer = [
            'address' => $dataForm['address'],
        ];

        $user = User::create($dataUser);
        $customer = $user->customer()->create($dataCustomer);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $dataForm = Arr::except($request->all(), ['_method', '_token']);
        $dataUser = [
            'first_name' => $dataForm['first_name'],
            'phone' => $dataForm['phone'],
        ];

        $dataCustomer = [
            'address' => $dataForm['address'],
        ];

        $user = User::find($id);
        $user->fill($dataUser)->save();
        $user->customer->fill($dataCustomer)->save();
        return $user;
    }
}
