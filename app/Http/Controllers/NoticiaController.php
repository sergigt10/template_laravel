<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();

        // Noticas con paginación
        $noticias = Noticia::where('user_id', $usuario->id)->paginate(10);

        return view('noticias.index')
            ->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen_1' => 'required|image|max:10240',
            'imagen_2' => 'required|image|max:10240',
            'imagen_3' => 'required|image|max:10240',
            'imagen_4' => 'required|image|max:10240',
            'video' => 'required|mimes:mp4|max:10240',
        ]);

        $ruta_imagen_1 = $request['imagen_1']->store('img-noticias', 'public');
        $ruta_imagen_2 = $request['imagen_2']->store('img-noticias', 'public');
        $ruta_imagen_3 = $request['imagen_3']->store('img-noticias', 'public');
        $ruta_imagen_4 = $request['imagen_4']->store('img-noticias', 'public');

        $ruta_video = $request['video']->store('video-noticias', 'public');

        $img_1 = Image::make( storage_path("app/public/{$ruta_imagen_1}") )->fit(1200, 550);
        $img_1->save();
        $img_2 = Image::make( storage_path("app/public/{$ruta_imagen_2}") )->fit(1200, 550);
        $img_2->save();
        $img_3 = Image::make( storage_path("app/public/{$ruta_imagen_3}") )->fit(1200, 550);
        $img_3->save();
        $img_4 = Image::make( storage_path("app/public/{$ruta_imagen_4}") )->fit(1200, 550);
        $img_4->save();

        $noticia = new Noticia($data);
        $noticia->imagen_1 = $ruta_imagen_1;
        $noticia->imagen_2 = $ruta_imagen_2;
        $noticia->imagen_3 = $ruta_imagen_3;
        $noticia->imagen_4 = $ruta_imagen_4;
        $noticia->video = $ruta_video;
        $noticia->user_id = auth()->user()->id;
        $noticia->save();

        // Redireccionar
        return redirect()->action('NoticiaController@index')->with('estado', 'Tu información se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        // Revisar el policy
        $this->authorize('view', $noticia);

        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        // Revisar el policy
        $this->authorize('update', $noticia);

        // Validación
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        // Asignar los valores
        $noticia->titulo = $data['titulo'];
        $noticia->descripcion = $data['descripcion'];

        // Si el usuario sube una nueva imagen
        if($request['imagen_1']) {

            $ruta_imagen_1 = $request['imagen_1']->store('img-noticias', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imagen_1}") )->fit(1200, 550);
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->imagen_1"))) {
                File::delete(storage_path("app/public/$noticia->imagen_1"));

                // Asignar al objeto
                $noticia->imagen_1 = $ruta_imagen_1;
            }  
        }

        if($request['imagen_2']) {

            $ruta_imagen_2 = $request['imagen_2']->store('img-noticias', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imagen_2}") )->fit(1200, 550);
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->imagen_2"))) {
                File::delete(storage_path("app/public/$noticia->imagen_2"));

                // Asignar al objeto
                $noticia->imagen_2 = $ruta_imagen_2;
            }  
        }

        if($request['imagen_3']) {

            $ruta_imagen_3 = $request['imagen_3']->store('img-noticias', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imagen_3}") )->fit(1200, 550);
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->imagen_3"))) {
                File::delete(storage_path("app/public/$noticia->imagen_3"));

                // Asignar al objeto
                $noticia->imagen_3 = $ruta_imagen_3;
            }  
        }

        if($request['imagen_4']) {

            $ruta_imagen_4 = $request['imagen_4']->store('img-noticias', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imagen_4}") )->fit(1200, 550);
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->imagen_4"))) {
                File::delete(storage_path("app/public/$noticia->imagen_4"));

                // Asignar al objeto
                $noticia->imagen_4 = $ruta_imagen_4;
            }  
        }

        if($request['video']) {

            $ruta_video = $request['video']->store('video-noticias', 'public');

            // Eliminamos el video anterior
            if (File::exists(storage_path("app/public/$noticia->video"))) {
                File::delete(storage_path("app/public/$noticia->video"));

                // Asignar al objeto
                $noticia->video = $ruta_video;
            }  
        }

        $noticia->save();

        // Redireccionar
        return redirect()->action('NoticiaController@index')->with('estado', 'Tu información se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        // Ejecutar el policy
        $this->authorize('delete', $noticia);

        // Eliminamos las imágenes
        if (File::exists(storage_path("app/public/$noticia->imagen_1"))) {
            File::delete(storage_path("app/public/$noticia->imagen_1"));
        }
        if (File::exists(storage_path("app/public/$noticia->imagen_2"))) {
            File::delete(storage_path("app/public/$noticia->imagen_2"));
        }  
        if (File::exists(storage_path("app/public/$noticia->imagen_3"))) {
            File::delete(storage_path("app/public/$noticia->imagen_3"));
        }  
        if (File::exists(storage_path("app/public/$noticia->imagen_4"))) {
            File::delete(storage_path("app/public/$noticia->imagen_4"));
        } 
        
        if (File::exists(storage_path("app/public/$noticia->video"))) {
            File::delete(storage_path("app/public/$noticia->video"));
        }  

        // Eliminar la receta
        $noticia->delete();

        return redirect()->action('NoticiaController@index');
    }
}
