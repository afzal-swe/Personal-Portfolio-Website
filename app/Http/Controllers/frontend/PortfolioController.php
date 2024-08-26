<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    //

    private $db_project_portfolio;

    public function __construct()
    {
        $this->db_project_portfolio = "project_portfolio";
    }


    public function Portfolio()
    {
        $portfolio = DB::table($this->db_project_portfolio)->where('type', '1')->orderBy('id', 'DESC')->get();
        // dd($portfolio);
        return view('frontend.portfolio.portfolio', compact('portfolio'));
    } // End Method

    // Portfolio Details Function

    public function Portfolio_Details($id)
    {
        $portfolio = DB::table($this->db_project_portfolio)->where('id', $id)->first();

        return view('frontend.portfolio.portfolio_details', compact('portfolio'));
    }
}
