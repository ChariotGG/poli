
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Data Pasien
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pasien.index') }}">Lihat Data</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('pasien.create') }}">Tambah Data</a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Data Pendaftaran
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <li>
            <a class="dropdown-item" href="{{ route('pendaftaran.index') }}">Lihat Data Pendaftaran</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('pendaftaran.create') }}">Tambah Data Pendaftaran</a>
        </li>
    </ul>
</li>
