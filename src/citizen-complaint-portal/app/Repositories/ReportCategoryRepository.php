<?php

namespace App\Repositories;

use App\Models\ReportCategory;
use App\Interface\ReportCategoryRepositoryInterface;
use App\Models\User;

class ReportCategoryRepository implements ReportCategoryRepositoryInterface 
{
    public function getAllReportCategories() 
    {
        return ReportCategory::all();
        //menggunakan fungsi all untuk mengambil semua data ReportCategory
    }

    public function getReportCategoryById(int $id) 
    {
        return ReportCategory::where('id', $id)->first();
    }

    public function createReportCategory(array $data) 
    {
        
        return ReportCategory::create($data);
    }

    public function updateReportCategory(array $data, int $id) 
    {
        $reportCategory = $this->getReportCategoryById($id);
        return $reportCategory->update($data);
    }

    public function deleteReportCategory(int $id) 
    {
        $reportCategory = $this->getReportCategoryById($id);
        //menggunakan fungsi getReportCategoryById untuk mengambil data ReportCategory berdasarkan id
        return $reportCategory->delete();
        //menggunakan fungsi delete untuk menghapus data ReportCategory berdasarkan id
    }

}