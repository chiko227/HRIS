<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS — Direktori Karyawan</title>
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f5f7fb;color:#172033;font-family:Inter,"Segoe UI",Arial,sans-serif;font-size:14px}
        .layout{min-height:100vh;display:flex}.sidebar{width:248px;background:#111c35;color:#c7d0e0;padding:28px 18px;flex-shrink:0}
        .brand{display:flex;align-items:center;gap:11px;padding:0 10px 34px;color:#fff;font-size:19px;font-weight:750;letter-spacing:-.5px}
        .brand-mark{display:grid;place-items:center;width:36px;height:36px;border-radius:10px;background:#e7efff;color:#203c76;font-size:17px;font-weight:800}
        .nav-label{padding:0 12px;margin:0 0 10px;color:#7f8ca8;font-size:10px;font-weight:700;letter-spacing:1.5px}
        .nav-link{display:flex;align-items:center;gap:12px;padding:12px;border-radius:9px;margin:4px 0;color:#b8c3d8;text-decoration:none;font-weight:500}
        .nav-link.active{background:#263657;color:#fff}.nav-icon{width:20px;text-align:center;font-size:16px}
        .side-bottom{margin:45px 8px 0;padding:17px 12px;border:1px solid #2a3855;border-radius:11px;color:#aab6cb;font-size:12px;line-height:1.6}
        .main{min-width:0;flex:1}.topbar{height:76px;background:#fff;border-bottom:1px solid #e8ecf3;display:flex;align-items:center;justify-content:space-between;padding:0 38px}
        .crumb{font-size:13px;color:#7c879b}.crumb strong{color:#26344e;font-weight:650}.profile{display:flex;align-items:center;gap:11px}.avatar{width:37px;height:37px;display:grid;place-items:center;border-radius:50%;background:#e8edf8;color:#253b67;font-weight:750}.profile-name{font-size:13px;font-weight:650}.profile-role{font-size:11px;color:#8b95a7;margin-top:3px}
        .content{max-width:1400px;padding:34px 38px;margin:auto}.heading{display:flex;justify-content:space-between;align-items:flex-end;gap:16px;margin-bottom:25px}.eyebrow{color:#647da8;text-transform:uppercase;letter-spacing:1.4px;font-size:10px;font-weight:750;margin-bottom:9px}.heading h1{font-size:27px;letter-spacing:-.8px;margin:0;font-weight:750;color:#18243b}.heading p{color:#7c879b;margin:8px 0 0;font-size:13px}
        .stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px;margin-bottom:24px}.stat{background:#fff;border:1px solid #e7ebf2;border-radius:12px;padding:19px 21px}.stat-label{color:#78849a;font-size:12px}.stat-value{font-size:25px;font-weight:750;letter-spacing:-.5px;margin:10px 0 4px}.stat-note{font-size:11px;color:#8b96a8}
        .panel{background:#fff;border:1px solid #e5eaf2;border-radius:13px;overflow:hidden}.panel-head{padding:20px 23px;border-bottom:1px solid #edf0f5;display:flex;align-items:center;justify-content:space-between;gap:14px}.panel-title{font-size:15px;font-weight:700}.panel-subtitle{font-size:12px;color:#8b95a7;margin-top:5px}.count{padding:6px 9px;background:#f0f4fb;color:#506486;border-radius:6px;font-size:11px;font-weight:650}
        form.filters{padding:19px 23px;display:flex;gap:13px;align-items:flex-end;border-bottom:1px solid #edf0f5}.field{flex:1;min-width:160px}.field label{display:block;font-size:11px;font-weight:650;color:#69768c;margin-bottom:8px}.field input,.field select{height:40px;width:100%;border:1px solid #dfe5ee;border-radius:7px;padding:0 12px;background:#fbfcfe;color:#29364e;font:inherit;outline:none}.field input:focus,.field select:focus{border-color:#839ac4;box-shadow:0 0 0 3px #edf2fb}.btn{height:40px;border:0;border-radius:7px;padding:0 17px;background:#20365e;color:white;font-weight:650;font-size:12px;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;justify-content:center}.btn:hover{background:#2e4978}.btn-reset{border:1px solid #dfe5ee;background:white;color:#59677d}
        .table-wrap{overflow-x:auto}table{width:100%;border-collapse:collapse;white-space:nowrap}thead{background:#f8f9fc}th{text-align:left;padding:13px 22px;color:#8490a3;font-size:10px;letter-spacing:.7px;text-transform:uppercase;font-weight:750;border-bottom:1px solid #e9edf4}td{padding:16px 22px;border-bottom:1px solid #f0f2f6;color:#566278;font-size:12px}tbody tr:hover{background:#fafbfe}.person{display:flex;align-items:center;gap:11px}.mini-avatar{width:34px;height:34px;display:grid;place-items:center;border-radius:9px;background:#edf1f9;color:#334a76;font-size:11px;font-weight:750}.person-name{color:#26334a;font-size:12px;font-weight:700}.person-caption{color:#9aa3b2;font-size:10px;margin-top:4px}.dept{display:inline-block;padding:6px 9px;border-radius:5px;background:#f0f3f8;color:#586a88;font-size:10px;font-weight:650}.empty{text-align:center;padding:48px 16px;color:#758198}.pagination{padding:17px 22px;color:#748096;font-size:12px}.pagination nav{display:flex;justify-content:space-between;align-items:center}.pagination a,.pagination span{padding:5px 9px}
        @media(max-width:900px){.sidebar{width:205px}.topbar{padding:0 22px}.content{padding:28px 22px}.stats{gap:10px}.stat{padding:16px}}
        @media(max-width:650px){.layout{display:block}.sidebar{width:100%;padding:15px 16px}.brand{padding:0 5px 13px}.nav-label,.nav-link:not(.active),.side-bottom{display:none}.nav-link.active{display:inline-flex;padding:9px 12px;margin:0}.topbar{height:60px;padding:0 17px}.content{padding:23px 15px}.heading{align-items:flex-start}.heading h1{font-size:23px}.stats{grid-template-columns:1fr}.stat{padding:14px 17px}.stat-value{font-size:22px}form.filters{padding:16px;display:grid;grid-template-columns:1fr}.field{min-width:0}.filter-actions{display:flex;gap:8px}.panel-head{padding:17px}.profile-role{display:none}}
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand"><span class="brand-mark">H</span><span>HRIS<span style="color:#8fa6d4">.</span></span></div>
        <div class="nav-label">MENU UTAMA</div>
        <a class="nav-link active" href="{{ route('employees.index') }}"><span class="nav-icon">▦</span> Direktori Karyawan</a>
        <div class="side-bottom"><strong style="display:block;color:#e2e8f4;margin-bottom:5px">Human Resources</strong>Sistem informasi dan pengelolaan data karyawan.</div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="crumb">HRIS <span style="padding:0 8px;color:#c0c8d5">/</span> <strong>Direktori Karyawan</strong></div>
            <div class="profile"><div class="avatar">HR</div><div><div class="profile-name">Administrator</div><div class="profile-role">Human Resources</div></div></div>
        </header>

        <div class="content">
            <div class="heading">
                <div><div class="eyebrow">Human Resource Information System</div><h1>Direktori Karyawan</h1>
                <p>Kelola dan temukan informasi karyawan dalam satu tempat.</p></div>
            </div>

            <div class="stats">
                <div class="stat"><div class="stat-label">Total Karyawan</div><div class="stat-value">{{ $employees->total() }}</div><div class="stat-note">Data karyawan terdaftar</div></div>
                <div class="stat"><div class="stat-label">Departemen</div><div class="stat-value">{{ count($departments) }}</div><div class="stat-note">Departemen tersedia</div></div>
                <div class="stat"><div class="stat-label">Hasil Pencarian</div><div class="stat-value">{{ $employees->count() }}</div><div class="stat-note">Data pada halaman ini</div></div>
            </div>

            <section class="panel">
                <div class="panel-head"><div><div class="panel-title">Daftar Karyawan</div><div class="panel-subtitle">Informasi nama, kontak, posisi, dan departemen</div></div><span class="count">{{ $employees->total() }} karyawan</span></div>
                <form method="GET" action="{{ route('employees.index') }}" class="filters">
                    <div class="field"><label for="search">Cari karyawan</label><input type="text" name="search" id="search" value="{{ $search }}" placeholder="Nama atau alamat email"></div>
                    <div class="field" style="max-width:220px"><label for="department">Departemen</label><select name="department" id="department"><option value="">Semua departemen</option>@foreach($departments as $dept)<option value="{{ $dept }}" @selected($department === $dept)>{{ $dept }}</option>@endforeach</select></div>
                    <div class="filter-actions"><button type="submit" class="btn">Terapkan Filter</button>@if($search || $department)<a href="{{ route('employees.index') }}" class="btn btn-reset">Reset</a>@endif</div>
                </form>

                <div class="table-wrap"><table>
                    <thead><tr><th>Karyawan</th><th>Email</th><th>Posisi</th><th>Departemen</th></tr></thead>
                    <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td><div class="person"><div class="mini-avatar">{{ collect(explode(' ', trim($employee->name)))->take(2)->map(fn($part) => mb_substr($part, 0, 1))->implode('') }}</div><div><div class="person-name">{{ $employee->name }}</div><div class="person-caption">ID Karyawan #{{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</div></div></div></td>
                            <td>{{ $employee->email }}</td><td>{{ $employee->position ?: '—' }}</td><td><span class="dept">{{ $employee->department }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="empty"><strong>Tidak ada karyawan ditemukan</strong><br><span style="display:inline-block;margin-top:6px">Ubah kata kunci atau filter departemen, lalu coba lagi.</span></td></tr>
                    @endforelse
                    </tbody>
                </table></div>
                @if($employees->hasPages())<div class="pagination">{{ $employees->links() }}</div>@endif
            </section>
        </div>
    </main>
</div>
</body>
</html>
