<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Menampilkan halaman Employee Directory dengan fitur
     * Search, Filter Departemen, dan Pagination.
     */
    public function index(Request $request)
    {
        // Ambil parameter dari URL
        $search     = $request->input('search');
        $department = $request->input('department');

        // Daftar departemen yang tersedia
        $departments = ['IT', 'Finance', 'HR', 'Marketing', 'Operations'];

        // Query dengan when() agar logika bersih dan kondisional
        $employees = Employee::query()
            // Tantangan 2, poin 3: Pencarian berdasarkan nama ATAU email
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            // Tantangan 2, poin 4: Filter berdasarkan departemen
            ->when($department, function ($query, $department) {
                $query->where('department', $department);
            })
            // Tantangan 2, poin 5: Batasi 15 data & pertahankan query string saat pindah halaman
            ->paginate(15)
            ->withQueryString();

        return view('employees.index', compact('employees', 'departments', 'search', 'department'));
    }
}
