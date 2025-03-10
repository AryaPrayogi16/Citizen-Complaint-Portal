<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\ReportCategoryRepositoryInterface;
use App\Interface\ReportRepositoryInterface;

class HomeController extends Controller
{
    private ReportRepositoryInterface $reportRepository;
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportRepository = $reportRepository;    
        $this->reportCategoryRepository = $reportCategoryRepository;
    }
    public function index()
    {
        $categories = $this->reportCategoryRepository->getAllReportCategories();
        $reports = $this->reportRepository->getLatestReports();
        return view('pages.app.home', compact('categories', 'reports'));
    }
}
