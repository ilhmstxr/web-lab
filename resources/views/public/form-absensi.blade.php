@extends('layout.main')

@section('content')

    <style>
        h2.teks-judul {
            margin-top: 30px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: rgb(17, 116, 221);
            font-family: Poppins;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
            max-width: 100%;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: var(--black1);
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
            background-color: whitesmoke;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
            background-color: whitesmoke;
        }

        .form-group input:focus {
            border-color: var(--orange);
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background: rgb(17, 116, 221);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
    </style>

    <div class="text-header">
        <h2 class="teks-judul">
            Form Absensi
        </h2>
    </div>
    <div class="form-container">
        <form id="form-input" method="POST" action="{{ route('FormAbsensi.store') }}">
            @csrf

            @if(session('success'))
                <div style="color: green; font-weight: bold;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group">
                <label for="nip">NIP/NPM/NO.KTP</label>
                <input type="number" id="nip" name="nip">
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">-- Pilih Status --</option>
                    <option value="Belum Mulai">Belum Mulai</option>
                    <option value="On Progress">On Progress</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="entry_date">Entry Date</label>
                <input type="date" id="entry_date" name="entry_date">
            </div>

            <div class="form-group">
                <label for="laboratorium">Laboratorium</label>
                <select id="laboratorium" name="laboratorium">
                    <option value="">-- Pilih Laboratorium --</option>
                    <option value="Lab SSI">Lab SSI</option>
                    <option value="Lab MSI">Lab MSI</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan">
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
@endsection