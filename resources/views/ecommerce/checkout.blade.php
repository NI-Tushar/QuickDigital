<form action="{{ url('/checkout') }}" method="POST">
    @csrf
    <input type="hidden" name="order_id" value="12345"> <!-- Replace with dynamic order ID -->
    <input type="number" name="amount" value="100.00" required> <!-- Replace with dynamic amount -->
    <button type="submit">Pay Now</button>
</form>