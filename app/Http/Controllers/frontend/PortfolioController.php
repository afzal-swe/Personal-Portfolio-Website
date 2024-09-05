<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    //

    private $db_project_portfolio;






    /**
     * Create a new controller instance and initialize the database table name.
     *
     * Sets the database table name for project portfolios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_project_portfolio = "project_portfolio";
    }






    /**
     * Retrieve and display project portfolios of type '1'.
     *
     * Fetches project portfolios from the database where the type is '1', orders them by ID in descending order,
     * and returns a view with the portfolio data.
     *
     * @return \Illuminate\View\View
     */
    public function Portfolio()
    {
        $portfolio = DB::table($this->db_project_portfolio)
            ->where('type', '1')
            ->orderBy('id', 'DESC')
            ->get();
        // dd($portfolio);
        return view('frontend.portfolio.portfolio', compact('portfolio'));
    }








    /**
     * Retrieve and display details of a specific project portfolio.
     *
     * Fetches a project portfolio from the database by its ID and returns a view with the portfolio data.
     *
     * @param int $id The ID of the project portfolio to retrieve.
     * @return \Illuminate\View\View
     */
    public function Portfolio_Details($id)
    {
        $portfolio = DB::table($this->db_project_portfolio)->where('id', $id)->first();

        return view('frontend.portfolio.portfolio_details', compact('portfolio'));
    }
}
