<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

class PictureController extends Controller
{
    /**
     * @var Picture
     */
    private $model;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    public function __construct(Picture $model, Request $request, Response $response)
    {
        $this->model = $model;
        $this->request = $request;
        $this->response = $response;
    }

    public function index()
    {
        return view('index_picture', ['model' => $this->model->all()]);
    }

    public function store()
    {
        $img = $this->request->file('img');

        $extension = $img->extension();
        $type = $img->getClientMimeType();
        $size = $img->getClientSize();
        $file = file_get_contents($img->path());

        $data = $this->request->only(['description']);
        $data['extension'] = $extension;
        $data['type'] = $type;
        $data['size'] = $size;
        $data['file'] = $file;

        $this->model->create($data);

        return redirect('/picture');
    }

    public function view($id)
    {
        $model = $this->model->find($id);

        if ($model)
        {
            $picture = Image::make($model->file);
            $response = $this->response->create($picture->encode($model->extension));
            $response->header('Content-Type', $model->type);

            return $response;
        }
        return null;

    }

    private function render($fileName)
    {
        $file = fopen($fileName, "rb");
        $contents = fread($file, filesize($fileName));
        fclose($file);
        return $contents;
    }
}