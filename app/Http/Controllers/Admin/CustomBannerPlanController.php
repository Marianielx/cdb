<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Models\CustomersBannersPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomBannerPlanController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        return view('admin.customBannerPlan.list.index');
    }

    public function fetchplan()
    {
        $plans = CustomersBannersPlan::get();
        return response()->json([
            'plans' => $plans,
        ]);
    }

    public function fetchplans($id)
    {
        $plans = CustomersBannersPlan::where('id', $id)->get();
        return response()->json([
            'plans' => $plans,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'deadline' => 'required|min:1|max:3',
                'state' => 'required|string|max:10',
            ],
            [
                'name.required' => 'Informar o nome do plano',
                'description.required' => 'Informar a descrição do plano',
                'deadline.required' => 'Informaro prazo do plano',
                'state.required' => 'Informar o estado do plano',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $plan = new CustomersBannersPlan;
            $plan->name = $request->input('name');
            $plan->description = $request->input('description');
            $plan->deadline = $request->input('deadline');
            $plan->state = $request->input('state');
            $plan->fk_userId = Auth::user()->id;
            $plan->save();
            return response()->json([
                'status' => 200,
                'message' => 'Plano Adicionado com Sucesso.'
            ]);
        }
    }

    public function edit($id)
    {
        $plan = CustomersBannersPlan::find($id);
        if ($plan) {
            return response()->json([
                'status' => 200,
                'plans' => $plan,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Plano Não Existe.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'deadline' => 'required|min:1|max:3',
                'state' => 'required|string|max:10',
            ],
            [
                'name.required' => 'Informar o nome do plano',
                'description.required' => 'Informar a descrição do plano',
                'deadline.required' => 'Informar o prazo do plano',
                'state.required' => 'Informar o estado do plano',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $plan = CustomersBannersPlan::find($id);
            if ($plan) {
                $plan->name = $request->input('name');
                $plan->description = $request->input('description');
                $plan->deadline = $request->input('deadline');
                $plan->state = $request->input('state');
                $plan->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Plano Alterado com sucesso.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Plano Não Existe.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $contact = CustomersBannersPlan::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Plano Excluido com sucesso.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Plano Não Existe.'
            ]);
        }
    }
}
