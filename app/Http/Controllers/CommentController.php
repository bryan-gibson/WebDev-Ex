<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class CommentController extends Controller
{
    public function index()
    {
        return response(Comment::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Generator $faker)
    {
        $comment = new Comment();
        $comment->name = $faker->lexify('???? ?????');
        $comment->text = $faker->lexify('Hello, this is my comment that says: ???? ?????');
        $comment->save();

        return response($comment->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->text = $request->text;
        $comment->save();

        return response($comment->jsonSerialize(), Response::HTTP_CREATED);
        //dd($request->all());
    }

    /*public function update(Request $request, $id)
    {
        $crud = Crud::findOrFail($id);
        $crud->color = $request->color;
        $crud->save();

        return response(null, Response::HTTP_OK);
    }*/

    public function destroy($id)
    {
        Comment::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
