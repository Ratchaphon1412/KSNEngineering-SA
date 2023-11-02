<?php

namespace App\Livewire;

use Livewire\Component;
use App\Service\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Quotation;
use App\Models\Task;
use App\Models\Product;
use App\Models\User;


use App\Models\Company;


class QuotationCalculate extends Component
{



    public $cart;
    public $discount = 0;
    public $total = 0;
    public $grandTotal = 0;
    public Company $company;


    protected $listeners = ['updateCart', 'companySelected'];

    public function render()
    {

        if ($this->discount >= 0) {

            $this->total = $this->calculateTotal();
        }



        return view('livewire.quotation-calculate', ['total' => $this->total, 'cart' => $this->cart, 'grandTotal' => $this->grandTotal]);
    }
    public function updateCart($cart)
    {


        $this->cart = $cart;
        $this->total = $this->calculateTotal();
    }

    private function calculateTotal()
    {
        // dd(empty($this->cart));


        if (empty($this->cart)) {
            $this->grandTotal = 0;
            return 0;
        }



        $temptotal = 0;
        $priceTemp = 0;
        $quantityTemp = 0;
        foreach ($this->cart as $item) {
            $priceTemp = $item['price'];
            $quantityTemp = $item['quantity'];
            $temptotal += $priceTemp * $quantityTemp;
        }


        $this->grandTotal = $temptotal - ($temptotal * ($this->discount / 100));




        return $temptotal;
    }
    public function checkout()
    {
        if (empty($this->cart)) {
            return;
        }

        $quotation = Quotation::create([
            'company_id' => $this->company->id,
            'user_id' => auth()->user()->id,
            'discount' => $this->discount,
            'total' => $this->total,
            'grand_total' => $this->grandTotal,
            'payment_status' => 'pending',
            'task_id' => null,
            'repair_id' => null,
            'quotation_pdf' => null,
            'purchase_order_pdf' => null,
        ]);


        foreach ($this->cart as $item) {
            $product = Product::find($item['id']);
            $quotation->orderDetails()->attach($product, ['quantity' => $item['quantity'], 'sub_total' => $item['price'] * $item['quantity']]);
        }



        $client = new Party([
            'name'          => auth()->user()->name,
            'phone'         => auth()->user()->phone,
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $this->company->name,
            'address'       => $this->company->address,
            'code'          => str_pad($this->company->id, 6, '0', STR_PAD_LEFT),
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [];
        $temptotal = 0;
        foreach ($this->cart as $item) {
            $priceTemp = $item['price'];
            $quantityTemp = $item['quantity'];
            $temptotal += $priceTemp * $quantityTemp;
            $items[] = (new InvoiceItem())
                ->title($item['name'])
                ->description($item['description'])
                ->pricePerUnit($priceTemp)
                ->quantity($quantityTemp);
        }
        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.paid'))
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('d/m/Y')
            ->payUntilDays(14)
            ->currencySymbol('฿')
            ->currencyCode('THB')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename(time() . '_quotation')
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('assets/images/logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        $quotation->quotation_pdf = $link;
        $quotation->save();




        // And return invoice itself to browser or have a different view
        // Replace with your desired URL
        return redirect($link);
    }


    public function companySelected(Company $company)
    {
        $this->company = $company;
    }
}
