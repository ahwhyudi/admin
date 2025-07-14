@push('addStyle')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
<div class="mt-5">

    <div class="card loading_map" aria-hidden="true">
        <div class="card-body">
            <h5 class="card-title placeholder-glow">
                <span class="placeholder col-3" style="height: 84px">
                    <div class="text-white d-flex align-items-center justify-content-center h-100">Loading data</div>
                </span>
                <span class="placeholder col-3" style="height: 84px">
                    <div class="text-white d-flex align-items-center justify-content-center h-100">Loading data</div>
                </span>
                <span class="placeholder col-3" style="height: 84px">
                    <div class="text-white d-flex align-items-center justify-content-center h-100">Loading data</div>
                </span>
            </h5>
            <p class="card-text placeholder-glow">
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
            </p>
            <div tabindex="-1" class="btn btn-primary placeholder col-6"></div>
        </div>
    </div>

    <div class="row statistik" style="display: none">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col border rounded me-3 p-2">
                            <div>Provinsi</div>
                            <div class="h2 mb-0" id="count_Provinsi">0</div>
                        </div>
                        <div class="col border rounded me-3 p-2">
                            <div>Kota</div>
                            <div class="h2 mb-0" id="count_Kota">0</div>
                        </div>
                        <div class="col border rounded me-3 p-2">
                            <div>Kecamatan</div>
                            <div class="h2 mb-0" id="count_Kecamatan">0</div>
                        </div>
                    </div>
                    
                <div id="chart-tasks-overview"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-5 statistik" >
    <div id="mapid2" style="width: 100%; height: 500px;"></div>
</div>
{{-- statistik end --}}
{{-- @endsection --}}

@push('addScript')

