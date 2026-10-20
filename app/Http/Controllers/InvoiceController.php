<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function generatePdf(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required',
            'client_name' => 'required',
            'client_email' => 'required|email',
            'items' => 'required|array',
            'items.*.description' => 'required',
            'items.*.quantity' => 'required|numeric',
            'items.*.price' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['date'] = date('m/d/Y');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        $data['total'] = $total;

        $pdf = Pdf::loadView('invoice.template', $data);

        return $pdf->download('invoice-' . $data['invoice_number'] . '.pdf');
    }
}
