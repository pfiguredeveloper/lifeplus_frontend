<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Maturity Report</title>

<style type="text/css">
    body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
    span .pagenum:before {content: counter(page);}
    @page {margin-top: 20px;margin-right: 15px;margin-bottom: 10px;margin-left: 15px;}
    footer {position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 40px;text-align: center;font-size: 11px;}
    header h4{margin-bottom: 0px;margin-top: 0px;}
    header .header-p{margin-bottom: 0px;margin-top: 0px;font-size: 12px;}
    body {margin-top: 195px;margin-bottom: 55px;}
    header {position: fixed;top: 0px;left: 0px;right: 0px;height: 120px;}
    .fixed-div-header{height: 110px;}
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
        <p style="margin-bottom: 0px;margin-top: 0px;text-align: center;"><b>Maturity Report ( Name Wise )</b></p>
        <p style="margin-bottom: 0px;margin-top: 0px;text-align: center;"><b>From : {{$from_date}} To {{$to_date}}</b></p>
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
                    <th style="border-bottom: none;width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total Sum Assured:</th>
                    <th style="border-bottom: none;width:20%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">350000</th>
                    <th style="border-bottom: none;width:25%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem.:</th>
                    <th style="border-bottom: none;width:25%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;">76508</th>
                </tr>
            </thead>
        </table>
        Developed for Dalsaniya Pintu by Pfiger Software Technologies - Web: www.pfiger.com
    </footer>

    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 12px;color: black;">
        <thead>
            <tr>
                <th style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</th>
                <th style="width:45%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Name - 1</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Policy No.</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-bottom: none;text-align: right;">Basic SA</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-bottom: none;">Birth Date</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-bottom: none;">Mode</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">Agency</th>
            </tr>
            <tr>
                <th style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-top: none;"></th>
                <th style="width:45%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Contact Nos.</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Risk Date</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-top: none;text-align: right;">Mat.Date</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-top: none;">Plan-PT-MT</th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;border-top: none;"></th>
                <th style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-top: none;">Branch</th>
            </tr>
        </thead>
        <tbody style="border-left: none;border-right: none;border-bottom: none;">
            <?php $i = 1; ?>
            @foreach($dData as $key => $newArr)
                <tr>
                    <td colspan="7" style="border: none;width:5%;padding-top: 0px;padding-bottom: 0px;"><b>Group By:==> Agent : {{ !empty($newArr[0]['Agency']) ? $newArr[0]['Agency'] : '' }}</b></td>
                </tr>
                @foreach($newArr as $value)
                    <?php 
                        $PLAN  = !empty($value['PLAN']) ? $value['PLAN'] : 0;
                        $TERM  = !empty($value['TERM']) ? $value['TERM'] : 0;
                        $MTERM = !empty($value['MTERM']) ? $value['MTERM'] : 0;
                        $MODE  = !empty($value['MODE']) ? $value['MODE'] : '';
                        $planPTMT = $PLAN.'/'.$TERM.'/'.$MTERM;
                        $mode     = '';
                        if($MODE == 'Yearly') {
                            $mode  = 'Y';
                        } else if($MODE == 'Half Yearly') {
                            $mode  = 'H';
                        } else if($MODE == 'Quarterly') {
                            $mode  = 'Q';
                        } else if($MODE == 'Monthly') {
                            $mode  = 'M';
                        } else if($MODE == 'SSS') {
                            $mode  = 'S';
                        } else if($MODE == 'Single') {
                            $mode  = 'G';
                        }
                    ?>
                    <tr>
                        <td style="border:none;width:5%;padding-top: 0px;padding-bottom: 0px;"><?php echo $i; ?></td>
                        <td style="border:none;width:55%;padding-top: 0px;padding-bottom: 0px;">{{ (!empty($value['Party']) && !empty($value['Party']->NAME)) ? $value['Party']->NAME : '' }}</td>
                        <td style="border:none;width:15%;padding-top: 0px;padding-bottom: 0px;">{{ !empty($value['PONO']) ? $value['PONO'] : 0 }}</td>
                        <td style="border:none;width:15%;padding-top: 0px;padding-bottom: 0px;text-align: right;">{{ !empty($value['SA']) ? $value['SA']+0 : 0 }}</td>
                        <td style="border:none;width:16%;padding-top: 0px;padding-bottom: 0px;">{{ (!empty($value['Party']) && !empty($value['Party']->ABD)) ? \Carbon\Carbon::createFromFormat('Y-m-d', $value['Party']->ABD)->format('d/m/Y') : '' }}</td>
                        <td style="border:none;width:2%;padding-top: 0px;padding-bottom: 0px;">{{ $mode }}</td>
                        <td style="border:none;width:15%;padding-top: 0px;padding-bottom: 0px;">{{ !empty($value['AGCODE']) ? $value['AGCODE'] : 0 }}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none;border-right: none;border-top: none;width:5%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;"></td>
                        <td style="border-left: none;border-right: none;border-top: none;width:55%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;">
                            {{(!empty($value['Party']) && !empty($value['Party']->PHONE_O)) ? "(0) ".$value['Party']->PHONE_O : ''}} 
                            {{(!empty($value['Party']) && !empty($value['Party']->PHONE_R)) ? "(R) ".$value['Party']->PHONE_R : ''}}
                            {{(!empty($value['Party']) && !empty($value['Party']->MOBILE)) ? "(M) ".$value['Party']->MOBILE : ''}}
                        </td>
                        <td style="border-left: none;border-right: none;border-top: none;width:15%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;">{{ !empty($value['RDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $value['RDT'])->format('d/m/Y') : '' }}</td>
                        <td style="border-left: none;border-right: none;border-top: none;width:15%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;text-align: right;">{{ !empty($value['MATDATE']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $value['MATDATE'])->format('d/m/Y') : '' }}</td>
                        <td style="border-left: none;border-right: none;border-top: none;width:16%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;">{{ $planPTMT }}</td>
                        <td style="border-left: none;border-right: none;border-top: none;width:2%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;"></td>
                        <td style="border-left: none;border-right: none;border-top: none;width:15%;padding-top: 0px;padding-bottom: 0px;border-bottom: 1px solid black;">{{ !empty($value['Branch']) ? $value['Branch'] : '' }}</td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

