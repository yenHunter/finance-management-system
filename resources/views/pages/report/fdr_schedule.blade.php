<p align="center">
    <font face="helvetica" size="12" color="#006400">BANGLADESH KRISHI GOBESHONA ENDOWMENT TRUST (BKGET)</font>
    <br>
    <font face="helvetica" size="10">SCHEDULE OF FDR ({{ $fund_type }})</font>
    <br>
    <font face="helvetica" size="10">
        <b>For the year ended June 30, {{ Date('Y') }}</b>
    </font>
</p>
<table border="1" cellpadding="2" cellspacing="0">
    <tr>
        <th colspan="1" align="center">No.</th>
        <th colspan="4" align="center">Name of Bank</th>
        <th colspan="4" align="center">Branch</th>
        <th colspan="3" align="center">FDR No.</th>
        <th colspan="2" align="center">Opening Date</th>
        <th colspan="2" align="center">Maturity Date</th>
        <th colspan="2" align="center">Duration</th>
        <th colspan="1" align="center">Interest Rate</th>
        <th colspan="2" align="center">Amount in Taka</th>
    </tr>
    @for ($i = 0; $i < count($fdr_schedule); $i++)
        <tr>
            <td colspan="1" align="center">{{ $i + 1 }}</td>
            <td colspan="4">{{ $fdr_schedule[$i]->bank_name }}</td>
            <td colspan="4">{{ $fdr_schedule[$i]->branch_name }}</td>
            <td colspan="3" align="center">{{ $fdr_schedule[$i]->number }}</td>
            <td colspan="2" align="center">{{ date_format(date_create($fdr_schedule[$i]->opening_date), 'd-m-y') }}
            </td>
            <td colspan="2" align="center">{{ date_format(date_create($fdr_schedule[$i]->maturity_date), 'd-m-y') }}
            </td>
            <td colspan="2" align="center">{{ $fdr_schedule[$i]->duration }} months</td>
            <td colspan="1" align="center">{{ $fdr_schedule[$i]->interest_rate }}%</td>
            <td colspan="2" align="center">{{ $fdr_schedule[$i]->amount }}</td>
        </tr>
    @endfor
</table>
