<?php

namespace App\Http\Controllers;

use App\Logic\Contractor;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPage(){
        return view('website.pages.about');
    }
    public function servicesPage(){
        return view('website.pages.services');
    }
    public function projectsPage(){
        return view('website.pages.projects');
    }
    public function contactPage(){
        return view('website.pages.contact');
    }
    public function listProperties(){
        return view('website.pages.properties');
    }
    public function login(){
        return view('website.welcome');
    }
    public function adminDashboard(){
        return view('Admin.pages.index');
    }
    public function adminProjectsPage(){
        return view('Admin.pages.projects');
    }
    public function adminRescourcesPage(){
        return view('Admin.pages.resources');
    }
    public function adminWorkspace(){
        return view('Admin.pages.workspace');
    }
    public function budgetReport(){
        return view('Admin.pages.Reports.Budget');
    }
    public function progressReport(){
        return view('Admin.pages.Reports.Progress');
    }
    public function materialReport(){
        return view('Admin.pages.Reports.Material');
    }
    public function assignmentPage(){
        return view('Admin.pages.Workspace.assignment');
    }
    public function payrollPage(){
        return view('Admin.pages.Workspace.payroll');
    }
    public function attendencePage(){
        return view('Admin.pages.Workspace.attendence');
    }
    public function schedulePage(){
        return view('Admin.pages.schedule');
    }
    public function adminBiddingPage(){
        return view('Admin.pages.bidding');
    }
    public function contractorPage(Contractor $contractor){
        return view('Admin.pages.contractor',['contractors'=>$contractor->getContractors()]);
    }
}
