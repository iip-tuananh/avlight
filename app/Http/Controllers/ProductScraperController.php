<?php

namespace App\Http\Controllers;

use App\models\product\Product;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\File;

class ProductScraperController extends Controller
{
    public function scrape()
    {
        $jar = new CookieJar();
        $httpClient = HttpClient::create([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122 Safari/537.36',
            ],
        ]);

        $client = new Client($httpClient);
        $domain = 'https://acsaudio.vn/';

        // $page = 1;
        // do {
            // B1: Truy cập trang danh mục
            $crawler = $client->request('GET', $domain . '/thiet-bi-xu-ly');
            // dd($crawler->filter('main .category-page-row .products .product')->html());
            // dd($crawler->html());

            // B2: Lấy tất cả link chi tiết sản phẩm
            $crawler->filter('main .category-page-row .products .product')->each(function ($node) use ($client, $domain) {
                $relativeUrl = $node->filter('.product-small .box-image .image-fade_in_back a')->attr('href');
                $productUrl = str_starts_with($relativeUrl, 'http') ? $relativeUrl : $domain . '/' . $relativeUrl;
                $images = [];

                $name = $node->filter('.box-text-products .title-wrapper .woocommerce-loop-product__title .woocommerce-loop-product__link')->text();

                $price = $node->filter('.box-text-products .price')->text();
                $price = str_replace('đ', '', $price);
                $price = str_replace('.', '', $price);
                $price = (int) $price;

                // $src = $node->filter('.goodsboxtop .imgbox img')->count() ? $node->filter('.goodsboxtop .imgbox img')->attr('src') : '';
                // if (!empty($src)) {
                //     $src = str_starts_with($src, 'http') ? $src : $domain . '/' . $src;
                //     $image = $this->downloadImage($src);
                //     $images[] = $image['path'];
                // }

                // $description = '';
                // B3: Truy cập trang chi tiết sản phẩm
                $productCrawler = $client->request('GET', $productUrl);
                // dd($productCrawler->html());

                // B4: Lấy thông tin sản phẩm
                // dd($productCrawler->document);
                // $name = $productCrawler->filter('head title')->count() ? $productCrawler->filter('head title')->text() : '';
                // $price = $productCrawler->filter('span.price')->text();
                $description = $productCrawler->filter('meta[name="description"]')->count() ? $productCrawler->filter('meta[name="description"]')->attr('content') : '';
                $content = $productCrawler->filter('main .product .section-content div.woocommerce-Tabs-panel--description')->html();

                // $src = $productCrawler->filter('.product-thumbnails div.col img')->count() ? $productCrawler->filter('.product-thumbnails div.col img')->attr('src') : '';
                // dd($src);
                // if (!empty($src)) {
                //     $src = str_starts_with($src, 'http') ? $src : $domain . '/' . $src;
                //     $image = $this->downloadImage($src);
                //     $images[] = $image['path'];
                // }

                $productCrawler->filter('.product-images .product-gallery-slider img')->each(function ($node) use (&$images, $domain) {
                    $src = str_starts_with($node->attr('data-src'), 'http') ? $node->attr('data-src') : $domain . '/' . $node->attr('data-src');
                    $image = $this->downloadImage($src);
                    $images[] = $image['path'];
                });
                // dd($name, $content, $description, $srcs, $price);

                // $price = $productCrawler->filter('.product-page-price .amount')->text();
                // $price = str_replace('₫', '', $price);
                // $price = str_replace(',', '', $price);
                // $price = (int) $price;
                $name = [
                    [
                        'lang_code' => 'vi',
                        'content' => $name,
                    ],
                ];
                $description = [
                    [
                        'lang_code' => 'vi',
                        'content' => $description,
                    ],
                ];
                $content = [
                    [
                        'lang_code' => 'vi',
                        'content' => $content,
                    ],
                ];

                // B5: Lưu DB
                Product::updateOrCreate(
                    ['name' => json_encode($name)],
                    [
                        'slug' => to_slug($name[0]['content']),
                        'price' => $price,
                        'images' => json_encode($images),
                        'description' => json_encode($description),
                        'content' => json_encode($content),
                        'status' => 1,
                        'discountStatus' => 1,

                        // Lưu ý cần thay đổi category và type_cate
                        'category' => 5,
                        'type_cate' => 27,

                        'url_origin' => $productUrl,
                    ]
                );
            });

            // $nextPageExists = $crawler->filter('.pagination .next')->count(); // tuỳ trang
        //     $page++;
        // } while ($page <= 3);

        return response()->json(['message' => 'Scraped all products with Goutte successfully']);
    }

    public function downloadImage($url)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $contents = curl_exec($ch);
        curl_close($ch);

        if (!$contents) {
            return null;
        }

        $name = basename(parse_url($url, PHP_URL_PATH)); // Lấy tên file từ URL
        $path = public_path('uploads/images/' . $name);

        File::put($path, $contents); // Lưu ảnh vào thư mục uploads

        $file_data = [
            'name' => $name,
            'path' => '/uploads/images/' . $name,
        ];

        return $file_data;
    }
}
