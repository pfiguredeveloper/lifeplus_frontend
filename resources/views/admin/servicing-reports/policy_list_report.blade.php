<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>New Business Report</title>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->

<style type="text/css">
    body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
    span .pagenum:before {content: counter(page);}
    @page {margin-top: 20px;margin-right: 15px;margin-bottom: 10px;margin-left: 15px;}
    footer {position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 35px;text-align: center;font-size: 11px;}
    header h4{margin-bottom: 0px;margin-top: 0px;}
    header .header-p{margin-bottom: 0px;margin-top: 0px;font-size: 12px;}
    body {margin-top: 195px;margin-bottom: 20px;}
    header {position: fixed;top: 0px;left: 0px;right: 0px;height: 120px;}
    .fixed-div-header{height: 115px;}
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
        <p style="margin-bottom: 0px;margin-top: 0px;text-align: center;"><b>New Business Report ( Name Wise )</b></p>
        <p style="margin-bottom: 0px;margin-top: 0px;text-align: center;"><b>From : 01/04/2020 To 31/03/2021</b></p>
        <span>
            <div class="pagenum-container">
                <span style="font-size: 12px;">Print Date : <?php echo date("d/m/Y"); ?></span>
                <span style="font-size: 12px;float:right;margin-top: 6px;">Page No. : <span class="pagenum"></span></span>
            </div>
        </span>
    </header>

    <footer>
        <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;margin-bottom: 5px;border: 1px solid black;">
            <thead>
                <tr style="border-bottom: none;padding-top: 0px;padding-bottom: 0px;border: 1px solid black">
                    <th style="border-bottom: none;width:22%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Tot.S.A. : 300000</th>
                    <th style="border-bottom: none;width:22%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem. : 19019</th>
                    <th style="border-bottom: none;width:22%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.YLY Prm. : 19019</th>
                    <th style="border-bottom: none;width:34%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;"></th>
                </tr>
            </thead>
        </table>
        Developed for Dalsaniya Pintu by Pfiger Software Technologies - Web: www.pfiger.com
    </footer>

    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
        <thead>
            <tr style="border-bottom: none;padding-top: 0px;padding-bottom: 0px;">
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;"></td>
                <td style="width:11%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Name - 1</td>
                <td style="width:11%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Birth Dt.</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Policy No</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Sum Assured</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Plan-Term</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Mode</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Premium</td>
                <td style="width:8%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">FUP</td>
                <td style="width:9%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">AG ID</td>
            </tr>
            <tr style="border-top: none;padding-top: 0px;padding-bottom: 0px;">
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-top: none;">Sr.</td>
                <td style="width:11%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Address</td>
                <td style="width:11%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;"></td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;"></td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;"></td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Risk Date</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Mat. Date</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Agency</td>
                <td style="width:8%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Branch</td>
                <td style="width:9%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-top: none;"></td>
            </tr>
        </thead>
        <tbody style="border-left: none;border-right: none;border-bottom: none;">
            @for($i=1;$i<22;$i++)
            <tr style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">
                <td style="border-left: none;border-right: none;border-bottom: none;width:5%;padding-top: 0px;padding-bottom: 0px;">{{$i}}</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:11%;padding-top: 0px;padding-bottom: 0px;">aa</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:11%;padding-top: 0px;padding-bottom: 0px;">//</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:12%;padding-top: 0px;padding-bottom: 0px;">88</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:15%;padding-top: 0px;padding-bottom: 0px;">100000</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:12%;padding-top: 0px;padding-bottom: 0px;">933/13/10</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:10%;padding-top: 0px;padding-bottom: 0px;">H</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:10%;padding-top: 0px;padding-bottom: 0px;">5300.00</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:8%;padding-top: 0px;padding-bottom: 0px;">01/2021</td>
                <td style="border-left: none;border-right: none;border-bottom: none;width:9%;padding-top: 0px;padding-bottom: 0px;">a</td>
            </tr>
            <tr style="border-left: none;border-right: none;border-top: none;padding-top: 0px;padding-bottom: 0px;">
                <td style="border-left: none;border-right: none;border-top: none;width:5%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:11%;padding-top: 0px;padding-bottom: 0px;">a</td>
                <td style="border-left: none;border-right: none;border-top: none;width:11%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:12%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:15%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:12%;padding-top: 0px;padding-bottom: 0px;">26/07/2020</td>
                <td style="border-left: none;border-right: none;border-top: none;width:10%;padding-top: 0px;padding-bottom: 0px;">26/07/2020</td>
                <td style="border-left: none;border-right: none;border-top: none;width:10%;padding-top: 0px;padding-bottom: 0px;">abc</td>
                <td style="border-left: none;border-right: none;border-top: none;width:8%;padding-top: 0px;padding-bottom: 0px;">12</td>
                <td style="border-left: none;border-right: none;border-top: none;width:9%;padding-top: 0px;padding-bottom: 0px;"></td>
            </tr>
        @endfor
        </tbody>
    </table>
</body>

