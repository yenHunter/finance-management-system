<p align="center">
    <font face="helvetica" size="12" color="#006400"><b>BANGLADESH KRISHI GOBESHONA ENDOWMENT TRUST (BKGET)</b></font>
    <br>
    <font face="helvetica" size="10">Statment of Receipts and Payments</font>
    <br>
    <font face="helvetica" size="10">
        <b>For the year ended June 30, {{ Date('Y') }}</b>
    </font>
</p>
<table border="0.3" cellpadding="2" cellspacing="0">
    <tr>
        <th colspan="12" rowspan="2" align="center"><b>PARTICULARS</b></th>
        <th colspan="6" align="center"><b>AMOUNT (IN TAKA)</b></th>
    </tr>
    <tr>
        <th colspan="3" align="center"><b>{{ Date('Y') - 1 . '-' . Date('y') }}</b></th>
        <th colspan="3" align="center"><b>{{ Date('Y') - 2 . '-' . (Date('y') - 1) }}</b></th>
    </tr>
    <tr>
        <td colspan="18"><b>Receipts</b></td>
    </tr>
    <?php $current_grand_total_amount = 0;
    $previous_grand_total_amount = 0; ?>
    @forelse ($income_details as $item)
        <tr>
            <td colspan="12">{{ $item->income_head }}</td>
            <td colspan="3">{{ $item->current_total_amount }}</td>
            <td colspan="3">{{ $item->previous_total_amount }}</td>
        </tr>
        <?php $current_grand_total_amount += $item->current_total_amount;
        $previous_grand_total_amount += $item->previous_total_amount; ?>
    @empty
        <td colspan="18" align="center">No data found</td>
    @endforelse
    <tr>
        <td colspan="12"><b>Grand Total</b></td>
        <td colspan="3">{{ $current_grand_total_amount }}</td>
        <td colspan="3">{{ $previous_grand_total_amount }}</td>
    </tr>
    <tr>
        <td colspan="18">Payments</td>
    </tr>
    <?php $current_grand_total_amount = 0;
    $previous_grand_total_amount = 0; ?>
    @forelse ($expense_details as $item)
        <tr>
            <td colspan="12">{{ $item->expense_head }}</td>
            <td colspan="3">{{ $item->current_total_amount }}</td>
            <td colspan="3">{{ $item->previous_total_amount }}</td>
        </tr>
        <?php $current_grand_total_amount += $item->current_total_amount;
        $previous_grand_total_amount += $item->previous_total_amount; ?>
    @empty
        <td colspan="18" align="center">No data found</td>
    @endforelse
    <tr>
        <td colspan="12"><b>Grand Total</b></td>
        <td colspan="3">{{ $current_grand_total_amount }}</td>
        <td colspan="3">{{ $previous_grand_total_amount }}</td>
    </tr>
</table>
