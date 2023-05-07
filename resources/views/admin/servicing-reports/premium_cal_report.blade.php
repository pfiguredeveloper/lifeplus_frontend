{{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Premium Calendar</title>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->

<style type="text/css">
    body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
    div .pagenum:before {content: counter(page);}
    @page {margin-top: 20px;margin-right: 15px;margin-bottom: 10px;margin-left: 15px;}
    footer {position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 10px;text-align: center;font-size: 11px;}
    header h4{margin-bottom: 0px;margin-top: 0px;}
    header .header-p{margin-bottom: 0px;margin-top: 0px;font-size: 12px;}
    body {margin-top: 300px;margin-bottom: 20px;}
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
        <div class="d5-hd">Premium Calendar</div>
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
                <div class="d2-hd">Policy Details</div>
                <div class="d3-hd">Page No. : <span class="pagenum"></span></div>
            </div>
        </div>
        <div style="text-align: center;font-size: 14px;font-weight: bold;">Policy Details Premium Calendar From : {{@$from_date}} To : {{@$to_date}}</div>
    </header>

    <footer>
        Developed for Dalsaniya Pintu by Pfiger Software Technologies - Web: www.pfiger.com
    </footer>
    
    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
        <thead style="background-color: #d40a55;color: white;font-weight: bold;">
            <tr>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Policy No</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Plan-Term</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Basic SA</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Premium</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Nominee</td>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">AG</td>
            </tr>
            <tr>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-top: none;border-bottom: none;"></td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;border-bottom: none;">Risk Date</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;border-bottom: none;">Mode</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;border-bottom: none;">DAB SA</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;border-bottom: none;">Premium(GST)</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;border-bottom: none;">PaidBy</td>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-top: none;border-bottom: none;"></td>
            </tr>
            <tr>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-top: none;"></td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Mat. Date</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">Branch</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">CIR SA/ TR SA</td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;"></td>
                <td style="width:18%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-top: none;">FUP</td>
                <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-top: none;"></td>
            </tr>
        </thead>
        <tbody style="color: #080888;">
            @for($i=1;$i<4;$i++)
            <tr>
                <td colspan="3" style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">Bakrania Mahendrakumar Vrajlal Family</td>
                <td colspan="2" style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">Mobile : 9725037745</td>
                <td colspan="2" style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">Birthday : 10/03/1995</td>
            </tr>
            <tr>
                <td style="border: none;width:5%;padding-top: 0px;padding-bottom: 0px;">{{$i}}</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">864585695</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">1</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">150000</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">24847.00</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">ABC</td>
                <td style="border: none;width:5%;padding-top: 0px;padding-bottom: 0px;">AG</td>
            </tr>
            <tr>
                <td style="border: none;width:5%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">10/12/2008</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">Single</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">150000</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">24847.00</td>
                <td style="border: none;width:18%;padding-top: 0px;padding-bottom: 0px;">XYZ</td>
                <td style="border: none;width:5%;padding-top: 0px;padding-bottom: 0px;"></td>
            </tr>
            <tr>
                <td style="border-left: none;border-right: none;border-top: none;width:5%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:18%;padding-top: 0px;padding-bottom: 0px;">08/01/2009</td>
                <td style="border-left: none;border-right: none;border-top: none;width:18%;padding-top: 0px;padding-bottom: 0px;">05/86A</td>
                <td style="border-left: none;border-right: none;border-top: none;width:18%;padding-top: 0px;padding-bottom: 0px;">00 / 00</td>
                <td style="border-left: none;border-right: none;border-top: none;width:18%;padding-top: 0px;padding-bottom: 0px;"></td>
                <td style="border-left: none;border-right: none;border-top: none;width:18%;padding-top: 0px;padding-bottom: 0px;">26/07/2020</td>
                <td style="border-left: none;border-right: none;border-top: none;width:5%;padding-top: 0px;padding-bottom: 0px;"></td>
            </tr>
        @endfor
        </tbody>
    </table>
    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;margin-bottom: 5px;border: 1px solid black;">
        <thead>
            <tr>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Basic SA : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.DAB SA : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.CIR SA : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.TR SA : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem. : 19019</th>
                <th style="width:20%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem.(GST) : 19019</th>
            </tr>
        </thead>
    </table>
    <div class="table-hd">
        <div class="tr-hd">
            <div class="d1-hd"></div>
            <div class="d2-hd">Policy Summary</div>
            <div class="d3-hd"></div>
        </div>
    </div>
    <div style="text-align: center;font-size: 14px;font-weight: bold;">Policy Summary Premium Calendar From : 01/02/2021 To : 31/01/2022</div>
    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
        <thead style="background-color: #d40a55;color: white;font-weight: bold;">
            <tr>
                <td style="width:35%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Party Name</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">Birth Date</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">Tot SA</td>
                <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">Tot DAB</td>
                <td style="width:12%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">Tot Prem.</td>
                <td style="width:15%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;">Tot Prem.(GST)</td>
            </tr>
        </thead>
        <tbody style="color: #080888;">
            @for($i=1;$i<4;$i++)
            <tr>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">Bakrania Mahendrakumar Vrajlal Family</td>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">10/03/1995</td>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">500000</td>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">500000</td>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">500000</td>
                <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">500000</td>
            </tr>
        @endfor
        </tbody>
    </table>
    <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;margin-bottom: 5px;border: 1px solid black;">
        <thead>
            <tr>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.SA : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.DAB : 300000</th>
                <th style="width:16%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem. : 19019</th>
                <th style="width:20%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-right: none;">Tot.Prem.(GST) : 19019</th>
            </tr>
        </thead>
    </table>
</body>
 --}}


 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Premium Calendar</title>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->

