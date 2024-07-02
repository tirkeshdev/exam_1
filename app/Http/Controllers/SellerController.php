<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function show($id)
    {

        $seller = Seller::findOrFail($id);


        return view('sellers.show',
            ['seller' => $seller,]);
    }
}
