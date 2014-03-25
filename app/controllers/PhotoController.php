<?php

use Illuminate\Support\MessageBag;

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$d['photos'] = Photo::withTrashed()->paginate(10);

		return View::make('admin.photo.index', $d);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.photo.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::hasFile('photo')) {

			if (!in_array(Input::file('photo')->getClientOriginalExtension(), Config::get('app.upload_extensions')))
				return Response::json(['success' => false, 'error' => 'We do not accept this file type'], 400);

			$filename = 'photo-' . Str::slug(Input::file('photo')->getClientOriginalName()) . '.' . Input::file('photo')->getClientOriginalExtension();

			Input::file('photo')->move(public_path() . '/' . Config::get('app.upload_destination'), $filename);

			$photo = new Photo;

			$photo->name = Input::file('photo')->getClientOriginalName();
			$photo->filename = $filename;
			$photo->filesize = Input::file('photo')->getClientSize();

			$photo->save();

			return Response::json(['success' => true, 'message' => 'Your image was successfully uploaded']);

		}

		return Response::json(['success' => false, 'error' => 'We could not locate the image you uploaded. Please try again'], 400);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Photo  $photo
	 * @return Response
	 */
	public function edit($photo)
	{
		return View::make('admin.photo.edit', ['photo' => $photo]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Photo  $photo
	 * @return Response
	 */
	public function update($photo)
	{
		$photo->name = Input::get('name');

		$photo->save();

		return Redirect::to('/admin/photo/edit/' . $photo->id);
	}

	/**
	 * Remove the specified resource.
	 *
	 * @param  Photo  $photo
	 * @return Response
	 */
	public function destroy($photo)
	{
		$photo->delete();

		return Redirect::back()->with('messages', new MessageBag(['The photo was successfully deleted']));
	}

	/**
	 * Restore the specified resource.
	 *
	 * @param  Photo  $photo
	 * @return Response
	 */
	public function restore($photo)
	{
		$photo->restore();

		return Redirect::back()->with('messages', new MessageBag(['The photo was successfully restored']));
	}

}
