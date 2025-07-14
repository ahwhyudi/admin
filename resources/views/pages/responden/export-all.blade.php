<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="background-color: #FFFBDB; border: 1px solid #000000;" width="16">Responden
                </th>
                @foreach ($soal as $item)
                    <th scope="col" style="background-color: #FFFBDB; border: 1px solid #000000;" width="16">
                        {{ $item->title }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTarget as $responden)
                <tr>
                    {{-- <th scope="row">{{$responden->nama}}</th>
                @foreach ($soal as $itemSoal)
                    @if ($itemSoal->yes_no && $responden->pilihanTarget->where('soal_id', $itemSoal->id)->first())
                        <td>{{$responden->pilihanTarget->where('soal_id', $itemSoal->id)->first()->yes_no === 'iya' ? 'A. Iya' : "B. Tidak"}}</td>
                    @elseif ($responden->pilihanTarget->where('soal_id', $itemSoal->id)->first())

                        @php
                            $temp_indexAbjad = null
                        @endphp
                        @if ($responden->pilihanTarget->where('soal_id', $itemSoal->id)->first())
                            @foreach ($itemSoal->pilihan as $indexAbjad => $findAbjad)
                                @if ($responden->pilihanTarget->where('soal_id', $itemSoal->id)->first()->pilihan->id === $findAbjad->id)
                                    @php
                                        $temp_indexAbjad = $indexAbjad;
                                    @endphp
                                @endif
                            @endforeach
                            <td>{{$abjad[$temp_indexAbjad]}}. {{$responden->pilihanTarget->where('soal_id', $itemSoal->id)->first()->pilihan->title}}</td>
                            //ini juga
                            {{dd($itemSoal->id)}}
                        @else
                            <td>-</td>
                        @endif

                        @php
                            $indexAbjad = null
                        @endphp
                        //jangan lupa di tutup
                        <td>{{$responden->pilihanTarget->where('soal_id', $itemSoal->id)->first() ? $responden->pilihanTarget->where('soal_id', $itemSoal->id)->first()->pilihan->title : "-"}}</td>
                    @else
                        <td>-</td>
                    @endif --}}

                    <th scope="row">{{ $responden->nama }}</th>
                    @foreach ($soal as $itemSoal)
                        @php
                            $pilihanTarget = $responden->pilihanTarget->where('soal_id', $itemSoal->id)->first();
                        @endphp

                        @if ($itemSoal->yes_no && $pilihanTarget)
                            <td>{{ $pilihanTarget->yes_no === 'iya' ? 'A. Iya' : 'B. Tidak' }}</td>
                        @elseif ($pilihanTarget && $pilihanTarget->pilihan)
                            @php
                                $temp_indexAbjad = null;
                                foreach ($itemSoal->pilihan as $indexAbjad => $findAbjad) {
                                    if ($pilihanTarget->pilihan->id === $findAbjad->id) {
                                        $temp_indexAbjad = $indexAbjad;
                                        break;
                                    }
                                }
                            @endphp

                            @if (!is_null($temp_indexAbjad) && isset($abjad[$temp_indexAbjad]))
                                <td>{{ $abjad[$temp_indexAbjad] }}. {{ $pilihanTarget->pilihan->title }}</td>
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
            @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
