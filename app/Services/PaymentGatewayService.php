namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentGatewayService
{
    protected $apiUrl;
    protected $username;
    protected $password;
    protected $orderPrefix;

    public function __construct()
    {
        $this->apiUrl = config('services.payment.api_url');
        $this->username = config('services.payment.username');
        $this->password = config('services.payment.password');
        $this->orderPrefix = config('services.payment.order_prefix');
    }

    public function createPayment($orderId, $amount)
    {
        $response = Http::withBasicAuth($this->username, $this->password)->post($this->apiUrl . '/create-payment', [
            'order_id' => $this->orderPrefix . $orderId,
            'amount' => $amount,
            // other required fields...
        ]);

        return $response->json();
    }
}