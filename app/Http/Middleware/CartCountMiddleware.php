namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class CartCountMiddleware
{
    public function handle($request, Closure $next)
    {
        $cart = session()->get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));
        View::share('cartCount', $cartCount);

        return $next($request);
    }
}