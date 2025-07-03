@extends('layout.main')

@section('content')
    {{--

    <body class="bg-background text-foreground"> --}}

        <style>
            .table-absen {
                border: 1px solid white;
            }

            table th,
            table td {
                border: 1px solid white;
                padding: 10px;
                font-size: 11pt;
            }

            th {
                color: white;
                padding: 12px;
            }

            thead {
                font-size: 12pt;
                background: #35A9DB;
            }

            p.text-header-table {
                font-size: 20pt;
                color: darkblue;
                font-weight: bold;
                text-align: center;
                margin-bottom: 10px;
            }

            tbody {
                font-size: 12pt;
                width: auto;
            }
        </style>
        <div class="flex flex-col min-h-screen">

            <main class="flex-1 py-12 md:py-24 lg:py-10">
                <div class="container mx-auto px-4 md:px-6">
                    <div class="text-center mb-12">
                        <h1
                            class="text-4xl font-bold tracking-tighter sm:text-5xl text-primary font-headline text-blue-600">
                            Absensi Kehadiran Laboratorium
                        </h1>
                        <p class="max-w-[800px] mx-auto text-foreground/80 md:text-xl mt-4">
                            Sistem pencatatan kehadiran digital untuk keamanan dan administrasi.
                        </p>
                    </div>

                    <div class="container mx-auto">
                        <p class="text-header-table">
                            Daftar Kehadiran
                        </p>
                        <table class="w-full table-bordered table-striped table-hover" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="table-absen">No</th>
                                    <th class="table-absen">NIP/NPT/NPM/No.KTP</th>
                                    <th class="table-absen">Nama</th>
                                    <th class="table-absen">Status</th>
                                    <th class="table-absen">Lab. Entry Date</th>
                                    <th class="table-absen">Laboratorium</th>
                                    <th class="table-absen">Tujuan</th>
                                    <th class="table-absen">Waktu/Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensis as $index => $absen)
                                    <tr class="bg-gray-100">
                                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ $absen->nip }}</td>
                                        <td class="border px-4 py-2">{{ $absen->nama }}</td>
                                        <td class="border px-4 py-2">{{ $absen->status }}</td>
                                        <td class="border px-4 py-2">{{ $absen->entry_date }}</td>
                                        <td class="border px-4 py-2">{{ $absen->laboratorium }}</td>
                                        <td class="border px-4 py-2">{{ $absen->tujuan }}</td>
                                        <td class="border px-4 py-2">{{ $absen->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            {{--
        </div> --}}
@endsection