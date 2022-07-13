<?php

namespace App\Http\Controllers\Warehouse;

use Illuminate\Http\Request;
use App\Http\Requests\EditClientUpdate;
use App\Http\Requests\StoreClientCreate;
use App\Http\Requests\EditDeliveryUpdate;
use App\Http\Requests\StoreDeliveryCreate;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DeliveryPartnar;

class MasterController extends Controller
{
    public function index()
    {
        return view('warehouse/master/index', [
            'clients' => $this->getClients(),
            'prefs' => config('prefecture'),
            'deliveries' => DeliveryPartnar::all()
        ]);
    }

    public function getClients()
    {
        $clients = Client::all();
        return $clients;
    }

    public function getDeliveries()
    {
        $deliveries = DeliveryPartnar::all();
        return $deliveries;
    }

    public function addClient(StoreClientCreate $request)
    {
        Client::create($request->all());
    }

    public function editClient(EditClientUpdate $request)
    {
        $data = $request->all();
        $client = Client::find($data['id']);
        $client->fill($data)->save();
    }

    public function deleteClient(Request $request)
    {
        $data = $request->all();
        $client = Client::find($data['id']);
        $client->fill(['deleted_at' => \Carbon::now()->format('Y-m-d H:i:s')])->save();
    }

    public function addDelivery(StoreDeliveryCreate $request)
    {
        DeliveryPartnar::create([
            'name' => $request['name'],
            'tel' => $request['tel'],
            'email' => $request['email'],
        ]);
    }

    public function editDelivery(EditDeliveryUpdate $request)
    {
        $data = $request->all();
        $delivery = DeliveryPartnar::find($data['id']);
        $delivery->fill($data)->save();
    }

    public function deleteDelivery(Request $request)
    {
        $data = $request->all();
        if (Client::where('delivery_partnar_id', $data['id'])->first()) {
            return 'ng';
        } else {
            $delivery = DeliveryPartnar::find($data['id']);
            $delivery->fill(['deleted_at' => \Carbon::now()->format('Y-m-d H:i:s')])->save();
        }
    }
}
