<p align="center">
    <font face="helvetica" size="12" color="#006400">BANGLADESH KRISHI GOBESHONA ENDOWMENT TRUST (BKGET)</font>
    <br>
    <font face="helvetica" size="10">Statment of Receipts and Payments</font>
    <br>
    <font face="helvetica" size="10">
        <b>For the year ended June 30, {{ Date('Y') }}</b>
    </font>
</p>
<table border="1" cellpadding="2" cellspacing="0">
    <tr>
        <th colspan="12" rowspan="2">PARTICULARS</th>
        <th colspan="6" align="center">AMOUNT (IN TAKA)</th>
    </tr>
    <tr>
        <th colspan="3" align="center">{{ Date('Y') - 1 . '-' . Date('y') }}</th>
        <th colspan="3" align="center">{{ Date('Y') - 2 . '-' . (Date('y') - 1) }}</th>
    </tr>
    <tr>
        <td colspan="18">Incomes</td>
    </tr>
    @forelse ($income_details as $item)
        <tr>
            <td colspan="12">{{ $item->income_head }}</td>
            <td colspan="3">{{ $item->current_total_amount }}</td>
            <td colspan="3">{{ $item->previous_total_amount }}</td>
        </tr>
    @empty
        <td colspan="18" align="center">No data found</td>
    @endforelse
</table>
