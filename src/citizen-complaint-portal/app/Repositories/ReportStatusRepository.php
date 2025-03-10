<?php

namespace App\Repositories;

use App\Models\ReportStatus;
use App\Interface\ReportStatusRepositoryInterface;
use App\Models\User;

class ReportStatusRepository implements ReportStatusRepositoryInterface 
{
    public function getAllReportStatuses() 
    {
        return ReportStatus::all();
        //menggunakan fungsi all untuk mengambil semua data ReportStatus
    }

    public function getReportStatusById(int $id) 
    {
        return ReportStatus::where('id', $id)->first();
    }

    public function createReportStatus(array $data) 
    {
        
        return ReportStatus::create($data);
    }

    public function updateReportStatus(array $data, int $id) 
    {
        $reportStatus = $this->getReportStatusById($id);
        return $reportStatus->update($data);
    }

    public function deleteReportStatus(int $id) 
    {
        $reportStatus = $this->getReportStatusById($id);
        //menggunakan fungsi getReportStatusById untuk mengambil data ReportStatus berdasarkan id
        return $reportStatus->delete();
        //menggunakan fungsi delete untuk menghapus data ReportStatus berdasarkan id
    }

}