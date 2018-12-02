<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Model\Filter;

class FilterController extends Controller
{
    public function item(int $id, Request $requset) : JsonResponse
	{
		try {
			$model = Filter::findOrFail($id);
		}
		catch (\Exception $err) {
			logger($err->getMessage());

			return response()->json([ 
				'status' => false, 
				'message' => $err->getMessage(), 
				'model' => null 
			], 422);
		}

		return response()->json([ 
			'status' => true, 
			'message' => __('responses.item_success'), 
			'model' => $model 
		], 200);
	}

	public function collection(Request $request) : JsonResponse
	{
		$params = $request->all();

		try {
			$all = Filter::select('id', 'name');

			$all = $this->setParamsBeforeQuery($all, $params)
				->get();
		}
		catch (\Exception $err) {
			logger($err->getMessage());

			return response()->json([ 
				'status' => false,
				'message' => $err->getMessage(),
				'collection' => []
			], 422);
		}

		return response()->json([ 
			'status' => true, 
			'collection' => $all, 
			'message' => __('responses.collection_successful') 
		], 200);
	}

	public function create(Request $request) : JsonResponse
	{
		try {
            $request->validate([
                'name' => 'string|max:255'
            ]);
        }
        catch(\Exception $err) {
            return response()->json([
                'status' => false,
                'message' => 'responses.invalid_format',
                'model' => null
            ], 422);
        }

        return DB::transaction(function() use($request) {
            $model = new Filter;
            $model->fill($params = $request->only(
                'name'
            ));
            $model->save();

            return response()->json([
                'status' => true,
                'message' => __('responses.create_successful'),
                'model' => $model
            ], 200);
        });
	}

	public function update(int $id, Request $request) : JsonResponse
	{
		$request->validate([
			'name' => 'string|max:255'
		]);

		try {
			$model = Filter::findOrFail($id);
		}
		catch (\Exception $err) {
			logger($err->getMessage());

			return response()->json([ 
				'status' => false, 
				'message' => $err->getMessage(), 
				'model' => null 
			], 422);
		}

		try {
			$model->fill($request->only('name'));
			$model->save();
		}
		catch (\Exception $err) {
			logger($err->getMessage());

			return response()->json([ 
				'status' => false, 
				'message' => $err->getMessage(), 
				'model' => null 
			], 422);
		}

		return response()->json([ 
			'status' => true, 
			'message' => __('responses.update_successful'), 
			'model' => $model 
		], 200);
	}

	public function delete(int $id, Request $request) : JsonResponse
	{
		try {
			Filter::destroy($id);
		}
		catch (\Exception $err) {
			logger($err->getMessage());

			return response()->json([ 
				'status' => false, 
				'message' => $err->getMessage(), 
				'model' => null 
			], 422);
		}

		return response()->json([ 
			'status' => true, 
			'message' => __('responses.delete_successful'), 
			'model' => null 
		], 200);
	}

	public function setParamsBeforeQuery($q, array $params)
	{
		if (isset($params['query'])) {
			$q = $q->where('name', 'like', '%'. $params['query'] .'%');
		}

		return parent::setParamsBeforeQuery($q, $params);
	}
}
