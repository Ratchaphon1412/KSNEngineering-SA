<?php

namespace App\Livewire;

use Livewire\Component;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class QuotationCalculate extends Component
{



    public $cart;
    public $discount = 0;
    public $total = 0;
    public $grandTotal = 0;


    protected $listeners = ['updateCart'];

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
        $customer = new Buyer([
            'name' => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}
