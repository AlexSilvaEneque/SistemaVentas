<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Client;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id' => Auth::user()->id,
            'sale_date' => Carbon::now('America/Lima')
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price" => $request->price[$key], "discount" => $request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $key => $saleDetail) {
            $subtotal += ($saleDetail->quantity *  $saleDetail->price) - (($saleDetail->quantity * $saleDetail->price)*$saleDetail->discount/100);
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.show', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Sale $Sale)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $Sale)
    {
        
    }

    public function pdf(Sale $sale) {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $key => $saleDetail) {
            $subtotal += ($saleDetail->quantity *  $saleDetail->price) - (($saleDetail->quantity * $saleDetail->price)*$saleDetail->discount/100);
        }
        $pdf = \PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'. $sale->id .'.pdf');
    }

    public function status(Sale $sale) {
        if ($sale->status == 'VALID') {
            $sale->update(['status' => 'CANCELED']);
            return redirect()->back();
        } else {
            $sale->update(['status' => 'VALID']);
            return redirect()->back();
        }

    }
}
