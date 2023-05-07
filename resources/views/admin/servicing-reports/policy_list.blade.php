<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Policy List</title>
<style type="text/css">
    body {
        margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size: 1rem;font-weight: 400;line-height: 1.5;text-align: left;}table {border-collapse: collapse }th {text-align: inherit;text-align: -webkit-match-parent }.table {width: 100%;margin-bottom: 1rem;color: #212529 }.table td, .table th {padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6 }.table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6 }.table tbody+tbody {border-top: 2px solid #dee2e6 }@media print {thead {display: table-header-group }tr {page-break-inside: avoid }@page {size: a3 }body {min-width: 992px!important }.table {border-collapse: collapse!important }}
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
        @foreach($dData as  $policy1)
            @php($SA=0)
            @php($PREM=0)
            @php($temp_party = [])
            @php($temp_policy = [])
            <div class="@if(!$loop->first) page-break @endif"></div>
                <div class="d5-hd ">Policy List</div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d4-hd">
                            @php($first_arr = array_slice($policy1, 0, 1))
                            <span style="color: violet">{{@$first_arr[0]["NAME"]}}</span>
                        </div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div class="table-hd" style="margin-bottom:1px;">
                    <div class="tr-hd">
                        <div class="d1-hd">Print Date : <?php echo date("d/m/Y"); ?></div>
                        <div class="d2-hd">Policy List</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Policy No.</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Risk Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">S.A.</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Plan-Term</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Mode</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">FUP</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy1 as  $policy)
                            @if(!in_array($policy["PONO"],$temp_policy))
                                @php($SA+=$policy["SA"])
                                @php($PREM+=$policy["PREM"])
                                @php($temp_policy[]=$policy["PONO"])
                                @php($temp_party[$policy["NAME1"]]["ABD"] = $policy["ABD"]);
                                @php($temp_party[$policy["NAME1"]]["PARTY_NAME"] = $policy["NAME"]);
                                @php($temp_party[$policy["NAME1"]]["SA"] = ($policy["SA"] + ($temp_party[$policy["NAME1"]]["SA"] ?? 0)))
                                <tr>
                                    <td style="width:5%;padding-top:0px;padding-bottom:0px;border: 1px solid black;border-right: none;border-bottom: none;">{{$loop->index+1}}</td>
                                    <td style="width:10%;padding-top:0px;padding-bottom:0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{@$policy["PONO"]}}
                                    </td>
                                    <td style="width:10%;padding-top:0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['RDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['RDT'])->format('d/m/Y') : '' }}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{@$policy["SA"]}}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{(($value['PLAN'] ?? 0).'/'.($value['TERM'] ?? 0).'/'.($value['MTERM'] ?? 0))}}
                                    </td>
                                    <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{@$mode_list[$policy["MODE"]]}}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['FUPDATE']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['FUPDATE'])->format('d/m/Y') : '' }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td style="width:5%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;"><b>Total</b></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"><b>{{$SA}}</b></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:6%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-left: none;"></td>
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
                <div style="text-align: center;font-size: 14px;font-weight: bold;">
                    Policy Summary From : {{@$from_date}} To : {{@$to_date}}
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Birth Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total Sum Assured</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total DAB</td>
                        </tr>
                    </thead>
                    <tbody style="color: #080888;">
                        @php($totalSA = 0)
                        @foreach($temp_party as $value1)
                            @php($totalSA += $value1["SA"])
                            <tr>
                                <td style="color:black;border-left:none;border-right:none;border-bottom:none;padding-top:0px;padding-bottom:0px;">
                                    {{@$value1["PARTY_NAME"]}}
                                </td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">
                                    {{ !empty($policy['ABD']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['ABD'])->format('d/m/Y') : '' }}
                                </td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["SA"]}}</td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["SA"]}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th style="padding:0.25rem;color:black;" colspan="2">Total</th>
                            <th style="padding:0.25rem;color:black;">{{$totalSA}}</th>
                            <th style="padding:0.25rem;color:black;"></th>
                        </tr>
                     </tbody>
                </table>
        @endforeach
    @else 
       @foreach($dData as  $policy1)
            @php($SA=0)
            @php($PREM=0)
            @php($temp_policy = [])
            @php($temp_party = [])
            <div class="@if(!$loop->first) page-break @endif"></div>
                <div class="d5-hd ">Policy List</div>
                <div class="table-hd">
                    <div class="tr-hd">
                        <div class="d1-hd"></div>
                        <div class="d4-hd">
                            @php($first_arr = array_slice($policy1, 0, 1))
                            <span style="color: violet">{{@$first_arr[0]["family_name"]}}</span>
                        </div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <div class="table-hd" style="margin-bottom:1px;">
                    <div class="tr-hd">
                        <div class="d1-hd">Print Date : <?php echo date("d/m/Y"); ?></div>
                        <div class="d2-hd">Policy List</div>
                        <div class="d3-hd"></div>
                    </div>
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:5%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-bottom: none;">Sr.</td>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Policy No.</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Risk Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">S.A.</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Plan-Term</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">Mode</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">FUP</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy1 as  $policy)
                            @if(!in_array($policy["PONO"],$temp_policy))
                                @php($SA+=$policy["SA"])
                                @php($PREM+=$policy["PREM"])
                                @php($temp_policy[]=$policy["PONO"])
                                @php($temp_party[$policy["NAME1"]]["ABD"] = $policy["ABD"]);
                                @php($temp_party[$policy["NAME1"]]["PARTY_NAME"] = $policy["NAME"]);
                                @php($temp_party[$policy["NAME1"]]["SA"] = ($policy["SA"] + ($temp_party[$policy["NAME1"]]["SA"] ?? 0)))
                                <tr>
                                    <td style="width:5%;padding-top:0px;padding-bottom:0px;border: 1px solid black;border-right: none;border-bottom: none;">{{$loop->index+1}}</td>
                                    <td style="width:30%;padding-top:0px;padding-bottom:0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{@$policy["NAME"]}}
                                    </td>
                                    <td style="width:10%;padding-top:0px;padding-bottom:0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{@$policy["PONO"]}}
                                    </td>
                                    <td style="width:10%;padding-top:0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['RDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['RDT'])->format('d/m/Y') : '' }}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;border-left: none;border-bottom: none;">
                                        {{@$policy["SA"]}}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{(($value['PLAN'] ?? 0).'/'.($value['TERM'] ?? 0).'/'.($value['MTERM'] ?? 0))}}
                                    </td>
                                    <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{@$mode_list[$policy["MODE"]]}}
                                    </td>
                                    <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-left: none;border-bottom: none;">
                                        {{ !empty($policy['FUPDATE']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['FUPDATE'])->format('d/m/Y') : '' }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td style="width:5%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;"><b>Total</b></td>
                            <td style="width:30%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"><b>{{$SA}}</b></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:6%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-right: none;border-left: none;"></td>
                            <td style="width:10%;padding-top:0px;padding-bottom:0px;border:1px solid black;border-left: none;"></td>
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
                <div style="text-align: center;font-size: 14px;font-weight: bold;">
                    Policy Summary From : {{@$from_date}} To : {{@$to_date}}
                </div>
                <table class="table table-bordered" style="border-left: none;border-right: none;table-layout:fixed;font-size: 13px;">
                    <thead style="background-color: #d40a55;color: white;font-weight: bold;">
                        <tr>
                            <td style="width:30%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Party Name</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Birth Date</td>
                            <td style="width:10%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total Sum Assured</td>
                            <td style="width:6%;padding-top: 0px;padding-bottom: 0px;border: 1px solid black;border-right: none;">Total DAB</td>
                        </tr>
                    </thead>
                    <tbody style="color: #080888;">
                        @php($totalSA = 0)
                        @foreach($temp_party as $value1)
                            @php($totalSA += $value1["SA"])
                            <tr>
                                <td style="color:black;border-left:none;border-right:none;border-bottom:none;padding-top:0px;padding-bottom:0px;">
                                    {{@$value1["PARTY_NAME"]}}
                                </td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">
                                    {{ !empty($policy['ABD']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$policy['ABD'])->format('d/m/Y') : '' }}
                                </td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["SA"]}}</td>
                                <td style="color:black;border-left:none;border-right: none;border-bottom: none;padding-top: 0px;padding-bottom: 0px;">{{$value1["SA"]}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th style="padding:0.25rem;color:black;" colspan="2">Total</th>
                            <th style="padding:0.25rem;color:black;">{{$totalSA}}</th>
                            <th style="padding:0.25rem;color:black;"></th>
                        </tr>
                     </tbody>
                </table>
        @endforeach
    @endif 
    </body>
