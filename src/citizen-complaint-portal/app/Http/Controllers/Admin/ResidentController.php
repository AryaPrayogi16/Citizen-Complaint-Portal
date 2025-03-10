<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Interface\ResidentRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ResidentController extends Controller
{

    private ResidentRepositoryInterface $residentRepository;

    public function __construct(ResidentRepositoryInterface $residentRepository)
    {
        $this->residentRepository = $residentRepository;
    }
    public function index()
    {
        $residents = $this->residentRepository->getAllResidents();
        return view('pages.admin.resident.index', compact('residents'));
        // return view('pages.admin.resident.index');
        // resident diambil dari folder views/pages/admin/resident/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.resident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResidentRequest $request)
    {
        $data = $request->validated();
        // untuk menyimpan file avatar
        $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
        // menyimpan data resident
        $this->residentRepository->createResident($data);

        Swal::toast('Data Masyarakat Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.resident.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resident = $this->residentRepository->getResidentById($id);
        return view('pages.admin.resident.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resident = $this->residentRepository->getResidentById($id);
        return view('pages.admin.resident.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResidentRequest $request, string $id)
    {
          $data = $request->validated();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
            }
            $this->residentRepository->updateResident($data, $id);

            Swal::toast('Data Masyarakat Berhasil Diubah', 'success')->timerProgressBar();
            return redirect()->route('admin.resident.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->residentRepository->deleteResident($id);

        Swal::toast('Data Masyarakat Berhasil Dihapus', 'success')->timerProgressBar();

        return redirect()->route('admin.resident.index'); 

    }
}
