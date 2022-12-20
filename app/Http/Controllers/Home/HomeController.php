<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use App\Models\Banner;
use App\Models\Home;
use App\Models\Brands;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Gallery;
use App\Models\Images;
use App\Models\Testimonials;
use App\Models\Certificates;
use App\Models\About;
use App\Models\Stores;
use App\Models\Category;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $title = 'Home';
        $metaData = Home::first();
        $banners = Banner::all();
        $products = Product::where(['featured' => 1])->get();
        $brands = Brands::all();
        $about = About::first();
        $stores = Stores::all();
        $categories = Category::where(['status' => 1])->get();
        $testimonials = Testimonials::all();
        $festiveBanners = [
            (object)[
                'brand' => 'geeken',
                'image' => 'home/images/banner-1.jpg',
                'altText' => 'Discount on Geeken Furniture'
            ],
            (object)[
                'brand' => 'table',
                'image' => 'home/images/banner-2.jpg',
                'altText' => 'Discount on Modular Kitchen'
            ],
            (object)[
                'brand' => 'mall-rack',
                'image' => 'home/images/banner-3.jpg',
                'altText' => 'Discount on Geeken Furniture'
            ],
            (object)[
                'brand' => 'alder',
                'image' => 'home/images/banner-4.jpg',
                'altText' => 'Discount on Modular Kitchen'
            ],
            (object)[
                'brand' => 'supreme',
                'image' => 'home/images/banner-5.jpg',
                'altText' => 'Discount on Modular Kitchen'
            ]
        ];
        return view('home.index', compact('title', 'metaData', 'banners', 'products', 'brands', 'testimonials', 'about', 'stores', 'categories', 'festiveBanners'));
    }

    public function contactUs()
    {
        $title = 'Contact Us';
        $stores = Stores::all();
        $categories = Category::all();
        return view('home.contact-us', compact('title', 'stores', 'categories'));
    }

    public function aboutUs()
    {
        $title = 'About Us';
        $metaData = About::first();
        $certificates = Certificates::all();
        $about = About::first();
        $stores = Stores::all();
        $categories = Category::all();
        return view('home.about-us', compact('title', 'metaData', 'certificates', 'stores', 'about', 'categories'));
    }

    public function catalogue()
    {
        $title = 'Catalogue';
        $metaData = Catalogue::latest()->first();
        $catalogues = Catalogue::where('status', 1)->where('meta_title', '!=', null)->get();
        $categories = Category::all();
        $data = [];
        foreach($catalogues as $key => $catalogue) {
            if($key === 0) {
                $data[$catalogue->meta_title][] = $catalogue;
            } else {
                $data[$catalogue->meta_title][] = $catalogue;
            }
        }
        return view('home.catalogue', compact('title', 'metaData', 'data', 'categories'));
    }

    public function mediaCenter()
    {
        $title = 'Media Center';
        $metaData = Gallery::whereNotNull('meta_title')->first();
        $data = Gallery::where('status', true)
            ->whereNull('product_id')
            ->get();
        $images = Images::all();
        $categories = Category::all();
        return view('home.media-center', compact(['title', 'metaData', 'data', 'images', 'categories']));
    }

    public function newsletter(Request $request)
    {
        $email = $request->newsletter_email;
        $token = $request->_token;
        $get_email = 'v@t.com';

        if ($email != $get_email) {
            $data = [
                'email' => $email,
                'encrypt_email' => Crypt::encryptString($email),
            ];
            // View,data,function
            Mail::send('home.emails.newsletterMail', compact('data'), function ($messages) use ($email) {
                $messages->to($email);
                $messages->subject('Thank You For Subscribing Sri Golju Furniture Industries Newsletter');
            });
            return response()->json(
                [
                    'response' => true,
                    'message' => 'Thank you for subscribing our newsletter!',
                ],
                200,
            );
        } elseif ($email === $get_email) {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'You have already subscribed using this email!',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Something Went Wrong! Try again later.',
                ],
                200,
            );
        }
    }

    public function unsubcribeNewsletter($email)
    {
        return Crypt::decryptString($email);
    }

    public function contactForm(Request $request)
    {
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $mobile_number = $request->mobile_number;
        $email = $request->email;
        $message = $request->message;
        $token = $request->_token;

        if (isset($email)) {
            $data = [
                'name' => $first_name . ' ' . $last_name,
                'mobile_number' => $mobile_number,
                'email' => $email,
                'message' => $message,
            ];
            // View,data,function
            Mail::send('home.emails.thankYouMail', compact('data'), function ($messages) use ($email) {
                $messages->to($email);
                $messages->subject('Thank you for contacting Sri Golju Furniture Industries');
            });
            Mail::send('home.emails.contactUsMail', compact('data'), function ($messages) use ($email) {
                $messages->to($_ENV['MAIL_FROM_ADDRESS']);
                $messages->subject('New Enquiry');
            });
            return response()->json(
                [
                    'response' => true,
                    'message' => 'Thank you for contacting us.',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Something Went Wrong! Try again later.',
                ],
                200,
            );
        }
    }

    public function quickEnquiryForm(Request $request)
    {
        $enquiry_name = $request->enquiry_name;
        $enquiry_mobile_number = $request->enquiry_mobile_number;
        $email = $request->enquiry_email;
        $token = $request->_token;

        if (isset($enquiry_mobile_number)) {
            $data = [
                'name' => $enquiry_name,
                'mobile_number' => $enquiry_mobile_number,
                'email' => $email,
            ];
            // View,data,function
            Mail::send('home.emails.quickEnquiryMail', compact('data'), function ($messages) {
                $messages->to($_ENV['MAIL_FROM_ADDRESS']);
                $messages->subject('New Enquiry');
            });
            Mail::send('home.emails.thankYouMail', compact('data'), function ($messages) use ($email) {
                $messages->to($email);
                $messages->subject('Thank you for contacting Sri Golju Furniture Industries');
            });

            return response()->json(
                [
                    'response' => true,
                    'message' => 'Thank you for contacting us.',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Something Went Wrong! Try again later.',
                ],
                200,
            );
        }
    }

    public function requestFormSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'mobile_number' => 'required|numeric|digits:10',
            'message' => 'nullable',
            'product_name' => 'nullable|max:255',
        ]);
        $expires = time() + 60 * 60 * 24 * 30;
        setcookie('discountModal', 2, $expires, '/');
        Enquiry::create($request->all());
        return redirect()
            ->back()
            ->with('status', 'Thank you for contacting us.');
    }

    public function search(Request $request)
    {
        $title = 'Search Result';
        $categories = Category::where(['status' => 1])->get();
        $data = Product::where(['products.status' => 1])
            ->where('products.title', 'LIKE', "%$request->search%")
            ->join('brands', 'products.brand', '=', 'brands.id')
            ->orWhere('products.brief_description', 'LIKE', "%$request->search%")
            ->orWhere('brands.title', 'LIKE', "%$request->search%")
            ->select('products.*')
            ->paginate(10);
        return view('home.search-list', compact('title', 'data', 'categories'));
    }

    public function terms()
    {
        $categories = Category::all();
        return view('home.term-condition', compact('categories'));
    }
    public function privacy()
    {
        $categories = Category::all();
        return view('home.privacy-policy', compact('categories'));
    }
    public function service()
    {
        $categories = Category::all();
        return view('home.service-support', compact('categories'));
    }
}
