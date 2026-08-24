@component('mail::message')
# Order confirmed

Your order **#{{ $order->id }}** from {{ $order->restaurant->name }} has been confirmed.

**Delivery address:** {{ $order->delivery_address }}

**Total:** ${{ number_format((float) $order->total_amount, 2) }}

Thanks for ordering.
@endcomponent
