<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateLeadRequest;
use App\Lead;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index()
    {
        $searchParams   = \request()->get('search');
        $limit        = \request()->get('limit', 5);
        $leads          = Lead::query()
                              ->where('branch_id', 1)
                              ->where(
                                  function ($query) use ($searchParams) {
                                      $query->where('name', 'ilike', '%'.$searchParams.'%')
                                            ->orWhere('email', 'ilike', '%'.$searchParams.'%');
                                  }
                              )
                              ->orderBy('name')
                              ->paginate($limit);
        $paginatedLinks = $this->paginationLinks($leads);
        $initialSearch  = $searchParams ?? '';


        return Inertia::render(
            'Leads/Index',
            compact(['leads', 'paginatedLinks', 'initialSearch'])
        );
    }

    public function show($leadId)
    {

        $lead = Lead::findOrFail((int) $leadId);
        $lead->load('reminders');

        return Inertia::render(
            'Leads/Show',
            [
                'leadDetail' => $lead,
            ]
        );
    }

    public function create()
    {
        $data = [
            'packages' => Package::orderBy('name')->get(),
        ];

        return Inertia::render('Leads/CreateLead', $data);
    }

    public function store(CreateUpdateLeadRequest $request)
    {
        $data              = $request->validated();
        $data['added_by']  = Auth::user()->id;
        $data['branch_id'] = 1;
        $data['age']       = Carbon::parse($data['dob'])->age;

        Lead::create($data);

        return redirect()->route('leads.index')->with('success', 'Lead added successfully.');
    }

    public function update(CreateUpdateLeadRequest $request, int $leadId)
    {
        $data        = $request->validated();
        $data['age'] = Carbon::parse($data['dob'])->age;

        $lead = Lead::where('id', $leadId)->update($data);

        return redirect()->route('leads.show', $leadId)->with('success', 'Lead updated successfully.');
    }


    function paginationLinks($lengthAwarePaginator)
    {

        $window = UrlWindow::make($lengthAwarePaginator);

        $isCurrentPageSet = false;


        // dd($lengthAwarePaginator->toArray());

        $array = array_filter(
            [
                $window['first'],
                is_array($window['slider']) ? '...' : null,
                $window['slider'],
                is_array($window['last']) ? '...' : null,
                $window['last'],
            ]
        );
        $i     = 1;
        foreach ( $array as $index => $urlsArray ):

            if ( is_array($urlsArray) ):
                foreach ( $urlsArray as $pageNumber => $link ):
                    $currentPage = $lengthAwarePaginator->currentPage();
                    $n[]         = [
                        'pageNumber'    => $pageNumber,
                        'url'           => $link,
                        'indexKey'      => $i,
                        'type'          => 'URLS',
                        'isCurrentPage' => $currentPage === $pageNumber,
                    ];
                    $i++;
                endforeach;
            elseif ( is_string($urlsArray) ):
                $n[] = [
                    'url'      => $urlsArray,
                    'indexKey' => $i,
                    'type'     => 'ELIPSIS',
                ];
                $i++;
            endif;

        endforeach;

        return $n;
    }
}
