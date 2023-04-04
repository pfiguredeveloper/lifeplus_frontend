<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Cash In-Out Summary</title>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->

<style type="text/css">
    body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
    div .pagenum:before {content: counter(page);}
    @page {margin-top: 5px;margin-right: 15px;margin-bottom: 10px;margin-left: 15px;}
    footer {position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 10px;text-align: center;font-size: 11px;}
    header h4{margin-bottom: 0px;margin-top: 0px;}
    header .header-p{margin-bottom: 0px;margin-top: 0px;font-size: 12px;}
    body {margin-top: 285px;margin-bottom: 10px;}
    header {position: fixed;top: 0px;left: 0px;right: 0px;height: 120px;}
    .fixed-div-header{height: 100px;}
    .table-hd {display:table;width:100%;margin-top: 5px;}
    .tr-hd {display:table-row;}
    .d1-hd {display:table-cell;width:25%;font-size: 12px;padding-top: 10px;}
    .d2-hd {display:table-cell;text-align:center;width:20%;border: 1px solid;color: white;background-color: #3c8dbc;font-weight: bold;padding-bottom: 4px;}
    .d3-hd {display:table-cell;text-align:right;width:25%;font-size: 12px;padding-top: 10px;}
    .d4-hd {display:table-cell;text-align:center;width:90%;border: 1px solid;font-weight: bold;height: 100px;}
    .d5-hd {text-align:center;width:100%;border: 1px solid black;font-weight: bold;color: white;background-color: #3c8dbc;padding-bottom: 4px}
</style>

<body>
    <header>
        <div class="fixed-div-header">
            <h4>
                {{$data['title']}}
            </h4>
            <p class="header-p">{{$data['address1']}}</p>
            <p class="header-p">{{$data['address2']}}</p>
            <p class="header-p">{{$data['address3']}}</p>
            <p class="header-p">{{$data['address4']}}</p>
            <p class="header-p">{{$data['address5']}}</p>
            <hr>
        </div>       
        <div class="d5-hd">Comprehensive Insurance Chart</div>
        <div class="table-hd">
            <div class="tr-hd">
                <div class="d1-hd"></div>
                <div class="d4-hd">
                    <span style="color: violet">Bakrania Mahendrakumar Vrajlal Family</span><br>
                    B-135,Kribhco Twonship, Post-Kribhconagar,Hazira Road,<br>
                    Surat Surat<br>
                    Phone : R 02612803730 Mobile : 947100666
                </div>
                <div class="d3-hd"></div>
            </div>
        </div>
        <div class="table-hd">
            <div class="tr-hd">
                <div class="d1-hd">Print Date : <?php echo date("d/m/Y"); ?></div>
                <div class="d2-hd">Cash In-Out Summary</div>
                <div class="d3-hd">Page No. : <span class="pagenum"></span></div>
            </div>
        </div>
    </header>

    <footer>
        Developed for Dalsaniya Pintu by Pfiger Software Technologies - Web: www.pfiger.com
    </footer>
    
    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
        <thead style="background-color: #d40a55;color: white;font-weight: bold;">
            <tr>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Year</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Yearly Prem.</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Return from LIC</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Actual Balance</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Credited Bonus</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">New Loan</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">Total Loan</td>
            </tr>
        </thead>
        <tbody style="color: #080888;">
            @for($i=1;$i<50;$i++)
            <tr>
                <td style="border-left: none;border-right: none;width:10%;padding-top: 0px;padding-bottom: 0px;">{{1994+$i}}</td>
                <td style="border-left: none;border-right: none;width:15%;padding-top: 0px;padding-bottom: 0px;">3508</td>
                <td style="border-left: none;border-right: none;width:15%;padding-top: 0px;padding-bottom: 0px;">0</td>
                <td style="border-left: none;border-right: none;width:10%;padding-top: 0px;padding-bottom: 0px;">3508</td>
                <td style="border-left: none;border-right: none;width:15%;padding-top: 0px;padding-bottom: 0px;">0</td>
                <td style="border-left: none;border-right: none;width:15%;padding-top: 0px;padding-bottom: 0px;">0</td>
                <td style="border-left: none;border-right: none;width:15%;padding-top: 0px;padding-bottom: 0px;">0</td>
            </tr>
        @endfor
        </tbody>
    </table>
</body>

