<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contactos = Contacto::all();
        return view('contacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:25',
            'telefono' => 'required|max:9',
            'direccion' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return redirect('/nuevo')
                ->withErrors($validator)
                ->withInput();
        }

        $nuevoContacto = new Contacto;

        $nuevoContacto->nombre = $request->input('nombre');
        $nuevoContacto->telefono = $request->input('telefono');
        $nuevoContacto->direccion = $request->input('direccion');

        if($nuevoContacto->save()) {
            return redirect()->route('contacto.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre-contacto' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator);
        }

        $nombre_contacto = $request->input('nombre-contacto');
        $contacto = Contacto::where('nombre', 'like', "$nombre_contacto%")->first();

        if($contacto == null) {
            return view('contacto.show')->with(['mensaje' => 'No se encontró el contacto.']);
        }else {
            return view('contacto.show', compact('contacto'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $mensaje = mensaje::whereSlug($slug)->firstOrFail();
        // return view('mensajes.edit', compact('mensaje'));

        // $contacto = contacto::whereid($id)->firstOrFail();
        // return view('contacto.edit', compact('contacto'));

        // $user = Session::get('user');
        //     $product = Product::find($id);
        //     return view('products.edit')->with(compact('user', 'product'));
        
        $contacto = Contacto::find($id);
        return view('contacto.edit', compact('contacto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $oldContacto = Contacto::find($id);
        $oldContacto->nombre = $request->input('nombre');
        $oldContacto->telefono = $request->input('telefono');
        $oldContacto->direccion = $request->input('direccion');

        $oldContacto->update();
        return redirect()->route('contacto.index');

        // $contacto = Contacto::whereid($id)->firstOrFail();
        // $contacto->nombre = $request->get('nombre');
        // $contacto->telefono = $request->get('telefono');
        // $contacto->direccion = $request->get('direccion');

        // if($request->get('status') != null){
        //     $contacto->status = 0;
        // }else{
        //     $contacto->status = 1;
        // }
        // $contacto->save();
        // return redirect(action('ContactoController@edit', $contacto->id))->with('status','El contacto' . $id . 'ha sido actualizado');

        // $oldProduct = Product::find($id);

        // $oldProduct->name = $request->input('name');
        // $oldProduct->cost = $request->input('cost');
        // $oldProduct->id_category = $request->input('id_category');
        // $oldProduct->stock = $request->input('stock');

        // $oldProduct->update();

        // return redirect()->route('list.products');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contacto = Contacto::find($id);
        $contacto->delete($contacto->id);

        return redirect()->route('contacto.index');
    }
}
