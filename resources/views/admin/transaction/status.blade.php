<div style="margin-bottom: 4px; margin-top: 4px">
    @php
        $colors = ['pending' => 'orange', 'fail' => 'red', 'success' => 'green']
    @endphp

    <div style="color: {{isset($colors[$status]) ? $colors[$status] : '000'}}; font-weight: 800">{{__('boxes.transaction_statues.' . $status)}}</div>
</div>