<style type="text/css">
    body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
    div .pagenum:before {content: counter(page);}
    @page {margin-top: 20px;margin-right: 15px;margin-bottom: 10px;margin-left: 15px;}
    footer {position: fixed;bottom: 0cm;left: 0cm;right: 0cm;height: 10px;text-align: center;font-size: 11px;}
    header h4{margin-bottom: 0px;margin-top: 0px;}
    header .header-p{margin-bottom: 0px;margin-top: 0px;font-size: 12px;}
    body {margin-top: 101px;margin-bottom: 20px;}
    header {position: fixed;top: 0px;left: 0px;right: 0px;height: 120px;}
    .fixed-div-header{height: 100px;}
    .table-hd {display:table;width:100%;margin-top: 5px;}
    .tr-hd {display:table-row;}
    .d1-hd {display:table-cell;width:25%;font-size: 12px;padding-top: 10px;}
    .d2-hd {display:table-cell;text-align:center;width:20%;border: 1px solid;color: white;background-color: #3c8dbc;font-weight: bold;padding-bottom: 4px;}
    .d3-hd {display:table-cell;text-align:right;width:25%;font-size: 12px;padding-top: 10px;}
    .d4-hd {display:table-cell;text-align:center;width:90%;border: 1px solid;font-weight: bold;height: 100px;}
    .d5-hd {text-align:center;width:100%;border: 1px solid black;font-weight: bold;color: white;background-color: #3c8dbc;padding-bottom: 4px}
    .page-break{
        page-break-after:always;
    }
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
    </header>
    <footer>Developed for Dalsaniya Pintu by Pfiger Software Technologies - Web: www.pfiger.com</footer>
    @if($rData["optionsRadios"]=="Party")
        @foreach($temp_policy_list as  $policy1)
            @php($SA=0)
            @php($PREM=0)
            @php($temp_policy = [])
            <div class="@if(!$loop->first) page-break @endif"></div>
                <div class="d5-hd ">Premium Calendar</div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d4-hd">
                            <span style="color: violet">{{@$policy1[0]["NAME"]}}</span><br>
                            {{@$policy1[0]["AD"]}},{{@$policy1[0]["AD2"]}},<br>
                            {{@$policy1[0]["AD3"]}}<br>
                            Phone : R {{@$policy1[0]["PHONE_R"]}} Mobile :  {{@$policy1[0]["MOBILE"]}}
                        </div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd">Print Date : {{date("d/m/Y")}}</div>
                        <div class="d2-hd">Policy Details</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div style="text-align: center;font-size: 14px;font-weight: bold;">
                    Policy Details Premium Calendar From : {{@$from_date}} To : {{@$to_date}}
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</td>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Birth Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Paid By</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Total Sum Assured</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Total DAB SA</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">Total Prem</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy1 as  $policy)
                            @if(!in_array($policy["PONO"],$temp_policy))
                                @php($temp_policy[] = $policy["PONO"])                        
                                @php($SA+=$policy["SA"])
                                @php($PREM+=$policy["PREM"])
                                <tr>
                                    <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">{{$loop->index+1}}</td>
                                    <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["NAME"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['ABD']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['ABD'])->format('d/m/Y') : '' }}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;"></td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["SA"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["SA"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">{{@$policy["PREM"]}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total</td>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">{{$SA}}</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">{{$SA}}</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;">{{$PREM}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d2-hd">Policy Summary</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div style="text-align: center;font-size: 14px;font-weight: bold;">Policy Summary Premium Calendar From : {{@$from_date}} To : {{@$to_date}}</div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Policy No</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Risk Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Plan Term</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Mode</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Premium</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Last Prem.</td>
                        </tr>
                    </thead>
                    <tbody style="color: #080888;">
                        @for($i=0;$i<=$total_month;$i++)
                            @php($prem = 0)
                            @php($date = date("Y-m",strtotime("+".$i." month",strtotime($from_date1))))
                            @if(in_array($date,$all_date))
                                <tr>
                                    <th style="padding:0.25rem" colspan="7">{{date("M-Y",strtotime($date))}}</th>
                                </tr>
                                @foreach($policy1 as $value1)
                                    @if(in_array($date,$value1["temp_date"]))
                                        @php($prem += $value1["PREM"])
                                        <tr>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{@$value1["NAME"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PONO"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{date("d/m/Y",strtotime($value1["RDT"]))}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PLAN_TERM"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["MODE"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PREM"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{date("d/m/Y",strtotime($value1["LASTPREM"]))}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th style="padding:0.25rem" colspan="5">Total</th>
                                    <th style="padding:0.25rem">{{$prem}}</th>
                                    <th style="padding:0.25rem"></th>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
        @endforeach
    @else 
       @foreach($temp_policy_list as  $policy1)
            @php($SA=0)
            @php($PREM=0)
            @php($temp_policy = [])
            <div class="@if(!$loop->first) page-break @endif"></div>
                <div class="d5-hd ">Premium Calendar</div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d4-hd">
                            <span style="color: violet">{{@$policy1[0]["family_name"]}}</span>
                        </div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd">Print Date : <?php echo date("d/m/Y"); ?></div>
                        <div class="d2-hd">Policy Details</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div style="text-align: center;font-size: 14px;font-weight: bold;">
                    Policy Details Premium Calendar From : {{@$from_date}} To : {{@$to_date}}
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</td>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Birth Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Paid By</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Total Sum Assured</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Total DAB SA</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">Total Prem</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy1 as  $policy)
                            @if(!in_array($policy["PONO"],$temp_policy))
                                @php($temp_policy[] = $policy["PONO"])                        
                                @php($SA+=$policy["SA"])
                                @php($PREM+=$policy["PREM"])
                                <tr>
                                    <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">1</td>
                                    <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["NAME"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['ABD']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['ABD'])->format('d/m/Y') : '' }}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;"></td>
                                --    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["SA"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">{{@$policy["SA"]}}</td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">{{@$policy["PREM"]}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total</td>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">{{$SA}}</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;">{{$SA}}</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;">{{$PREM}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d2-hd">Policy Summary</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div style="text-align: center;font-size: 14px;font-weight: bold;">Policy Summary Premium Calendar From : {{@$from_date}} To : {{@$to_date}}</div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Policy No</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Risk Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Plan Term</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Mode</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Premium</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Last Prem.</td>
                        </tr>
                    </thead>
                    <tbody style="color: #080888;">
                        @for($i=0;$i<=$total_month;$i++)
                            @php($prem = 0)
                            @php($date = date("Y-m",strtotime("+".$i." month",strtotime($from_date1))))
                            @if(in_array($date,$all_date))
                                <tr>
                                    <th style="padding:0.25rem" colspan="7">{{date("M-Y",strtotime($date))}}</th>
                                </tr>
                                @foreach($policy1 as $value1)
                                    @if(in_array($date,$value1["temp_date"]))
                                        @php($prem += $value1["PREM"])
                                        <tr>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{@$value1["NAME"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PONO"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{date("d/m/Y",strtotime($value1["RDT"]))}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PLAN_TERM"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["MODE"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["PREM"]}}</td>
                                            <td style="border-left: none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{date("d/m/Y",strtotime($value1["LASTPREM"]))}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <th style="padding:0.25rem" colspan="5">Total</th>
                                    <th style="padding:0.25rem">{{$prem}}</th>
                                    <th style="padding:0.25rem"></th>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
        @endforeach
    @endif 
</body>

