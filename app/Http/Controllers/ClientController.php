<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClient;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use App\Client;
use Response;

class ClientController extends Controller
{
    protected $file;

    /**
     * @return string
     */
    public function __construct()
    {
        $this->file = storage_path() . '/csv/clientData.csv';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return new ClientResource(Client::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        View::share('title', 'Add Client');

        return view('clients.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClient $request)
    {
        $request['address'] = str_replace("\r\n", '', $request->get('address'));

        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'dob' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->dob),
            'phone' => $request->mobile,
            'email' => $request->email,
            'nationality' => $request->nationality,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
            'zip' => $request->zip,
        ]);

        if(!$client)
            throw new Exception('Error in saving data.');

        return response()->json([
            'success'=>true,
            'message'=>'Client created',
            'data'=> new ClientResource(Client::find($client->id))
        ], 201);

    }

}
