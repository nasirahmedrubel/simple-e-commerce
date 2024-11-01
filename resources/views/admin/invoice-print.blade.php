<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @page 
        {
        size: auto;   /* auto is the initial value */
        margin: 7mm 4mm;  /* this affects the margin in the printer settings */
        }
        .pagebreak{
            page-break-after: always;
        }
        .table td {
            padding: 3px 8px;
            text-align: left;
            vertical-align: middle;
            line-height: 15px;
            font-size: 11px;
        }
        .table th{
            padding: 3px 8px;
            text-align: left;
            vertical-align: middle;
            line-height: 15px;
            font-size: 11px;
            font-weight: bold;
        }
        .table th{
            border:1.5px solid black !important;
        }
        table.table-bordered tbody > tr > td{
            border:1.5px solid black !important;
        }
    </style>
</head>
  <body>
    @foreach ($invoices as $invoice)
    <div class="container-fluid px-5 mt-2 pagebreak">
        <div class="row">
            <div class="col-8">
                <h5>Invoice NO# {{str_pad($invoice->id,8,"0",STR_PAD_LEFT)}}</h5>
                <p>{{Date('d-m-Y', strtotime($invoice->created_at))}}</p>
            </div>
            <div class="col-4 text-center">
                <h5 class="mb-0 pb-0">Princess Market</h5>
                <p class="my-0" style="font-size:11px">119 west Kafrul taltola</p>
                <p class="my-0" style="font-size:11px">01310852824</p>
            </div>
        </div>
        <div class="row mb-3">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Customer Information</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="10%">Name</td>
                            <td width="90%">{{$invoice->name}}</td>
                        </tr>
                        <tr>
                            <td width="10%">Phone</td>
                            <td width="90%">{{$invoice->phone}}</td>
                        </tr>
                        <tr>
                            <td width="10%">Address</td>
                            <td width="90%">{{$invoice->address}}</td>
                        </tr>
                    </tbody>
            </table>
            <table class="table table-sm table-bordered mb-0">
                <thead>
                    <tr>
                        <th class="text-center" width="8%">SN</th>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center" width="10%">Quantity</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                            $qnt = 0;
                            $count = 1;
                        @endphp
                        @foreach ($invoice->invoicedetails as $item)
                        <tr>
                            <td>{{$count}}</td>
                            <td width="60%">{{$item->product->name}}</td>
                            <td class="text-center">{{$item->price}}</td>
                            <td class="text-center">{{$item->quantity}}</td>
                            <td>{{$item->quantity * $item->price}}</td>
                            @php
                                $subtotal +=$item->price * $item->quantity;
                                $qnt += $item->quantity;
                                $count++;
                            @endphp
                            
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-end" colspan="3">Sub-Total</td>
                            <td class="text-center">{{$qnt}}pcs</td>
                            <td>{{$subtotal}}</td>
                        </tr>
                        <tr>
                            <td class="text-end" colspan="4">Delivery Charge</td>
                            <td>{{$invoice->Dcharge}}</td>
                        </tr>
                        <tr>
                            <td class="text-end" colspan="4">Net Total</td>
                            <td>{{$invoice->bill}}</td>
                        </tr>
                    </tbody>
            </table>
            <p class="m-1 p-0" style="font-size:11px">প্রথমে প্রোডাক্ট চেক করবেন সব ঠিক থাকলে তারপর টাকা দিবেন ডেলিভারি ছেলেকে, ডেলিভারি ছেলে চলে আসলে কোন অভিযোগ মঞ্জুর হবে না।</p>
        </div>
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <script type="text/javascript" language="javascript">
        window.print();
    </script>
</body>
</html>