{{-- statistik --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
 integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
 crossorigin=""></script>

<script>
var mymap2 = L.map('mapid2').setView([-6.2470928, 106.6501857], 11);

$.ajax({
    url: "{{route('admin.data.responden-statistik')}}",
    type: "GET",
    success: function(data){
        let dataSeries = [];
        let dataLabel = [];
        data.responden.forEach(element => {
            dataSeries.push(element.total)
            dataLabel.push(element.rel_kecamatan.nama)
        });

        $("#count_Provinsi").text(data.count['provinsi'])
        $("#count_Kota").text(data.count['kota'])
        $("#count_Kecamatan").text(data.count['kecamatan'])


        // chart
        var options = {
        series: [{
            name: 'Jumlah',
            data: dataSeries
            }],
        annotations: {
        points: [{
            x: 'Relawan',
            seriesIndex: 0,
            label: {
            offsetY: 0,

            text: 'Chart Statistik Relawan Perkecamatan',
            }
        }]
        },
        chart: {
        height: 350,
        type: 'bar',
        },
        plotOptions: {
        bar: {
            borderRadius: 10,
            columnWidth: '50%',
        }
        },
        dataLabels: {
        enabled: false
        },
        stroke: {
        width: 2
        },

        grid: {

        },
        xaxis: {
        labels: {
            rotate: -45
        },
        categories: dataLabel,
        tickPlacement: 'on'
        },
        yaxis: {
        title: {
            text: 'Statistik Diagram Responden',
        },
        },
        fill: {
        // type: 'gradient',
        // gradient: {
        //     shade: 'light',
        //     type: "horizontal",
        //     shadeIntensity: 0.25,
        //     gradientToColors: undefined,
        //     inverseColors: true,
        //     opacityFrom: 0.85,
        //     opacityTo: 0.85,
        //     stops: [50, 0, 100]
        // },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-tasks-overview"), options);
        chart.render();
        // chart end

        // map
        data.all_responden.forEach(element => {
            marker = new L.marker([element.latitude, element.longitude])
            .bindPopup(element.nama)
            .addTo(mymap2);
        });

        let layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 100,
            zoomSnap: 5,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(mymap2);
        // map end

        $(".loading_map").hide();
        $(".statistik").show();

    },
    error: function(err){
        console.log('err', err)
    }
})
{{-- statistik end --}}

@if (request()->get('provinsi'))
    <script>
        $.ajax({
                url: `{{route('listKota')}}?provinsi={{request()->get('provinsi')}}`,
                type: "GET",
                success: function(data){
                    console.log('data', data.data)
                    let tagHtml = "<option >Pilih kota</option>";

                    let tempData = data.data;
                    tempData.forEach(element => {
                        tagHtml += `<option value="${element.id_kota}" ${element.id_kota === {{(int)request()->get("kota")}} ? 'selected' : '' }>${element.nama}</option>`
                    });

                    $("#kota").html(tagHtml);


                },
                error: function(err){
                    console.log('err', err)
                }
            })
    </script>
@endif

@if (request()->get("kota"))
    <script>
        $.ajax({
                url: `{{route('listKecamatan')}}?kota={{request()->get("kota")}}`,
                type: "GET",
                success: function(data){
                    console.log('data', data.data)
                    let tagHtml = "<option >Pilih kecamatan</option>";

                    let tempData = data.data;
                    tempData.forEach(element => {
                        tagHtml += `<option value="${element.id_kecamatan}" ${ element.id === {{(int)request()->get("kota")}} ? '' : 'selected' }>${element.nama}</option>`
                    });

                    $("#kecamatan").html(tagHtml);


                },
                error: function(err){
                    console.log('err', err)
                }
        })
    </script>
@endif

    <script>
        $("#provinsi").on("change", function(){
            let value = $(this).val();

            $.ajax({
                url: `{{route('listKota')}}?provinsi=${value}`,
                type: "GET",
                success: function(data){
                    console.log('data', data.data)
                    let tagHtml = "<option >Pilih kota</option>";

                    let tempData = data.data;
                    tempData.forEach(element => {
                        tagHtml += `<option value="${element.id_kota}">${element.nama}</option>`
                    });

                    $("#kota").html(tagHtml);


                },
                error: function(err){
                    console.log('err', err)
                }
            })
        })
        $("#kota").on("change", function(){
            let value = $(this).val();

            $.ajax({
                url: `{{route('listKecamatan')}}?kota=${value}`,
                type: "GET",
                success: function(data){
                    console.log('data', data.data)
                    let tagHtml = "<option >Pilih kecamatan</option>";

                    let tempData = data.data;
                    tempData.forEach(element => {
                        tagHtml += `<option value="${element.id_kecamatan}">${element.nama}</option>`
                    });

                    $("#kecamatan").html(tagHtml);


                },
                error: function(err){
                    console.log('err', err)
                }
            })
        })
    </script>
@endpush

{{-- <div class="">
    <div class="card loading_map" aria-hidden="true">
        <div class="card-body">
            <div class="row g-3 mb-3">
              <div class="col-md-4">
                <div class="placeholder bg-secondary text-white d-flex align-items-center justyfy-content-center" style="height:84px">
                  Loading
                </div>
              </div>
              <div class="col-md-4">
                <div class="placeholder bg-secondary text-white d-flex align-items-center justyfy-content-center" style="height:84px">
                  Loading
                </div>
              </div>
              <div class="col-md-4">
                <div class="placeholder bg-secondary text-white d-flex align-items-center justyfy-content-center" style="height:84px">
                  Loading
                </div>
              </div>
            </div>
            <p class="card-text placeholder-glow">
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
                <span class="placeholder col-3"></span>
            </p>
            <div tabindex="-1" class="btn btn-primary placeholder col-6"></div>
        </div>
    </div>
    <div class="row statistik" style="display: none">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                          <div class="">Provinsi</div>
                          <div class="h2 mb-0" id="count_provinsi">0</div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                          <div class="">Kota/Kab</div>
                          <div class="h2 mb-0" id="count_kota">0</div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                          <div class="">Kecamatan</div>
                          <div class="h2 mb-0" id="count_kecamatan">0</div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-tasks-overview"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5 statistik">
    <div class="card">
        <div class="card-header">
            Peta Sebaran Relawan
        </div>
        <div class="card-body">
            <div id="mapid2" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
</div>

@push('addScript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        var mymap2 = L.map('mapid2').setView([-6.2470928, 106.6501857], 11);

        $.ajax({
            url: "{{ route('admin.data.relawan-getStatistik') }}",
            type: "GET",
            success: function(data) {
                let dataSeries = [];
                let dataLabel = [];
                data.relawan.forEach(element => {
                    dataSeries.push(element.total)
                    dataLabel.push(element.rel_kecamatan.nama)
                });

                $("#count_Provinsi").text(data.count['provinsi'])
                $("#count_Kota").text(data.count['kota'])
                $("#count_Kecamatan").text(data.count['kecamatan'])


                // chart
                var options = {
                    series: [{
                        name: 'Jumlah',
                        data: dataSeries
                    }],
                    annotations: {
                        points: [{
                            x: 'Relawan',
                            seriesIndex: 0,
                            label: {
                                borderColor: '#775DD0',
                                offsetY: 0,
                                style: {
                                    color: '#fff',
                                    background: '#775DD0',
                                },
                                text: 'Chart Statistik Relawan Perkecamatan',
                            }
                        }]
                    },
                    chart: {
                        height: 350,
                        type: 'bar',
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 10,
                            columnWidth: '50%',
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2
                    },

                    grid: {
                        row: {
                            colors: ['#fff', '#f2f2f2']
                        }
                    },
                    xaxis: {
                        labels: {
                            rotate: -45
                        },
                        categories: dataLabel,
                        tickPlacement: 'on'
                    },
                    yaxis: {
                        title: {
                            text: 'Statistik Diagram Relawan',
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'light',
                            type: "horizontal",
                            shadeIntensity: 0.25,
                            gradientToColors: undefined,
                            inverseColors: true,
                            opacityFrom: 0.85,
                            opacityTo: 0.85,
                            stops: [50, 0, 100]
                        },
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart-tasks-overview"), options);
                chart.render();
                // chart end

                // map
                data.all_relawan.forEach(element => {
                    marker = new L.marker([element.latitude, element.longitude])
                        .bindPopup(element.nama)
                        .addTo(mymap2);
                });

                let layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 100,
                    zoomSnap: 5,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(mymap2);
                // map end

                $(".loading_map").hide();
                $(".statistik").show();

            },
            error: function(err) {
                console.log('err', err)
            }
        })
    </script>
@endpush --}}