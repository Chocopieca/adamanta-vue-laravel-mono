<div style="margin-bottom: 4px; margin-top: 4px">
    @if(is_null($error))
        <div style="color: green; margin-bottom: 8px; font-weight: 800">{{ __('boxes.transaction_statues.success')}}</div>

        <p>TransactionId: {{$success['TransactionId']}}</p>
        <p>Сумма: {{$success['PaymentAmount'] . ' ' . $success['PaymentCurrency']}}</p>
        <p>Тип карты: {{$success['CardType']}}</p>
        <p>{{$success['CardHolderMessage']}}</p>
    @else
        <div style="color: red; margin-bottom: 8px; font-weight: 800">{{__('boxes.transaction_statues.fail')}}</div>
        @foreach($error as $e)
            <p>{{$e}}</p>
        @endforeach
    @endif
</div>
