<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Service\Payments\Omise;

class SellController extends Controller
{
    //



    public function repairView(Request $request)
    {
        return view('seller.repair');
    }

    public function indexRepair()
    {
        $repairs = Repair::all();
        $repairs_select = array();
        foreach ($repairs as $repair) {
            if ($repair->task->stage == "Pending") {
                array_push($repairs_select, $repair);
            }
        }


        return view('seller.index', [
            'repairs' => $repairs_select,
        ]);
    }

    public function detailRepair(Repair $repair)
    {
        return view('seller.detail', [
            'repair' => $repair,
        ]);
    }

    public function updateRepair(Repair $repair, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'description' => ['required', 'string', 'min:4'],
        ]);

        $repair = Repair::find($repair->id);
        $repair->name = $request->get('name');
        $repair->description = $request->get('description');

        if ($request->hasFile('images')) {
            $imagePath = 'uploads/' . $repair->image;
            Storage::disk('public')->delete($imagePath);

            $imageName = $request->images->getClientOriginalName();
            $imageName = now()->format('YmdHis') . '-' . $imageName;
            $imagePath = 'uploads/' . $imageName;

            $path = Storage::disk('public')->put($imagePath, file_get_contents($request->images));
            // $path = Storage::disk('public')->url($path);

            $repair->image = $imageName;
        }
        $repair->save();



        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);
    }
    public function updateRepairShow(Repair $repair)
    {
        return view('seller.update', [
            'repair' => $repair,
            'selectedCompany' => $repair->company
        ]);
    }

    public function showCreateCompany()
    {
        return view('company');
    }


    public function registerCompany(Request $request)
    {
        $request->validate([
            'name' => ['required',],
            'email' => ['required',],
            'phone' => ['required',],
            'website' => ['required',],
            'address' => ['required',],
        ]);

        $company = new Company();
        $company->name      = $request->name;
        $company->email     = $request->email;
        $company->phone     = $request->phone;
        $company->website   = $request->website;
        $company->address   = $request->address;
        $company->save();

        return redirect()->route('seller.repair.view');
    }

    public function purchaseOrder(Repair $repair, Request $request)
    {
        $request->validate([
            'image' => ['required',],
        ]);

        $repair = Repair::find($repair->id);

        if ($request->hasFile('image')) {
            $imagePath = 'uploads/' . $repair->purchase_order;
            Storage::disk('public')->delete($imagePath);

            $imageName = $request->image->getClientOriginalName();
            $imageName = now()->format('YmdHis') . '-' . $imageName;
            $imagePath = 'uploads/' . $imageName;

            $path = Storage::disk('public')->put($imagePath, file_get_contents($request->image));
            // $path = Storage::disk('public')->url($path);

            $repair->purchase_order = $imageName;
        }
        $repair->save();

        $task = $repair->task;
        $task->stage = 'InProcess';
        $task->save();

        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);
    }

    public function addAmount(Request $request, Repair $repair)
    {
        $repair = Repair::find($repair->id);
        $repair->amount = $request->amount;
        $repair->save();
        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);
    }

    public function inProcessRepair()
    {

        $repairs = Repair::get();
        $showRepairs = [];
        foreach ($repairs as $repair) {
            if ($repair->task->stage == "InProcess") {
                $showRepairs[] = $repair;
            }
        }

        return view('seller.index', [
            'repairs' => $showRepairs,
        ]);
    }

    public function paymentRepairShow(Repair $repair)
    {

        $payments = $repair->payments;
        $temp_amount = 0;
        // fetch payment status from omise
        foreach ($payments as $payment) {
            $info = Omise::ChargeInformation($payment->transection_token);
            $payment->payment_status = $info['status'];
            $payment->save();
            if ($info['status'] == 'successful') {
                //calculate amount from payment
                $temp_amount += $payment->pay;
            }
        }
        // save amount to repair
        $repair->amount = $temp_amount;
        $repair->save();

        // calculate balance
        $balance = $repair->quotation->grand_total - $repair->amount;


        if ($repair->quotation->grand_total != 0) {
            if ($balance == 0) {
                $repair->payment_status = 'paid';
                $repair->save();
            }
        }



        // $charge = Omise::retrieve($payment->charge_id);
        // $chargeInfo = OmiseCharge::chargeInformation($charge['id']);

        return view('seller.payment', [
            'repair' => $repair,
            'balance' => $balance,
        ]);
    }
}
